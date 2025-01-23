<div class="container mt-4 d-flex flex-wrap justify-content-center">
    <?php foreach ($games as $game): ?>
        <div class="card mb-3 me-3" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($game); ?></h5>
                <div class="d-flex justify-content-around">
                    <button class="btn btn-primary" onclick="editGame('<?php echo htmlspecialchars($game); ?>')">Edit</button>
                    <button class="btn btn-danger" onclick="deleteGame('<?php echo htmlspecialchars($game); ?>')">Delete</button>
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

<script>
    // TODO: Finish this!
// Functions for editing and deleting
function editGame(game) {
    // Add your code here to handle editing
}

function deleteGame(game) {
    const confirmation = confirm('Are you sure you want to delete ' + game + '?');
    if (confirmation) {
        // Add your code here to handle deletion
    }
}
</script>
