<?php
session_start();
require_once("bootstrapt.php");
if(!isset($_SESSION['email'])){
    header("Location: orders.php");
    exit();
}else{
    $order_id = $_GET['id'];
    $page = "order_details.php";
    $order_cards = $dbh->getOrderDetail($order_id);
    $cards=[];
    foreach ($order_cards as $order_card) {
        $product = $dbh->getCardById($order_card['card_code']);
        $cards[] = $product;
    }
    require 'template/base.php';
}
?>