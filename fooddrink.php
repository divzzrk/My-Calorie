<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['category'])) {
    // receiving the post params
    $category = $_POST['category'];
    if($category == "food"){
        $food = $db->getFood();
        echo json_encode($food);
    }else if($category == "drink"){
        $drink = $db->getDrink();
        echo json_encode($drink);
    }else{
        $response["error"] = TRUE;
        $response["error_msg"] = "Required parameters are missing!";
        echo json_encode($response);
    }
}else{
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}
?>