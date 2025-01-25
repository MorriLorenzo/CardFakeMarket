<div class="order_card m-3">
    <h1>Order <?php echo $order_id ?> Details</h1>
    <?php foreach ($order_cards as $ocard): ?>
        <?php $id=0; ?>
        <div class="order-card position-relative border p-3 rounded shadow-sm bg-light mb-3">
            <h1><?php echo "Card " . $ocard['card_code']; ?></h1>
            <p>Price: $<?php echo ($cards[$id]['price'])*$ocard['quantity'] ?> Quantity: <?php echo $ocard['quantity']; ?></p>
            
            <!-- da sistemare! -->
            <a href="buy_again.php?order_id=<?php echo $order['order_id']; ?>">
                <button class="btn btn-primary position-absolute bottom-0 end-0 mb-2 me-2">Buy Again</button>
            </a>
        </div>
        <?php $id++; ?>
    <?php endforeach; ?>
    <a href="<?php echo isset($notification) ? 'notifications.php' : 'orders.php'; ?>">
        <button class="btn btn-primary position-absolute end-0 mb-2 me-2">Back</button>
    </a>
</div>