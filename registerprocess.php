<?php
session_start();
require_once("./bootstrapt.php");

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
                    //TODO piu carino ma non ho voglia ora
                    header("Location: index.php");
                }
            }else{
                $error="Errore nell'inserimento!";
                require('./register.php');
            }
        }else{
            $error="Email già usata!";
            require('./register.php');
        }
    } else {
        // Gestisci il caso in cui i dati non siano presenti
        $error = "Dati mancanti!";
        require('./register.php');
        exit;
    }
} else {
    $error = "Il modulo non è stato inviato correttamente.";
    require('./register.php');
    exit;
}

?>