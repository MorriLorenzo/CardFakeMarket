<?php
// Assicurati di avere una connessione al database o un array che gestisce i prodotti
// Supponiamo che $card['quantity'] sia la quantità disponibile nel tuo sistema.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera i dati inviati tramite POST
    $productId = isset($_POST['id']) ? $_POST['id'] : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Esempio di risposta positiva
    echo json_encode(['success' => true, 'message' => 'Quantità aggiornata con successo']);
    
}
?>
