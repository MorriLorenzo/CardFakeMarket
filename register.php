<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location: index.php");
}else{
    require_once("bootstrapt.php");

    #nome pagina da visualizzare nel base
    $page = "form_register.php";

    require 'template/base.php';
}
?>