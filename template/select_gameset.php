<div class="container">
    <nav class="navbar navbar-expand-lg justify-content-center">
        <div class="container-fluid justify-content-center">
            <div class="justify-content-center" id="navbarSupportedContent">
                <!--- a -->
                <form class="d-flex justify-content-center" role="search" method="POST" action="index.php?page=card_table.php&game=<?php echo $game; ?>">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
                    <input type="hidden" id="language-input" name="language">
                    <input type="hidden" id="set-input" name="set">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="dropdown">
                    <img src="img/filter.png" alt="Dropdown" class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="height: 40px;">
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu position-relative">
                            <a class="dropdown-item dropdown-toggle" href="#">Filter for language</a>
                            <ul class="dropdown-menu position-absolute" style="left: 100%; top: 0;">
                                <?php 
                                $languages = $dbh->getLanguages();
                                foreach ($languages as $language): ?>
                                    <li><a class="dropdown-item language-item" href="#" data-language="<?php echo $language; ?>"><?php echo $language; ?></a></li>
                                <?php endforeach; ?> 
                            </ul>
                        </li>
                        <li class="dropdown-submenu position-relative">
                            <a class="dropdown-item dropdown-toggle" href="#">Filter for set</a>
                            <ul class="dropdown-menu position-absolute" style="left: 100%; top: 0;">
                                <?php 
                                $sets = $dbh->getGameSets($game);
                                foreach ($sets as $set): ?>
                                    <li><a class="dropdown-item gameset-item" href="#" data-set="<?php echo $set; ?>"><?php echo $set; ?></a></li>
                                <?php endforeach; ?> 
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide mb-4 mx-auto" style="max-width: 300px;"> 
        <?php $cards = $dbh->getRandomCards("3", $game); ?>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo $cards[0]['image']; ?>" class="d-block w-100" alt="<?php echo $cards[0]['description']; ?>">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $cards[1]['image']; ?>" class="d-block w-100" alt="<?php echo $cards[1]['description']; ?>">
            </div>
            <div class="carousel-item">
                <img src="<?php echo $cards[2]['image']; ?>" class="d-block w-100" alt="<?php echo $cards[2]['description']; ?>">
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
            $imagePath = "img/" . $set . ".png";
            $imageExists = file_exists($imagePath);
        ?>
        <form action="index.php?page=card_table.php&game=<?php echo $game; ?>" method="POST" style="display: inline;">
            <input type="hidden" name="set" value="<?php echo $set; ?>">
            <input type="hidden" name="language" value="">
            <input type="hidden" name="name" value="">
            <button type="submit" id="<?php echo $set; ?>" style="border: none; background: none; text-decoration: none; color: inherit; padding: 0;">
                <div class="d-flex align-items-center justify-content-center border mb-4"
                    style="height: 200px; width: 200px; font-size: 1.2rem; 
                    <?php if ($imageExists): ?>
                        background: url('<?php echo $imagePath; ?>') no-repeat center center; background-size: cover;
                    <?php endif; ?>">
                    <?php if (!$imageExists): ?>
                        <?php echo $set; ?>
                    <?php endif; ?>
                </div>
            </button>
        </form>
    <?php endforeach; ?>
</div>

</div>
<script src="bootstrap/dropdown.js"></script>