<?php
session_start();
require_once("bootstrapt.php");
if(isset($_SESSION['email'])){
    
    // Simulazione dati da db
    $items = [
    1 => ['name' => 'Articolo 1', 'price' => 10.00],
    2 => ['name' => 'Articolo 2', 'price' => 15.00],
    3 => ['name' => 'Articolo 3', 'price' => 20.00],
    ];

    // Funzione per rimuovere un articolo dal carrello
    if (isset($_POST['remove'])) {
    $itemId = $_POST['item_id'];
    unset($_SESSION['cart'][$itemId]);
    }

    // Controlla se la richiesta proviene dal form
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['open_loading'])) {
        $_SESSION['can_access_page'] = true; // Autorizza temporaneamente l'accesso
        header('Location: loading.php'); // Reindirizza alla pagina di caricamento
        exit;
    }

    // Rimuovi articoli selezionati
    if (isset($_POST['remove_selected']) && !empty($_POST['selected_items'])) {
        foreach ($_POST['selected_items'] as $itemId) {
            unset($_SESSION['cart'][$itemId]);
        }
    }

    // Rimuovi tutti gli articoli
    if (isset($_POST['remove_all'])) {
        $_SESSION['cart'] = [];
    }

    // Inizializza il carrello, togliere e mettere ! per test
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        foreach ($items as $id => $item) {
            $_SESSION['cart'][$id] = ['name' => $item['name'], 'quantity' => 1, 'price' => $item['price']];
        }
    }

    //recupera cart

    #nome pagina da visualizzare nel base
    $page = "form_cart.php";
    require 'template/base.php';
    


}else{

    header("Location: login.php");

}

require 'template/base.php';

//issue:se sono loggato non mi fa vedere questa pagina, se non sono loggato funziona tutto
//bisogna ricaricare la pagina per vedere gli elementi aggiornati del carrello

?>

