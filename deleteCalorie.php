<?php
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
       header("location:index.php");
    }

    if($_POST['fid']) {
        $id = $_POST['fid'];
        $response = $user->deleteCalorie($id);
    }
?>
        