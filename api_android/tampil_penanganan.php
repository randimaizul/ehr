<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);

// json response array
$response = array("error" => FALSE);   
if (isset($_POST['id_rekam_medis'])) {
 
    // receiving the post params
    //$kode_pasien = $_POST['kode_pasien'];    
    $id_rekam_medis = $_POST['id_rekam_medis'];  
    
$query = "
		SELECT 
				penanganan.id_penanganan,
				penanganan.id_rekam_medis,
				penanganan.jenis_penanganan,
				penanganan.keterangan,
				obat.nama_obat,
				daftar_obat.jumlah
		FROM 
				taungapa_api.penanganan
				LEFT JOIN taungapa_api.rekam_medis ON penanganan.id_rekam_medis = rekam_medis.id_rekam_medis
				LEFT JOIN taungapa_api.daftar_obat ON rekam_medis.id_rekam_medis = daftar_obat.id_rekam_medis
				LEFT JOIN taungapa_api.obat ON daftar_obat.id_obat = obat.id_obat
				
		WHERE
				penanganan.id_rekam_medis = '$id_rekam_medis'
		
	";
$result = mysql_query($query);    

while ($data = mysql_fetch_assoc($result)) {
    $response['penanganan'][]=$data;
}
}
                
echo json_encode($response);
        
?>