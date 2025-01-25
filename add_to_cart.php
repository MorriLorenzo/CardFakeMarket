<?php 
session_start();
require_once("bootstrapt.php");
    $dbh->AddToCart($_POST['id'],$_SESSION['email'],$_POST['quantity']);
    header("Location: index.php?page=cart.php"); 
?>