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
					pendaftaran.id_pendaftaran,
					pendaftaran.tanggal_pendaftaran,
					pendaftaran.nomor_pendaftaran,
					pendaftaran.id_pasien,
					pasien.nama_pasien,
					pasien.no_asuransi,
					rumah_sakit.nama_rs,
					poli.nama_poli,
					dokter.nama_dokter,
					asuransi.jenis_asuransi
			FROM 
					taungapa_api.pendaftaran
					LEFT JOIN pasien ON pendaftaran.id_pasien = pasien.id_pasien
					LEFT JOIN asuransi ON pasien.id_asuransi = asuransi.id_asuransi
					LEFT JOIN rs_poli ON pendaftaran.id_rs_poli = rs_poli.id_rs_poli
					LEFT JOIN rumah_sakit ON rs_poli.id_rs = rumah_sakit.id_rs
					LEFT JOIN poli ON rs_poli.id_poli = poli.id_poli
					LEFT JOIN dokter ON poli.id_poli = dokter.id_poli
			WHERE
					pendaftaran.id_pendaftaran = '$id_pendaftaran'
	";
$result = mysql_query($query); 
$hasil = mysql_fetch_array($result);   
//if ($result != false) {
		$response["error"] = FALSE;
		$response["pendaftaran"]["id_pendaftaran"] = $hasil["id_pendaftaran"];
		$response["pendaftaran"]["tanggal_pendaftaran"] = $hasil["tanggal_pendaftaran"];
		$response["pendaftaran"]["nomor_pendaftaran"] = $hasil["nomor_pendaftaran"];
		$response["pendaftaran"]["id_pasien"] = $hasil["id_pasien"];
		$response["pendaftaran"]["nama_pasien"] = $hasil["nama_pasien"];
		$response["pendaftaran"]["no_asuransi"] = $hasil["no_asuransi"];
		$response["pendaftaran"]["nama_rs"] = $hasil["nama_rs"];
		$response["pendaftaran"]["nama_poli"] = $hasil["nama_poli"];
		$response["pendaftaran"]["nama_dokter"] = $hasil["nama_dokter"];
		$response["pendaftaran"]["jenis_asuransi"] = $hasil["jenis_asuransi"];
		echo json_encode($response);
		
//}		else {
        // user is not found with the credentials
//        $response["error"] = TRUE;
  //      $response["error_msg"] = "Login credentials are wrong. Please try again!";
	//	echo json_encode($response);
//}
}
            
        
?>