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
				rumah_sakit.id_rs,
				rumah_sakit.nama_rs,
				rumah_sakit.alamat,
				rumah_sakit.akreditasi
		FROM 
				taungapa_api.rumah_sakit
	";
$result = mysql_query($query);    

while ($data = mysql_fetch_assoc($result)) {
    $response['rumah_sakit'][]=$data;
}
}
                
echo json_encode($response);
        
?>