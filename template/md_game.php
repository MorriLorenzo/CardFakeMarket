<div class="container mt-4 d-flex justify-content-center">
    <?php foreach ($games as $game): ?>
        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title"><?php echo htmlspecialchars($game); ?></h5>
                <div class="d-flex justify-content-around">
                    <button class="btn btn-primary" onclick="modificaGioco('<?php echo htmlspecialchars($game); ?>')">Modifica</button>
                    <button class="btn btn-danger" onclick="eliminaGioco('<?php echo htmlspecialchars($game); ?>')">Elimina</button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    //TODO da finire!
// Funzioni per la modifica e l'eliminazione
function modificaGioco(game) {
    // Aggiungi qui il codice per gestire la modifica
}

function eliminaGioco(game) {
    const conferma = confirm('Sei sicuro di voler eliminare ' + game + '?');
    if (conferma) {
        // Aggiungi qui il codice per gestire l'eliminazione
    }
}
</script>

