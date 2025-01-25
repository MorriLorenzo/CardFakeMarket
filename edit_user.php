<?php
session_start();
require_once("bootstrapt.php");

if(!isset($_SESSION['email'])){
    header("Location: index.php");
    exit();
}else{
    $email=$_SESSION['email'];
    $user=$dbh->getUser($email);
    $edit=true;
    $page = "form_register.php";
    require 'template/base.php';
}