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
    $game=$_POST['game'];
    $edit=true;
    $page = "insert_game.php";
    require 'template/base.php';
}