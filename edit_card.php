<?php
session_start();
require_once("bootstrapt.php");

if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}else{
    if(!($dbh->isAdmin($_SESSION['email']))){
        header("Location: index.php");
        exit();
    }
    $code=$_POST['code'];
    $card = $dbh->getCardById($code);
    $edit=true;
    $setts=$dbh->getSets();
    $page = "insert_card.php";
    require 'template/base.php';
}