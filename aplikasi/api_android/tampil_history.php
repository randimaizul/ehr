<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);

// json response array
$response = array("error" => FALSE);   
if (isset($_POST['id_pasien'])) {
 
    // receiving the post params
    //$kode_pasien = $_POST['kode_pasien'];    
    $id_pasien = $_POST['id_pasien'];  
    
$query = "
		SELECT 
				pendaftaran.id_pendaftaran,
				pendaftaran.tanggal_pendaftaran,
				rumah_sakit.nama_rs,
				poli.nama_poli
				
		FROM 
				taungapa_api.pendaftaran
				LEFT JOIN taungapa_api.rs_poli ON pendaftaran.id_rs_poli = rs_poli.id_rs_poli
				LEFT JOIN taungapa_api.rumah_sakit ON rs_poli.id_rs = rumah_sakit.id_rs
				LEFT JOIN taungapa_api.poli ON rs_poli.id_poli = poli.id_poli
		WHERE
				pendaftaran.id_pasien = '$id_pasien' AND (pendaftaran.status = 2 OR pendaftaran.status = 3)
	";
$result = mysql_query($query);    

while ($data = mysql_fetch_assoc($result)) {
    $response['history'][]=$data;
}
}
                
echo json_encode($response);
        
?>