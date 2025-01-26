<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando l'Acquisto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <!-- Spinner -->
        <div id="loading" class="d-block">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Caricamento...</span>
            </div>
            <h3 class="mt-3">Processando l'acquisto...</h3>
        </div>

        <!-- Messaggio di conferma nascosto inizialmente -->
        <div id="confirmation" class="text-success d-none">
            <img src="img/confirmation.png" alt="Conferma" width="64" height="64">
            <h3 class="mt-3">Conferma</h3>
            <form method="POST" action="" class="d-inline">
                <button type="submit" name="return_menu" class="btn btn-primary mt-3">Torna al Menu</button>
            </form>
        </div>

        <!-- Messaggio di negazione nascosto inizialmente -->
        <div id="un-confirmation" class="text-danger d-none">
            <img src="img/negation.png" alt="Negazione" width="64" height="64">
            <h3 class="mt-3">Negazione</h3>
            <form method="POST" action="" class="d-inline">
                <button type="submit" name="return_menu" class="btn btn-primary mt-3">Torna al Menu</button>
            </form>
        </div>
    </div>
</div>

<script src="js/button_timer_loading.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>