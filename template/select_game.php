<div class="container">
    <h1 class="text-center fw-bold">SELECT GAME</h1>
    <div class="d-flex flex-wrap justify-content-center gap-1">
        
        <?php foreach ($games as $game): ?>
            <?php 
                // Percorso dell'immagine
                $imagePath = "img/" . $game . ".png"; 
                // Verifica se l'immagine esiste
                $imageExists = file_exists($imagePath);
            ?>
            <a href="index.php?game=<?php echo $game; ?>&page=select_gameset.php" $game="<?php echo $game; ?>" style="text-decoration: none; color: inherit;">
                <div class="d-flex align-items-center justify-content-center border" 
                    style="height: 200px; width: 200px; font-size: 1.2rem; 
                    <?php if ($imageExists): ?>
                        background: url('<?php echo $imagePath; ?>') no-repeat center center; background-size: cover;
                    <?php endif; ?>">
                    
                    <?php if (!$imageExists): ?>
                        <?php echo $game; ?>
                    <?php endif; ?>
                    
                </div>
            </a>
        <?php endforeach; ?>  
    </div>
</div>

                <!--SCELTA:
                    1)mettere nella tabella giochi anche il percorso dell immagine, e quindi prenderlo con una query
                    2)chiamare le immagini come il gioco +".png" e prenderle sapendo il path (consigliata) -->
