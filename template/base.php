<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <title>CardFakeMarket</title>
    <!-- Includi Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Apply the rainbow background to the whole page */
        header {
            margin: 0;
            height: 120px;
            background: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet);
            background-size: 400% 400%; /* Expands the gradient to create a smooth transition */
            animation: rainbow 5s ease infinite; /* Animates the background with a 5s cycle */
        }

        .text-aura {
        color: white; /* Base text color */
        text-shadow: 
        0 0 5px #fff, 
        0 0 10px #fff, 
        0 0 20px #ff00ff, /* Neon pink glow */
        0 0 30px #ff00ff, 
        0 0 40px #ff00ff;
        }

        /* Define the animation for the rainbow background */
        @keyframes rainbow {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<body>
    <header class="bg-white border-bottom py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <!-- Logo più grande -->
                <img src="img/logo2.png" alt="Logo" class="rounded-circle me-3 logo-lg">
                <h1 class="text-aura" class="mb-0">CardFakeMarket</h1>
            </div>
            <nav>
                <ul class="list-unstyled d-flex mb-0">
                    <li class="ms-3"><a href="#" class="text-decoration-none text-dark">Sign In</a></li>
                    <li class="ms-3"><a href="#" class="text-decoration-none text-dark">Sign Up</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Includi Bootstrap JS e Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
