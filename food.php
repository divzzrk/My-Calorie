<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['food_id']) && isset($_POST['ip_number']) && isset($_POST['food_name']) && isset($_POST['food_cat']) && isset($_POST['food_qty']) && isset($_POST['sysdatetime']) && isset($_POST['user_datetime'])) {
 
    // receiving the post params
    $food_id = $_POST['food_id'];
    $ip_number = $_POST['ip_number'];
    $food_name = $_POST['food_name'];
    $food_cat = $_POST['food_cat'];
    $food_qty = $_POST['food_qty'];
    $sysdatetime = $_POST['sysdatetime'];
    $user_datetime = $_POST['user_datetime'];
 
    // check if user is already existed with the same email
    if ($db->isFoodExisted($food_id, $ip_number)) {
        // user already existed
        //$response["error"] = FALSE;
        //$response["error_msg"] = "Food is already updated for " . $ip_number;
        //therefore update the table
        $food = $db->updateFood($food_id, $ip_number, $food_name, $food_cat, $food_qty, $sysdatetime, $user_datetime);
        if ($food) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $food["id"];
            $response["food"]["food_id"] = $food["food_id"];
            $response["food"]["ip_number"] = $food["ip_number"];
            $response["food"]["food_name"] = $food["food_name"];
            $response["food"]["food_cat"] = $food["food_cat"];
            $response["food"]["food_qty"] = $food["food_qty"];
            $response["food"]["sysdatetime"] = $food["sysdatetime"];
            $response["food"]["user_datetime"] = $food["user_datetime"];
            echo json_encode($response);
        } else {
            // food failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in syncing food table!";
            echo json_encode($response);
        }
        echo json_encode($response);
    } else {
        // create a new food
        $food = $db->storeFood($food_id, $ip_number, $food_name, $food_cat, $food_qty, $sysdatetime, $user_datetime);
        if ($food) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $food["id"];
            $response["food"]["food_id"] = $food["food_id"];
            $response["food"]["ip_number"] = $food["ip_number"];
            $response["food"]["food_name"] = $food["food_name"];
            $response["food"]["food_cat"] = $food["food_cat"];
            $response["food"]["food_qty"] = $food["food_qty"];
            $response["food"]["sysdatetime"] = $food["sysdatetime"];
            $response["food"]["user_datetime"] = $food["user_datetime"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in syncing food table!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>