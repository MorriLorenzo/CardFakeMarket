<?php
session_start();
require_once("bootstrapt.php");
require_once("db/database.php");
if(isset($_SESSION['email'])){

    // Controlla se la richiesta proviene dal form
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['open_loading'])) {
        $_SESSION['can_access_page'] = true; // Autorizza temporaneamente l'accesso

        $cart = $dbh->getCart($_SESSION['email']); // Ciclo cart
        $verify = true;
        foreach ($cart as $card) {
            $quantity = $card['card_quantity'];
            $stock = $dbh->getStock($card['card_code']);
            if ($stock < $quantity) {
                // Messaggio di errore
                $verify = false;
            }
        }

        if ($verify) {// TODOcazz se ci sono elementi sballati faccio reset automatico di quegli elementi o lacio stare? per ora lascio stare
            $total_price = 0;
            // TODO l'articolo con num = 0 non deve essere incluso nel conteggio finale
            foreach ($cart as $card) {
                $total_price += $card['card_price'] * $card['card_quantity'];
            }
            $orderId = $dbh->insertOrder($_SESSION['email'], count($cart), $total_price);
            $adminMails = $dbh->getAdminEmails();
            foreach ($cart as $card) {
                foreach ($adminMails as $adminMail) {
                    $dbh->sendNotification(0, "ordine effettuato", $adminMail, null, $orderId);
                }
            }
            $dbh->sendNotification(0, "ordine in consegna", $_SESSION['email'], null, $orderId);
            foreach ($cart as $card) {
                $dbh->insertOrderCard($orderId, $card['card_code'], $card['card_quantity']);
                $dbh->removeFromInventory($card['card_code'], $card['card_quantity']);
                $stock = $dbh->getStock($card['card_code']);
                if ($stock == 0) { // Per l'ordine agli utenti
                    $adminMails = $dbh->getAdminEmails();
                    foreach ($adminMails as $adminMail) {
                        $dbh->sendNotification(0, "carta esaurita", $adminMail, $card['card_code'], null);
                    }
                }
            }

            // Rimuovo tutti gli elementi dal carrello dopo aver fatto l'ordine
            $dbh->removeAllItemsFromCart($_SESSION['email']);
            

        }
        header('Location: loading.php'); // Reindirizza alla pagina di caricamento
        exit;  
    }

    // Funzione per rimuovere un articolo dal carrello
    if (isset($_POST['remove'])) {
        $code = $_POST['item_id'];
        $userEmail = $_SESSION['email'];
        $dbh->removeItemFromCart($code, $userEmail);
        // Refresh the cart items
        header('Location: cart.php');
        exit;
    }

    // Rimuovi articoli selezionati
    if (isset($_POST['remove_selected'])) {
        if (!empty($_POST['selected_items'])) {
            $selectedItems = $_POST['selected_items'];
            foreach ($selectedItems as $item) {
                // Fai qualcosa con ogni $item (che corrisponde a un card_code)
                $dbh->removeItemFromCart(htmlspecialchars($item), $_SESSION['email']);
            }
        } else {
            echo "No items selected.";
        }
    } 

    // Rimuovi tutti gli articoli
    if (isset($_POST['remove_all'])) {
        $userEmail = $_SESSION['email'];
        $dbh->removeAllItemsFromCart($userEmail);
        // Refresh the cart items
        header('Location: cart.php');
        exit;
    }

    // Funzione per aumentare la quantità di un articolo nel carrello
    if (isset($_POST['increase_quantity'])) {
        $code = $_POST['card_code'];
        $userEmail = $_SESSION['email'];
        $dbh->increaseQuantity($code, $userEmail);
        // Refresh the cart items
        header('Location: cart.php');
        exit;
    }

    
    // Funzione per diminuire la quantità di un articolo nel carrello
    if (isset($_POST['decrease_quantity'])) {
        $code = $_POST['card_code'];
        $userEmail = $_SESSION['email'];
        $dbh->decreaseQuantity($code, $userEmail);
        // Refresh the cart items
        header('Location: cart.php');
        exit;
    }

    #nome pagina da visualizzare nel base
    $page = "form_cart.php";

}else{

    header("Location: login.php");
    exit;

}

require 'template/base.php';


//detrazione degli elementi dall'acquisto, se gli elementi diventano 0 invio notifica all'admin con [carta esaurita] e codice della carta <-- modello come notifica
//se carta esaurita send solo a admin e il card code al posto di null va codice (nella notifica)
//se ordine in consegna si manda notifica a utente, id ordine come order id di notifica
//se una carta è esaurita deve essere rimossa dal cart
?>

