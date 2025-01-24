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
    $dbh->deleteGame($game);
    header("Location: md_game.php");
}

?>