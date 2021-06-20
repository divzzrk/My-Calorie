<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['food_id']) && isset($_POST['ip_number'])) {
 
    // receiving the post params
    $food_id = $_POST['food_id'];
    $ip_number = $_POST['ip_number'];
 
    // check if user is already existed with the same email
    if ($db->isFoodExisted($food_id, $ip_number)) {
        $food = $db->deleteFood($food_id, $ip_number);
        if ($food) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["error_msg"] = "The given row is deleted successfully";
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in deleting food table values!";
            echo json_encode($response);
        }
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Table row not found!";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters(food_id and ip_number) are missing!";
    echo json_encode($response);
}
?>