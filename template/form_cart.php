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
                    <?php foreach ($_SESSION['cart'] as $id => $item ): ?>
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
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>