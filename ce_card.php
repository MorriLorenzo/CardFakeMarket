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
    $language=$_POST['language'];
    $description=$_POST['description'];
    $set=$_POST['set_code'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $image=$_FILES['image'];
    var_dump($image);
    if($image['size'] > 0){
        $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $nameImg = $code;
        $cardImg = "img/card/".$nameImg.".".$imageExtension;
        move_uploaded_file($image['tmp_name'], $cardImg);
    }else{
        $cardImg = $dbh->getCardById($code)['image'];
    }
    $edit=false;
    $dbh->editCard($code,$language,$cardImg,$description,$set,$quantity,$price);
    header("Location: md_card.php");
}

?>