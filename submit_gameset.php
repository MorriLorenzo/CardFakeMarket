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
    $name= $_POST['gameset-name'] ;
    $date= $_POST['gameset-date'] ;
    $game= $_POST['game-id'] ;

    $dbh->insertGameSet($name,$date,$game);
    header("Location: admin.php");
}
?>