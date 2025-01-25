<?php
session_start();
require_once("bootstrapt.php");

if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}else{
    $email=$_SESSION['email'];
    $dbh->deleteUser($email);
    header("Location: logout.php");
}