<?php
    session_start();
    require_once("bootstrapt.php");
    $dbh->getCartItemCount($_SESSION['email']);
?>