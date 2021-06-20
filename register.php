<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['ip_number']) && isset($_POST['user_name']) && isset($_POST['user_age']) && isset($_POST['user_sex']) && isset($_POST['user_occupation']) && isset($_POST['phone_number'])) {
 
    // receiving the post params
    $ip_number = $_POST['ip_number'];
    $user_name = $_POST['user_name'];
    $user_age = $_POST['user_age'];
    $user_sex = $_POST['user_sex'];
    $user_occupation = $_POST['user_occupation'];
    $phone_number = $_POST['phone_number'];

 
    // check if user is already existed with the same email
    if ($db->isUserExisted($ip_number)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $ip_number;
        echo json_encode($response);
    } else {
        // create a new user
        $user = $db->storeUser($ip_number, $user_name,$user_age, $user_sex, $user_occupation, $phone_number);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $user["id"];
            $response["user"]["ip_number"] = $user["ip_number"];
            $response["user"]["user_name"] = $user["user_name"];
            $response["user"]["user_age"] = $user["user_age"];
            $response["user"]["user_sex"] = $user["user_sex"];
            $response["user"]["user_occupation"] = $user["user_occupation"];
            $response["user"]["phone_number"] = $user["phone_number"];
            $response["user"]["created_at"] = $user["created_at"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (ip number, user name, age, gender, occupation, phone number) is missing!";
    echo json_encode($response);
}
?>