<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);

// json response array
$response = array("error" => FALSE);   
if (isset($_POST['id_pendaftaran'])) {
 
    // receiving the post params
    //$kode_pasien = $_POST['kode_pasien'];    
    $id_pendaftaran = $_POST['id_pendaftaran'];  
    
$query = "
		SELECT 
				rekam_medis.id_rekam_medis,
				rekam_medis.keluhan_utama,
				rekam_medis.riwayat_alergi,
				rekam_medis.tanda_vital
		FROM 
				taungapa_api.rekam_medis
				
		WHERE
				rekam_medis.id_pendaftaran = '$id_pendaftaran'
		
	";
$result = mysql_query($query);  
//$user=mysql_fetch_array($result);

while ($data = mysql_fetch_assoc($result)) {
    $response['rekmed'][]=$data;
}

/*$query2 = "
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
				penanganan.id_rekam_medis = '$user[id_rekam_medis]'
		
	";*/
//$result2 = mysql_query($query2);
//while ($data2 = mysql_fetch_assoc($result2)) {
//    $response['rekmed'][]=$data2;
//}

}
                
echo json_encode($response);
        
?>