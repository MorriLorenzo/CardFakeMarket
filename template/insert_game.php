<div class="card mx-auto mt-5" style="max-width: 400px;">
  <div class="card-body">
    <h5 class="card-title text-center">Insert New Game</h5>
    <form action="<?php echo isset($edit) && $edit === true ? 'ce_game.php' : 'submit_game.php'; ?>" method="POST">
      <?php if (isset($edit) && $edit === true): ?>
        <input type="hidden" name="old" value="<?php echo htmlspecialchars($game); ?>">
      <?php endif; ?>
      <div class="mb-3">
        <label for="game-name" class="form-label">Game Name</label>
        <input type="text" class="form-control" id="game-name" name="game-name" required value="<?php echo isset($game) ? htmlspecialchars($game) : ''; ?>">
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>
</div>
<div class="w-100 text-center">
  <a href="admin.php">
      <button class="btn btn-primary mt-3">Back</button>
  </a>
</div>