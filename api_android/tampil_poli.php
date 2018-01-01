<?php
//error_reporting(E_ALL ^ E_DEPRECATED);
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);

// json response array
$response = array("error" => FALSE);   
if (isset($_POST['id_rs'])) {
 
    // receiving the post params
    //$kode_pasien = $_POST['kode_pasien'];    
    $id_rs = $_POST['id_rs'];  
    
$query = "
		SELECT 
				poli.id_poli,
				poli.nama_poli,
				poli.keterangan,
				rs_poli.id_rs_poli
		FROM 
				taungapa_api.poli
				JOIN taungapa_api.rs_poli ON rs_poli.id_poli = poli.id_poli
				JOIN taungapa_api.rumah_sakit ON rumah_sakit.id_rs = rs_poli.id_rs
		WHERE
				rumah_sakit.id_rs = '$id_rs'
	";
$result = mysql_query($query);    

while ($data = mysql_fetch_assoc($result)) {
    $response['poli'][]=$data;
}
}
                
echo json_encode($response);
        
?>