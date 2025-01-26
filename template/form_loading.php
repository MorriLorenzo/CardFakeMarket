SONO FORM
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

<script src="./js/button_timer_loading.js"></script>
