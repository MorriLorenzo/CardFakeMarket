<div class="card-wrapper">
    <div class="card-inspected" style="width: 18rem; display: flex; flex-direction: row;">
        <img src="<?php echo htmlspecialchars($card['image']); ?>" class="card-inspected-img" alt="<?php echo htmlspecialchars($card['description']); ?>" style="width: 50%;">
        <div class="card-inspected-body" style="width: 50%;">
            <h5 class="card-inspected-title"><?php echo htmlspecialchars($card['description']); ?></h5>
            
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($card['code']); ?>">
            <?php if(isset($_SESSION['email'])){ ?>
                <p id="total-price" data-unit-price="<?php echo htmlspecialchars($card['price']); ?>">
                    Prezzo totale: € <?php echo htmlspecialchars($card['price']); ?>
                </p>
                <!-- Un unico form per aggiungere al carrello -->
                <form id="cart-form" method="POST" action="add_to_cart.php">
                    <input type="number" id="quantity" name="quantity" min="1" max="<?php echo htmlspecialchars($card['quantity']); ?>" value="1" style="width: 50%;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($card['code']); ?>">
                    <button type="submit" class="btn btn-success" style="margin-top: 10px;" >Aggiungi al carrello</button>
                </form>
            <?php } else { ?>
                <p>Per acquistare effettua il <a href="login.php">login</a></p>
            <?php } ?>
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
            <a href="index.php?page=card_detail.php&id=<?php echo urlencode($product['code']); ?>" class="product-detail-card">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-detail-img" alt="<?php echo htmlspecialchars($product['description']); ?>" style="max-width: 100%; height: auto;" />
                <h5 class="card-detail-title"><?php echo htmlspecialchars($product['description']); ?></h5>
            </a>
        <?php }; ?>
    <?php endforeach; ?>
</div>

<script src="bootstrap/quantity.js"></script>
