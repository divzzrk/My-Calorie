<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['drink_id']) && isset($_POST['ip_number']) && isset($_POST['drink_name']) && isset($_POST['drink_qty']) && isset($_POST['food_sugar']) && isset($_POST['sysdatetime']) && isset($_POST['user_datetime'])) {
 
    // receiving the post params
    $drink_id = $_POST['drink_id'];
    $ip_number = $_POST['ip_number'];
    $drink_name = $_POST['drink_name'];
    $drink_qty = $_POST['drink_qty'];
    $food_sugar = $_POST['food_sugar'];
    $sysdatetime = $_POST['sysdatetime'];
    $user_datetime = $_POST['user_datetime'];
 
    // check if user is already existed with the same email
    if ($db->isDrinkExisted($drink_id, $ip_number)) {
        // user already existed
        //$response["error"] = FALSE;
        //$response["error_msg"] = "Drink is already updated for " . $ip_number;
        //therefore update the table
        $drink = $db->updateDrink($drink_id, $ip_number, $drink_name, $drink_qty, $food_sugar, $sysdatetime, $user_datetime);
        if ($drink) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $drink["id"];
            $response["drink"]["drink_id"] = $drink["drink_id"];
            $response["drink"]["ip_number"] = $drink["ip_number"];
            $response["drink"]["drink_name"] = $drink["drink_name"];
            $response["drink"]["drink_qty"] = $drink["drink_qty"];
            $response["drink"]["food_sugar"] = $drink["food_sugar"];
            $response["drink"]["sysdatetime"] = $drink["sysdatetime"];
            $response["drink"]["user_datetime"] = $drink["user_datetime"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in syncing drink table!";
            echo json_encode($response);
        }
        echo json_encode($response);
    } else {
        // create a new user
        $drink = $db->storeDrink($drink_id, $ip_number, $drink_name, $drink_qty, $food_sugar, $sysdatetime, $user_datetime);
        if ($drink) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $drink["id"];
            $response["drink"]["drink_id"] = $drink["drink_id"];
            $response["drink"]["ip_number"] = $drink["ip_number"];
            $response["drink"]["drink_name"] = $drink["drink_name"];
            $response["drink"]["drink_qty"] = $drink["drink_qty"];
            $response["drink"]["food_sugar"] = $drink["food_sugar"];
            $response["drink"]["sysdatetime"] = $drink["sysdatetime"];
            $response["drink"]["user_datetime"] = $drink["user_datetime"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in syncing drink table!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>