<?php
session_start();
if(isset($_SESSION['email'])){
    
    require_once("bootstrapt.php");

    // Inizializza il carrello, togliere e mettere ! per test
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        foreach ($items as $id => $item) {
            $_SESSION['cart'][$id] = ['name' => $item['name'], 'quantity' => 1, 'price' => $item['price']];
        }
    }

    #nome pagina da visualizzare nel base
    $page = "form_cart.php";
    require 'template/base.php';

    header("Location: index.php");
}else{
    require_once("bootstrapt.php");
    
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

// Simulazione dati (in un'applicazione reale, i dati arriveranno dal database)
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

// Inizializza il carrello, togliere e mettere ! per test
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    foreach ($items as $id => $item) {
        $_SESSION['cart'][$id] = ['name' => $item['name'], 'quantity' => 1, 'price' => $item['price']];
    }
}

require 'template/base.php';

//issue:se sono loggato non mi fa vedere questa pagina, se non sono loggato funziona tutto
//bisogna ricaricare la pagina per vedere gli elementi aggiornati del carrello

?>

