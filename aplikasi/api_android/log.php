<?php
 
$connect=mysql_connect('taungapain.com', 'taungapa', 'zaq12wsXCm1m15anygvyhn');
mysql_select_db('taungapa_api', $connect);
// json response array
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['password'])) {
 
    // receiving the post params
    $username = $_POST['username'];    
    $password = md5($_POST['password']);     
   
	$querynya = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $user=mysql_fetch_array($querynya);
	
	if ($user != false) {
        // use is found
        $response["error"] = FALSE;
		$response["user"]["id"] = $user["id"];
       
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