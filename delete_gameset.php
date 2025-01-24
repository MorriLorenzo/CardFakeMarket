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
    $gameset=$_POST['gameset'];
    $dbh->deleteGameSet($gameset);
    header("Location: md_gameset.php");
}

?>