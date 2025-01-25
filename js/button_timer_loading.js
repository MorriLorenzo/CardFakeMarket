// Mostra la spunta verde e nasconde il caricamento dopo 5 secondi
setTimeout(() => {
    document.getElementById('loading').classList.add('d-none'); // Nasconde il caricamento

    // Invia una richiesta per ottenere il conteggio degli elementi nel carrello
    fetch('get_cart_items_count.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const itemCount = data.item_count; // Ottieni il conteggio degli elementi nel carrello

        // Condizione per mostrare il messaggio di conferma o di negazione
        if (itemCount === 0) {
            const confirmation = document.getElementById('confirmation');
            confirmation.classList.remove('d-none'); // Mostra il messaggio di conferma
        } else {
            const unConfirmation = document.getElementById('un-confirmation');
            unConfirmation.classList.remove('d-none'); // Mostra il messaggio di negazione
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });

}, 500);