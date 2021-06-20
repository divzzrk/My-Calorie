<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['ip_number']) && isset($_POST['user_dob']) && isset($_POST['gender']) && isset($_POST['height']) && isset($_POST['weight'])) {
 
    // receiving the POST params
    $ip_number = $_POST['ip_number'];
    $user_dob = $_POST['user_dob'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
 
    // create a new food
    $user = $db->updateUserDetails($ip_number, $user_dob, $gender, $height, $weight);
    //height in cm and weight in kgs
    if ($user) {
        // user stored successfully
        $response["error"] = FALSE;
        $response["uid"] = $user["id"];
        $response["user"]["ip_number"] = $user["ip_number"];
        $response["user"]["dob"] = $user["date_of_birth"];
        $response["user"]["gender"] = $user["user_sex"];
        $response["user"]["height"] = $user["height_in_cm"];
        $response["user"]["weight"] = $user["weight_in_kg"];
        echo json_encode($response);
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown error occurred!";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>