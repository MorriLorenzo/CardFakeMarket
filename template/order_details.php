<div class="order_card mx-auto my-4 p-3 border rounded shadow-sm bg-white" style="max-width: 600px;">
    <h1 class="text-center">Order <?php echo $order_id ?> Details</h1>
    <?php foreach ($order_cards as $ocard): ?>
        <?php $id=0; ?>
        <div class="order-card border p-3 rounded shadow-sm bg-light mb-3">
            <h2><?php echo "Card " . $ocard['card_code']; ?></h2>
            <p>Price: $<?php echo ($cards[$id]['price'])*$ocard['quantity'] ?> Quantity: <?php echo $ocard['quantity']; ?></p>
            <a href="buy_again.php?order_id=<?php echo $order['order_id']; ?>">
                <button class="btn btn-primary w-100">Buy Again</button>
            </a>
        </div>
        <?php $id++; ?>
    <?php endforeach; ?>
    <a href="<?php echo isset($notification) ? 'notifications.php' : 'orders.php'; ?>">
        <button class="btn btn-secondary w-100">Back</button>
    </a>
</div>
