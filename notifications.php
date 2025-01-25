<?php
session_start();
require_once("bootstrapt.php");
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}else{
    $email = $_SESSION['email'];
    $page = "notification_list.php";
    $notifications = $dbh->getNotificationByEmail($email);

    require 'template/base.php';
}
?>