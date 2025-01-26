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
    $card=$_POST['code'];
    unlink($dbh->getCardById($card)['image']);
    $dbh->deleteCard($card);
    header("Location: md_card.php");
}

?>