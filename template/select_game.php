<div class="container">
    <h1 class="text-center fw-bold">SELECT GAME</h1>
    <div class="d-flex flex-wrap justify-content-center gap-1">
        
        <?php foreach ($games as $game): ?>
        <a href="home.php" id="<?php echo $game; ?>" style="text-decoration: none; color: inherit;">
            <div class="d-flex align-items-center justify-content-center border" 
                style="height: 200px; width: 200px; font-size: 1.2rem;">
                
                <?php echo $game ?>
                
            </div>
        </a>
        <?php endforeach; ?>
        
    </div>
</div>


