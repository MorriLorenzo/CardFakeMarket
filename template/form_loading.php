    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando l'Acquisto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-in;
        }
        .fade-in.show {
            opacity: 1;
        }
    </style>
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
        <div id="confirmation" class="fade-in text-success d-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm3.97-8.03a.75.75 0 1 1-1.06 1.06L7.477 11.477a.75.75 0 0 1-1.06 0L4.53 9.59a.75.75 0 1 1 1.06-1.06L6.94 9.94l3.47-3.47a.75.75 0 0 1 1.06 0z"/>
            </svg>
            <h3 class="mt-3">Conferma</h3>
            <form method="POST" action="" class="d-inline">
                <button type="submit" name="return_menu" class="btn btn-primary mt-3">Torna al Menu</button>
            </form>
            </div>
    </div>
</div>

<script>
    // Mostra la spunta verde e nasconde il caricamento dopo 5 secondi
    setTimeout(() => {
        document.getElementById('loading').classList.add('d-none'); // Nasconde il caricamento
        const confirmation = document.getElementById('confirmation');
        confirmation.classList.remove('d-none'); // Mostra il messaggio di conferma
        confirmation.classList.add('show'); // Aggiunge l'effetto di dissolvenza
    }, 5000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>