<?php
session_start();
require_once("bootstrapt.php");
require_once("db/database.php");
if(isset($_SESSION['email'])){

    // Controlla se la richiesta proviene dal form
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['open_loading'])) {
        $_SESSION['can_access_page'] = true; // Autorizza temporaneamente l'accesso
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

//Pulla dagli altri branch 
//aggiorna tabella ordini dopo l'acquisto, detrazione degli elementi dall'acquisto, se gli elementi diventano 0 invio notifica all'admin con [carta esaurita] e codice della carta <-- modello come notifica
//devo creare l'ordine -> ogni item si collega con order card
//se un elemento viene acquistato da più utenti contemporaneamente devo far si che il carrello di quell'utente "prenoti" l'item? (se un item viene aggiunto al carrello l'item count di quella carta deve diminuire di 1? (viceversa con la rimoziione))
//la pagina si vede doppia lol

?>

