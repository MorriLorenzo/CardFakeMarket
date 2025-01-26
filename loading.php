<?php
    session_start();
    require_once("bootstrapt.php");

    // Controlla se l'accesso è autorizzato
    if (!isset($_SESSION['can_access_page']) || $_SESSION['can_access_page'] !== true) {
        header('Location: index.php'); // Reindirizza alla pagina di origine
        exit;
    } else {
        $_SESSION['can_access_page'] = false;
    }

    if (isset($_POST['return_menu'])) {
        unset($_SESSION['can_access_page']); // Revoca l'autorizzazione dopo l'accesso dopo che finisce il caricamento del form
        header('Location: index.php'); // Reindirizza alla pagina di caricamento
        exit;
    }

    $page = "form_loading.php";
    require 'template/base.php';
?>