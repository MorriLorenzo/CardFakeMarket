<?php
session_start();
require_once("bootstrapt.php");

if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}else{
    $email=$_SESSION['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    if($password == ""){
        $password = $dbh->getUser($email)['password'];
    }else{
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
    $dbh->updateUser($email, $first_name, $last_name, $address, $password);
    header("Location: index.php");
}