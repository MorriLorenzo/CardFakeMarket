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
    $code=$_POST['gameset'];
    $sett = $dbh->getGameSet($code);
    $games = $dbh->getGames();
    $edit=true;
    $page = "insert_gameset.php";
    require 'template/base.php';
}