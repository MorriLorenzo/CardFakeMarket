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
    $gioco= $_POST['game-name'] ;
    $dbh->insertGame($gioco);
    header("Location: admin.php");
}
?>