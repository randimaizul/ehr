<?php
 
/*require_once 'include/db_functions.php';
$db = new DB_Functions();*/

$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);
// json response array
$response = array("error" => FALSE);

if (isset($_POST['nama_pasien']) && isset($_POST['alamat'])) {
 
    // receiving the post params
	$id_user = $_POST['id_user'];
	$id_asuransi = $_POST['id_asuransi'];
	$no_asuransi = $_POST['no_asuransi'];
    $nama_pasien = $_POST['nama_pasien'];
    //$no_telepon = $_POST['no_telepon'];
	$alamat = $_POST['alamat'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$nama_orangtua = $_POST['nama_orangtua'];
	$golongan_darah = $_POST['golongan_darah'];
	//$created_at = date("Y-m-d");
    
    //$querynya = mysql_query("SELECT * FROM asuransi");
	//$cek = mysql_fetch_array($querynya);
	//$id_pasien = $cek['id_pasien'];
	//echo $id_pasien;
	//if($cek){		
    mysql_query("
	UPDATE 
		pasien 
	SET 
		nama_pasien = '$nama_pasien',
		alamat = '$alamat',
		tanggal_lahir = '$tanggal_lahir',
		agama = '$agama',
		id_asuransi = '$id_asuransi',
		no_asuransi = '$no_asuransi',
		nama_orangtua = '$nama_orangtua',
		golongan_darah = '$golongan_darah' 		
	WHERE
		id_user = '$id_user'
	");
	//$querynya = mysql_query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
	//$cek = mysql_fetch_array($querynya);
	//foreach($cek as $value);
	//echo $value;
	//mysql_query("INSERT INTO pasien(no_telepon, id_user) VALUES('$no_telepon', '$value')");
	$a = 0;
	//$user=mysql_fetch_array($querynya);
	
	if ($a==0) {
        // use is found
        $response["error"] = FALSE;
		//while ($data = mysql_fetch_assoc($querynya)) {
    //$response['jenis_asuransi'][]=$data['jenis_asuransi'];
//}
       
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown error occurred in registration!";
        echo json_encode($response);
    }
	
	//}
	
	/*else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Username dan No. Telepon harus sudah terdaftar";
    echo json_encode($response);
}*/
	
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (Username, No Telepon, or password) is missing!";
    echo json_encode($response);
}
?>