<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);

// json response array
$response = array("error" => FALSE);   
if (isset($_POST['id_poli'])) {
 
    // receiving the post params
    //$kode_pasien = $_POST['kode_pasien'];    
    $id_poli = $_POST['id_poli'];  
    
$query = "
		SELECT 
				dokter.id_dokter,
				dokter.nama_dokter
				
		FROM 
				taungapa_api.dokter
				LEFT JOIN taungapa_api.poli ON dokter.id_poli = poli.id_poli
		WHERE
				dokter.id_poli = '$id_poli'
	";
$result = mysql_query($query);    

while ($data = mysql_fetch_assoc($result)) {
    $response['dokter'][]=$data;
}
}
                
echo json_encode($response);
        
?>