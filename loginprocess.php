<?php
session_start();
require_once("./bootstrapt.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se i dati sono stati inviati correttamente
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if($dbh->checkUser($email, $password)) {
            $_SESSION['email'] = $email;
            
            header("Location: index.php");
        }else{
            $error="Email e/o password errate!";
            require('./login.php');
        }
    } else {
        // Gestisci il caso in cui i dati non siano presenti
        $error = "Email e/o password mancanti!";
        require('./login.php');
        exit;
    }
} else {
    $error = "Il modulo non è stato inviato correttamente.";
    require('./login.php');
    exit;
}

?>