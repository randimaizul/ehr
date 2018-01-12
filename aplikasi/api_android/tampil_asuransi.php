<?php
 
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);
// json response array
$response = array("error" => FALSE);
  
if (isset($_POST['id_pasien'])) {
 
    // receiving the post params
    //$kode_pasien = $_POST['kode_pasien'];    
    //$id_poli = $_POST['id_poli'];  
    
$query = "
		SELECT 
				* 
		FROM 
				asuransi
	";
$result = mysql_query($query);    

while ($data = mysql_fetch_assoc($result)) {
	//$response['id_asuransi'][]=$data['id_asuransi'];
    //$response['jenis_asuransi'][]=$data['jenis_asuransi'];
	$response['asuransi'][]=$data;
}
}
                
echo json_encode($response);
        
?>