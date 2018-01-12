<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);
// json response array
$response = array("error" => FALSE);

if (isset($_POST['id_rs_poli'])){
 
    // receiving the post params
    $id_pasien = $_POST['id_pasien'];    
    $id_rs_poli = $_POST['id_rs_poli']; 
	$id_dokter = $_POST['id_dokter'];
	//$tanggal_pendaftaran = date("Y-m-d");
	$tanggal_pendaftaran = date_create()->format('Y-m-d H:i:s');
	
	$querynya2 = mysql_query("
			SELECT 
					count(nomor_pendaftaran) as no
			FROM 
					pendaftaran
	");
	
	$itung2 = mysql_fetch_array($querynya2);
	//foreach($itung as $value);
	//$itung = count($user);
	//print_r($itung['no']);
	//die();
	$hitung = $itung2['no'];
	
	if($hitung == 0){
		$hitung = 1;
		$input = mysql_query("INSERT INTO pendaftaran(nomor_pendaftaran,id_pasien,id_rs_poli,id_dokter,tanggal_pendaftaran) VALUES('1', '$id_pasien', '$id_rs_poli', '$id_dokter', '$tanggal_pendaftaran')");
		//echo 'gagal';
	}
	else{
		$hitung++;
		//echo 'sukses';
		//echo $hitung;
		$input = mysql_query("INSERT INTO pendaftaran(nomor_pendaftaran,id_pasien,id_rs_poli,id_dokter,tanggal_pendaftaran) VALUES('$hitung', '$id_pasien', '$id_rs_poli', '$id_dokter', '$tanggal_pendaftaran')");
		//if($input){
		//	echo 'masuk';
		//}
		//else {
		//	echo 'gagal';
		//}
	}
	
	$querynya = mysql_query("
			SELECT 
					id_pendaftaran
			FROM 
					pendaftaran
			ORDER BY
					id_pendaftaran DESC 
			LIMIT 1
	");
	$itung = mysql_fetch_array($querynya);
	

	
	//if ($user != false) {
        // use is found
        $response["error"] = FALSE;
		$response["user"]["nomor_pendaftaran"] = $hitung;
		$response["user"]["id_pendaftaran"] = $itung['id_pendaftaran'];
       
        echo json_encode($response);
 
	//echo "berhasil";

	
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email, phone, or password) is missing!";
    echo json_encode($response);
}
?>