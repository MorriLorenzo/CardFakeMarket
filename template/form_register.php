<?php
// Se $edit non è definito, impostalo a false
$edit = isset($edit) ? $edit : false;
?>

<div class="d-flex justify-content-center align-items-start vh-100" style="padding-top: 50px;">
    <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%;">
        <form action="<?php echo $edit ? './ce_user.php' : './registerprocess.php'; ?>" method="POST">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required value="<?php echo isset($user['first_name']) ? htmlspecialchars($user['first_name']) : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required value="<?php echo isset($user['last_name']) ? htmlspecialchars($user['last_name']) : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required value="<?php echo isset($user['address']) ? htmlspecialchars($user['address']) : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>" <?php echo $edit ? 'readonly' : ''; ?>>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" <?php echo $edit ? '' : 'required'; ?>>
            </div>

            <button type="submit" class="btn btn-primary w-100"><?php echo $edit ? 'Save Changes' : 'Register'; ?></button>
        </form>

        <?php if ($edit): ?>
            <form action="./delete_account.php" method="POST" class="mt-3">
                <button type="submit" class="btn btn-danger w-100">Delete Account</button>
            </form>
        <?php endif; ?>
    </div>
</div>