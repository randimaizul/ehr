<?php
 
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);
// json response array
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // receiving the post params
    $username = $_POST['username'];    
    $password = $_POST['password'];     
   
	/*$querynya = mysql_query("SELECT id_user FROM users WHERE username = '$username' AND password = '$password'");
    $user=mysql_fetch_array($querynya);
	$querynya2 = mysql_query("
		SELECT 
			pasien.id_pasien 
		FROM 
			ehr.pasien
			LEFT JOIN ehr.users ON pasien.id_user = users.id_user
		WHERE 
			pasien.id_user = '$user[0]'
		");
    $user2=mysql_fetch_array($querynya2);*/
	
	$querynya = mysql_query("
		SELECT
			users.id_user,
			pasien.id_pasien 
		FROM 
			taungapa_api.pasien
			LEFT JOIN taungapa_api.users ON pasien.id_user = users.id_user
		WHERE 
			pasien.id_user = users.id_user
			AND username = '$username'
			AND password = '$password' 
		");
    $user=mysql_fetch_array($querynya);
	
	if ($user != false) {
        // use is found
        $response["error"] = FALSE;
		$response["user"]["id_user"] = $user["id_user"];
		$response["id_pasien"]["id_pasien"] = $user["id_pasien"];
       
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
	//echo "berhasil";
	//	}
	
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (name, email, phone, or password) is missing!";
    echo json_encode($response);
}
?>