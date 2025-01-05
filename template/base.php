<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <title>CardFakeMarket</title>
    <!-- Includi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fuild p-0 overflow-visible justify-content-center mb-6" >
        <header class="border-bottom py-2">
            <!-- Usa .container solo per il contenuto -->
            <div class="container">
                <div class="d-flex align-items-center flex-wrap">
                    <img src="img/logo2.png" alt="Logo" class="rounded-circle me-3 logo-lg ">
                    <h1 class="mb-0 navbar-expand-lg">
                        <a href="index.php" class="navbar-brand">CardFakeMarket</a>
                    </h1>
                </div>
                <?php if (!isset($_SESSION['email'])): ?>
                
                <nav>
                    <ul class="list-unstyled d-flex mb-0 flex-wrap">
                        <li class="ms-3">
                            <button class="btn" id="signIn">Sign In</button>
                        </li>
                        <li class="ms-3">
                            <button class="btn btn-inverted" id="signUp">Sign Up</button>
                        </li>
                        <script src="./js/button_login.js"></script>
                    </ul>
                </nav>

                <?php else: ?>
                <!-- da sistemare per bene con home -->
                <nav>
                    <ul class="list-unstyled d-flex mb-0">
                        <li class="ms-3">
                            <button class="btn" id="logout">Logout</button>
                        </li>
                        <script src="./js/button_logout.js"></script>
                    </ul>
                </nav>

                <?php endif; ?>
            </div>
        </header>
    </div>
    
    <?php
    if(isset($page)){
        //visualizza contenuto della pagina scelta
        require($page);
    }
    ?>

    <?php if (isset($_SESSION['email'])){
        //se sei loggato stampa mail
        echo $_SESSION['email'];
    } ?>

</body>
</html>