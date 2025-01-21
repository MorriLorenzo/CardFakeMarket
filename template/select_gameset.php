<div class="container">
    <h1 class="text-center fw-bold">SELECT SET</h1>
    <div>
        
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-1">
    
        <?php foreach ($sets as $set): ?>
            <?php 
                // Percorso dell'immagine
                $imagePath = "img/" . $set . ".png";
                // Verifica se l'immagine esiste
                $imageExists = file_exists($imagePath);
            ?>
            <a href="home.php" id="<?php echo $set; ?>" style="text-decoration: none; color: inherit;">
                <div class="d-flex align-items-center justify-content-center border" 
                    style="height: 200px; width: 200px; font-size: 1.2rem; 
                    <?php if ($imageExists): ?>
                        background: url('<?php echo $imagePath; ?>') no-repeat center center; background-size: cover;
                    <?php endif; ?>">
                    
                    <?php if (!$imageExists): ?>
                        <?php echo $set; ?>
                    <?php endif; ?>
                    
                </div>
            </a>
        <?php endforeach; ?>
        
    </div>
</div>