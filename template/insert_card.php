<div class="card mx-auto mt-5" style="max-width: 400px;">
    <div class="card-body">
        <h5 class="card-title text-center">
            <?php echo isset($edit) && $edit ? 'Edit Item' : 'Insert Item'; ?>
        </h5>
        <form action="<?php echo isset($edit) && $edit ? 'ce_card.php' : 'submit_card.php'; ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($edit) && $edit): ?>
                <input type="hidden" name="old" value="<?php echo htmlspecialchars($card['code']); ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <input type="text" class="form-control" id="language" name="language" required
                       value="<?php echo isset($card['language']) ? htmlspecialchars($card['language']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required
                       value="<?php echo isset($card['description']) ? htmlspecialchars($card['description']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="set_code" class="form-label">Set Code</label>
                <select class="form-select" id="set_code" name="set_code" required>
                    <option value="" disabled selected>Select a set</option>
                    <?php
                        foreach ($setts as $set) {
                            $value = $set['code'];
                            $name = $set['name'];
                            $gameName = $set['game_name'];
                            // Seleziona automaticamente l'opzione se i codici corrispondono
                            $selected = isset($card['set_code']) && $card['set_code'] == $value ? 'selected' : '';
                            echo "<option value='$value' $selected>$name - $gameName</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo isset($card['quantity']) ? $card['quantity'] : '0'; ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required
                       value="<?php echo isset($card['price']) ? htmlspecialchars($card['price']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
<div class="w-100 text-center">
    <a href="admin.php">
        <button class="btn btn-primary mt-3">Back</button>
    </a>
</div>
