<?php
    session_start();
    include_once 'include/Class_User.php';
    $user = new User();
    $user->user_logout();
    header("location:index.php");
?>