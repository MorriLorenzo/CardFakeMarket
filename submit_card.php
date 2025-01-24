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
    $image=$_FILES['image'];
    $language=$_POST['language'];
    $description=$_POST['description'];
    $set=$_POST['set_code'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $nameImg = $dbh->getNextId("card");
    $cardImg = "img/card/".$nameImg.".".$imageExtension;
    move_uploaded_file($image['tmp_name'], $cardImg);
    $dbh->insertCard($language,$cardImg,$description,$set,$quantity,$price);
    header("Location: admin.php");
}
?>