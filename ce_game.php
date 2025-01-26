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
    $old=$_POST['old'];
    $new=$_POST['game-name'];
    $edit=false;
    $dbh->editGame($old,$new);
    header("Location: md_game.php");
}

?>