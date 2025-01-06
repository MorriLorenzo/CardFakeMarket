<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location: index.php");
}else{
    require_once("bootstrapt.php");
    
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    #nome pagina da visualizzare nel base
    $page = "form_login.php";

    require 'template/base.php';
}
?>