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
    $code=$_POST['old'];
    $name=$_POST['gameset-name'];
    $date=$_POST['gameset-date'];
    $game=$_POST['game-id'];
    $edit=false;
    $dbh->editGameSet($code,$name,$date,$game);
    header("Location: md_gameset.php");
}

?>