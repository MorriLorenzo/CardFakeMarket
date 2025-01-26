<div class="container mt-4 d-flex flex-wrap justify-content-center">
    <?php foreach ($setts as $sett): ?>
        <div class="card mb-3 me-3" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo $sett['name']; ?> - <?php echo $sett['game_name']; ?></h5>
                <div class="d-flex justify-content-around">
                    <form method="POST" action="edit_gameset.php">
                        <input type="hidden" name="gameset" value="<?php echo $sett['code']; ?>">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    <form method="POST" action="delete_gameset.php">
                        <input type="hidden" name="gameset" value="<?php echo $sett['code']; ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete <?php echo $sett['name']; ?>?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="w-100 text-center">
        <a href="admin.php">
            <button class="btn btn-primary mt-3">Back</button>
        </a>
    </div>
</div>
