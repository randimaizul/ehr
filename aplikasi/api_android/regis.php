<?php
 
/*require_once 'include/db_functions.php';
$db = new DB_Functions();*/

$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);
// json response array
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['no_telepon']) && isset($_POST['password'])) {
 
    // receiving the post params
    $username = $_POST['username'];
    $no_telepon = $_POST['no_telepon'];
    $status = 2;
    $password = $_POST['password'];
	$created_at = date("Y-m-d");
    
    //$querynya = mysql_query("SELECT * FROM pasien WHERE no_telepon = '$no_telepon'");
	//$cek = mysql_fetch_array($querynya);
	//$id_pasien = $cek['id_pasien'];
	//echo $id_pasien;
	//if($cek){		
    mysql_query("INSERT INTO users(username, status, password) VALUES('$username', '$status', '$password')");
	$querynya = mysql_query("SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1");
	$cek = mysql_fetch_array($querynya);
	foreach($cek as $value);
	mysql_query("INSERT INTO pasien(no_telepon, id_user) VALUES('$no_telepon', '$value')");
	$a = 0;
	//$user=mysql_fetch_array($querynya);
	
	if ($a==0) {
        // use is found
        $response["error"] = FALSE;
       
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