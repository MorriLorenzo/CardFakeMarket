document.addEventListener('DOMContentLoaded', function () {
    const quantityInput = document.getElementById('quantity');
    const priceElement = document.getElementById('total-price'); // Elemento per mostrare il prezzo totale
    const unitPrice = parseFloat(priceElement.dataset.unitPrice); // Prezzo per unità (passato come dataset)

    // Funzione per aggiornare il prezzo totale
    function updatePrice(quantity) {
        const totalPrice = (unitPrice * quantity).toFixed(2); // Calcola il totale (2 decimali)
        priceElement.textContent = `Prezzo totale: € ${totalPrice}`; // Aggiorna il testo
    }

    // Carica la quantità salvata dal localStorage all'avvio
    const productId = document.querySelector('input[name="id"]').value;
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
    });
    
});
