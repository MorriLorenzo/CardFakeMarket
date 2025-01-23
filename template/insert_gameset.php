<div class="card mx-auto mt-5" style="max-width: 400px;">
  <div class="card-body">
    <h5 class="card-title text-center">Insert New GameSet</h5>
    <form action="submit_gameset.php" method="POST">
      <div class="mb-3">
        <label for="gameset-name" class="form-label">GameSet Name</label>
        <input type="text" class="form-control" id="gameset-name" name="gameset-name" required>
      </div>
      <div class="mb-3">
        <label for="gameset-date" class="form-label">Date</label>
        <input type="date" class="form-control" id="gameset-date" name="gameset-date" required>
      </div>
      <div class="mb-3">
        <label for="game-id" class="form-label">Game</label>
        <select class="form-select" id="game-id" name="game-id" required>
          <option value="" disabled selected>Select a game</option>
          <?php
          foreach ($games as $game) {
              echo "<option value='$game'>$game</option>";
          }
          ?>
        </select>
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