<div class="orders">
    <?php foreach ($orders as $order): ?>
        <div class="order-card position-relative border p-3 rounded shadow-sm bg-light">
            <p>Order Id: <?php echo $order['id'] ?></p>
            <p>Date: <?php echo $order['order_date'] ?></p>
            <p>Total quantity: <?php echo $order['quantity'] ?></p>
            <p>Total price: <?php echo $order['total_price'] ?></p>
            <a href="order_detail.php?id=<?php echo $order['id']; ?>"><button class="btn btn-primary position-absolute bottom-0 end-0 mb-2 me-2">Details</button></a>
        </div>
    <?php endforeach; ?>
</div>


