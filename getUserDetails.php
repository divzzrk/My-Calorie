<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['ip_number'])) {
    $ip_number = $_POST['ip_number'];
    $user_details = $db->getUserDetails($ip_number);
    echo json_encode($user_details);
}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>