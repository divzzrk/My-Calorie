<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['glucose_id']) && isset($_POST['ip_number']) && isset($_POST['glucose_reading']) && isset($_POST['sysdatetime'])) {
 
    // receiving the post params
    $glucose_id = $_POST['glucose_id'];
    $ip_number = $_POST['ip_number'];
    $glucose_reading = $_POST['glucose_reading'];
    $sysdatetime = $_POST['sysdatetime'];
 
    // check if user is already existed with the same email
    if ($db->isGlucoseExisted($glucose_id, $ip_number)) {
        // user already existed
        //$response["error"] = FALSE;
        //$response["error_msg"] = "Glucose is already updated for " . $ip_number;
        //therefore update the table
        $glucose = $db->updateGlucose($glucose_id, $ip_number, $glucose_reading, $sysdatetime);
        if ($glucose) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $glucose["id"];
            $response["glucose"]["glucose_id"] = $glucose["glucose_id"];
            $response["glucose"]["ip_number"] = $glucose["ip_number"];
            $response["glucose"]["glucose_reading"] = $glucose["glucose_reading"];
            $response["glucose"]["sysdatetime"] = $glucose["sysdatetime"];
            echo json_encode($response);
        } else {
            // glucose failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in syncing glucose table!";
            echo json_encode($response);
        }
        echo json_encode($response);
    } else {
        // create a new glucose
        $glucose = $db->storeGlucose($glucose_id, $ip_number, $glucose_reading, $sysdatetime);
        if ($glucose) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["uid"] = $glucose["id"];
            $response["glucose"]["glucose_id"] = $glucose["glucose_id"];
            $response["glucose"]["ip_number"] = $glucose["ip_number"];
            $response["glucose"]["glucose_reading"] = $glucose["glucose_reading"];
            $response["glucose"]["sysdatetime"] = $glucose["sysdatetime"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in syncing glucose table!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>