<div class="card-wrapper">
    <div class="card-inspected" style="width: 18rem; display: flex; flex-direction: row;">
        <img src="<?php echo htmlspecialchars($card['image']); ?>" class="card-inspected-img" alt="<?php echo htmlspecialchars($card['description']); ?>" style="width: 50%;">
        <div class="card-inspected-body" style="width: 50%;">
            <h5 class="card-inspected-title"><?php echo htmlspecialchars($card['description']); ?></h5>
            <p id="total-price" data-unit-price="<?php echo htmlspecialchars($card['price']); ?>">
                Prezzo totale: € <?php echo htmlspecialchars($card['price']); ?>
            </p>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($card['code']); ?>">
            <input type="number" id="quantity" name="quantity" min="1" max="<?php echo htmlspecialchars($card['quantity']); ?>" value="1" style="width: 50%;">
            <a href="add_to_cart.php?id=<?php echo urlencode($card['code']); ?>" class="btn btn-success" style="margin-top: 10px;">Aggiungi al carrello</a>
        </div>
    </div>
</div>

<h3>Prodotti simili</h3>

<?php 
    $gs = $dbh->getGameSetByCardCode($card['code']); 
    $similarProducts = $dbh->getFilteredCards($gs[0], $gs[1], $card['language'], "");
?>

<div class="similar-products">
    <?php foreach ($similarProducts as $product): 
        if($product['description']!=$card['description']){?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img" alt="<?php echo htmlspecialchars($product['description']); ?>" />
                <h5 class="card-title"><?php echo htmlspecialchars($product['description']); ?></h5>
            </div>
        <?php }; ?>
    <?php endforeach; ?>
</div>

<style>
.similar-products {
    display: grid; /* Usa la griglia per gestire l'affiancamento delle card */
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Card responsiva che si adattano a seconda della larghezza */
    gap: 15px; /* Spaziatura tra le card */
    margin-top: 20px;
}

.product-card {
    background-color: white;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.2s ease; /* Aggiungi transizione al passaggio del mouse */
}

.product-card:hover {
    transform: scale(1.05); /* Ingrandisci leggermente la card al passaggio del mouse */
}

.card-img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.card-title {
    margin-top: 10px;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .similar-products {
        display: flex;
        overflow-x: auto; /* Abilita lo scroll orizzontale su mobile */
        gap: 10px;
        padding: 10px 0;
    }
    
    .product-card {
        min-width: 150px; /* Le card sono più strette sui dispositivi mobili */
    }
}
</style>

<script src="bootstrap/quantity.js"></script>
