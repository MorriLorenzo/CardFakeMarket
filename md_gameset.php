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
    $setts = $dbh->getSets();
    $page = "md_gameset.php";
    require 'template/base.php';
}
?>