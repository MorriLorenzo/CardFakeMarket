<?php
session_start();
require_once("bootstrapt.php");
if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}else{
    $email = $_SESSION['email'];
    if(isset($_POST['notification_id'])){
        $id = $_POST['notification_id'];
        $dbh->deleteNotification($id);
        header("Location: notifications.php");
    }else{
        header("Location: index.php");
    }
}
?>