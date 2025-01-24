<div class="notifications container mt-5">
    <h1 class="text-center mb-4">Your Notifications</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php foreach ($notifications as $notification): ?>
                <?php $isUnread = $notification['status'] != 1; ?>
                <div class="notification-card position-relative border p-3 rounded shadow-sm bg-light mb-3 <?php echo $isUnread ? 'fw-bold' : ''; ?>">
                    <p>
                        <?php if ($isUnread): ?>
                            <span class="text-primary">&#9679;</span>
                        <?php endif; ?>
                        Notification Id: <?php echo $notification['id']; ?>
                    </p>
                    <p>Message: <?php echo $notification['message']; ?></p>
                    <div class="d-flex justify-content-end">
                        <?php if ($isUnread): ?>
                            <form action="mark_as_read.php" method="post" class="me-2">
                                <input type="hidden" name="notification_id" value="<?php echo $notification['id']; ?>">
                                <button type="submit" class="btn btn-secondary">Mark as Read</button>
                            </form>
                        <?php endif; ?>
                        <form action="delete_notification.php" method="post">
                            <input type="hidden" name="notification_id" value="<?php echo $notification['id']; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
