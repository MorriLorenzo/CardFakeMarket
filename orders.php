<?php
session_start();
require_once("bootstrapt.php");
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}else{
    $email = $_SESSION['email'];
    $page = "order_list.php";
    $orders = $dbh->getOrdersByEmail($email);

    require 'template/base.php';
}
?>