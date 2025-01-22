<div class="card mx-auto mt-5" style="max-width: 400px;">
  <div class="card-body">
    <h5 class="card-title text-center">Inserisci un GameSet</h5>
    <form action="submit_gameset.php" method="POST">
      <div class="mb-3">
        <label for="gameset-name" class="form-label">Nome del GameSet</label>
        <input type="text" class="form-control" id="gameset-name" name="gameset-name" required>
      </div>
      <div class="mb-3">
        <label for="gameset-date" class="form-label">Data</label>
        <input type="date" class="form-control" id="gameset-date" name="gameset-date" required>
      </div>
      <div class="mb-3">
        <label for="game-id" class="form-label">Gioco</label>
        <select class="form-select" id="game-id" name="game-id" required>
          <option value="" disabled selected>Seleziona un gioco</option>
          <?php
          foreach ($games as $game) {
              echo "<option value='$game'>$game</option>";
          }
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary w-100">Invia</button>
    </form>
  </div>
</div>
