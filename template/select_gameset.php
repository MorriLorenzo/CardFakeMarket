<div class="container">
    <h1 class="text-center fw-bold">SELECT SET</h1>


    <div id="carouselExampleIndicators" class="carousel slide mb-4 mx-auto" style="max-width: 600px;"> 
        <?php $cards = $dbh->getRandomCards("3", $game); ?>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $cards[0]['image']; ?>" class="d-block w-100" alt="1">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $cards[1]['image']; ?>" class="d-block w-100" alt="2">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $cards[2]['image']; ?>" class="d-block w-100" alt="3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Griglia dei set -->
    <div class="d-flex flex-wrap justify-content-center gap-3">
        <?php foreach ($sets as $set): ?>
            <?php 
                // Percorso dell'immagine
                $imagePath = "img/" . $set . ".png";
                // Verifica se l'immagine esiste
                $imageExists = file_exists($imagePath);
            ?>
            <a href="home.php" id="<?php echo $set; ?>" style="text-decoration: none; color: inherit;">
                <div class="d-flex align-items-center justify-content-center border mb-4"

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
