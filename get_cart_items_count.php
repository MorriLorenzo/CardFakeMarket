<?php
    session_start();
    require_once("bootstrapt.php");
    $dbh->getEchoCartItemCount($_SESSION['email']);
?>