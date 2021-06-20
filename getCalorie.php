<?php
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
  
if (isset($_POST['ip_number']) && isset($_POST['date'])) {
    $ip_number = $_POST['ip_number'];
    $curr_date = $_POST['date'];
    $calorie_details = $db->getCalorie($ip_number, $curr_date);
    echo json_encode($calorie_details);
}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>