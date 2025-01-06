<?php
require_once("./bootstrapt.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se i dati sono stati inviati correttamente
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['address'])) {
        $email = $_POST['email'];
        if(!($dbh->checkEmail($email))){
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $noadmin=0;

            if($dbh->insertUser($email, $first_name, $last_name, $address, $noadmin, $password)) {
                if($dbh->insertCart($email)){
                    //TODO piu carino ma non ho voglia ora -> alert?
                    header("Location: index.php");
                }
            }else{
                $_SESSION['error'] = "Errore nell'inserimento!";
                header("Location: register.php");
            }
        }else{
            $_SESSION['error'] ="Email già usata!";
            header("Location: register.php");
        }
    } else {
        // Gestisci il caso in cui i dati non siano presenti
        $_SESSION['error'] = "Dati mancanti!";
        header("Location: register.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Il modulo non è stato inviato correttamente.";
    header("Location: register.php");
    exit;
}

?>