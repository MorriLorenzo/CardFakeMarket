<?php 
//solo game e name funzionano

if(isset($cards) && !empty($cards)){?>
    <div class="card-container">
        <?php foreach ($cards as $card): ?>
            <div class="card" style="width: 18rem;">
                <img src="<?php echo htmlspecialchars($card['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($card['description']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($card['description']); ?></h5>
                    <p class="card-text">set di apparteneza:<?php echo htmlspecialchars($card['name']); ?></p>
                    <a href="index.php?page=card_detail.php&id=<?php echo $card['code']; ?>" class="btn btn-primary">acquista</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php 
} else {
    echo '<p>No cards available.</p>';
}
?>