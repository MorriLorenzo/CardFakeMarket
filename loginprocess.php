<?php

require_once("./bootstrapt.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se i dati sono stati inviati correttamente
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if($dbh->checkUser($email, $password)) {
            
            $_SESSION['email'] = $email;
            
            header("Location: index.php");
        }else{
            $_SESSION['error'] ="Email e/o password errate!";
            header("Location: login.php");
        }
    } else {
        // Gestisci il caso in cui i dati non siano presenti
        $_SESSION['error'] = "Email e/o password mancanti!";
        header("Location: login.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Il modulo non è stato inviato correttamente.";
    header("Location: login.php");
    exit;
}

?>