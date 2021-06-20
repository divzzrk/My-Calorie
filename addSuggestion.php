<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['ip_number']) && isset($_POST['item_name']) && isset($_POST['category'])) {
 
    // receiving the post params
    $ip_number = $_POST['ip_number'];
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
 
    // create a new suggestion
    $result = $db->addSuggestion($ip_number, $item_name, $category);
    if ($result) {
        // user stored successfully
        $response["error"] = FALSE;
        $response["message"] = "Inserted Successfully";
        echo json_encode($response);
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown error occurred in inserting to suggestion table!";
        echo($result);
        echo json_encode($response);
    }

} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>