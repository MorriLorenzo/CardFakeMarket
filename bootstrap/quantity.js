document.addEventListener('DOMContentLoaded', function () {
    const quantityInput = document.getElementById('quantity');
    const productId = document.querySelector('input[name="id"]').value;
    const priceElement = document.getElementById('total-price'); // Elemento per mostrare il prezzo totale
    const unitPrice = parseFloat(priceElement.dataset.unitPrice); // Prezzo per unità (passato come dataset)

    // Carica la quantità salvata dal localStorage all'avvio
    const savedQuantity = localStorage.getItem(`quantity_${productId}`);
    if (savedQuantity) {
        quantityInput.value = savedQuantity; // Ripristina il valore salvato
        updatePrice(savedQuantity); // Aggiorna il prezzo all'avvio
    }

    // Aggiorna la quantità salvata quando l'utente cambia il valore
    quantityInput.addEventListener('change', function () {
        const quantity = this.value;

        // Salva la quantità nel localStorage per questo prodotto
        localStorage.setItem(`quantity_${productId}`, quantity);

        // Aggiorna il prezzo
        updatePrice(quantity);

        // Esegui la chiamata fetch per inviare il dato al server
        fetch('../update_quantity.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${encodeURIComponent(productId)}&quantity=${encodeURIComponent(quantity)}`
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Quantità aggiornata con successo!');
                } else {
                    alert('Errore: ' + data.message);
                    // Se errore, ripristina il valore precedente
                    quantityInput.value = localStorage.getItem(`quantity_${productId}`) || 1;
                    updatePrice(quantityInput.value); // Aggiorna il prezzo in base al valore ripristinato
                }
            })
            .catch(error => {
                console.error('Errore nella richiesta fetch:', error);
            });
    });

    // Funzione per aggiornare il prezzo totale
    function updatePrice(quantity) {
        const totalPrice = (unitPrice * quantity).toFixed(2); // Calcola il totale (2 decimali)
        priceElement.textContent = `Prezzo totale: € ${totalPrice}`; // Aggiorna il testo
    }
});
