<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex justify-content-center align-items-start vh-100" style="padding-top: 50px;">
    <div class="card p-4 shadow-lg" style="max-width: 800px; width: 100%;">
        <h1 class="text-center mb-4">Carrello</h1>
        <form method="POST" action="">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                    <tr>
                        <th>Seleziona</th>
                        <th>Nome Articolo</th>
                        <th>Quantità</th>
                        <th>Prezzo per Elemento</th>
                        <th>Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $totalPrice = 0; // Inizializza il totale
                    if (isset($_SESSION['email'])): 
                        foreach ($_SESSION['cart'] as $id => $item): 
                            $totalPrice += $item['price'] * $item['quantity']; // Calcola il totale
                    ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_items[]" value="<?= $id ?>" class="form-check-input">
                            </td>
                            <td>
                                <a href="product.php?id=<?= $id ?>" class="text-decoration-none">
                                    <?= htmlspecialchars($item['name']) ?>
                                </a>
                            </td>
                            <td>
                                <?= $item['quantity'] ?>
                            </td>
                            <td>
                                &euro;<?= number_format($item['price'], 2) ?>
                            </td>
                            <td>
                                <form method="POST" action="" class="d-inline">
                                    <input type="hidden" name="item_id" value="<?= $id ?>">
                                    <button type="submit" name="remove" class="btn btn-danger btn-sm">Rimuovi</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!isset($_SESSION['email'])): ?>
                        <h2 class="text-center mb-4">Necessita accesso per accedere al carrello</h2>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Box Totale e Pulsanti -->
            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">Prezzo Totale: &euro;<?= number_format($totalPrice, 2) ?></h4>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="remove_selected" class="btn btn-warning">Rimuovi Articoli Selezionati</button>
                    <button type="submit" name="remove_all" class="btn btn-danger">Rimuovi Tutti gli Articoli</button>
                    <button type="submit" name="open_loading" class="btn btn-success">Procedi al Checkout</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
