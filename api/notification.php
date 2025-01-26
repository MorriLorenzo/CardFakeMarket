<?php
session_start();
require_once("../bootstrapt.php");

if(!isset($_SESSION['email'])){
    exit();
}

$email = $_SESSION['email'];
$notification = $dbh->getLastNotificationByEmail($email);

// Initialize $last if not already set in session
if (!isset($_SESSION['last'])) {
    $_SESSION['last'] = 0;
}

// Set $last from session
$last = $_SESSION['last']; 

if ($last === null) {
    $last = 0;
}

if (is_array($notification) && isset($notification['id']) && $notification['id'] > $last) {
    $output = ''; // Variabile per memorizzare l'esito

    ob_start(); // Inizia l'output buffering
    ?>

    <?php if (isset($notification['status']) && $notification['status'] != 1): ?>
        <div class="position-absolute bottom-0 end-0 m-3" style="width: 18rem;" id="autoDismissCard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notification</h5>
                    <p class="card-text">
                        <?php echo htmlspecialchars($notification['message']); ?>
                    </p>
                    <a href="notifications.php" class="btn btn-primary btn-sm">Notifications</a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $output = ob_get_clean(); // Salva il contenuto dell'output buffer nella variabile
    $_SESSION['last'] = $notification['id'];
    echo $output; // Stampa l'esito
} else {
    $_SESSION['last'] = isset($notification['id']) ? $notification['id'] : 0;
}
?>
