<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['ip_number']) && isset($_POST['phone_number'])) {
 
    // receiving the post params
    $ip_number = $_POST['ip_number'];
    $phone_number = $_POST['phone_number'];
 
    // get the user by ip_number and phone number
    $user = $db->getUserByIpAndPhone($ip_number, $phone_number);
 
    if ($user != false) {
        // use is found
        $response["error"] = FALSE;
        $response["uid"] = $user["id"];
        $response["user"]["ip_number"] = $user["ip_number"];
        $response["user"]["user_name"] = $user["user_name"];
        $response["user"]["phone_number"] = $user["phone_number"];
        $response["user"]["created_at"] = $user["created_at"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>