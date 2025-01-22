<div class="card mx-auto mt-5" style="max-width: 400px;">
  <div class="card-body">
    <h5 class="card-title text-center">Inserisci il Nome del Gioco</h5>
    <form action="submit_game.php" method="POST">
      <div class="mb-3">
        <label for="game-name" class="form-label">Nome del gioco</label>
        <input type="text" class="form-control" id="game-name" name="game-name" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Invia</button>
    </form>
  </div>
</div>
