<?php
require_once '../core/config.php';
$user_id  = $_SESSION['dvsa_user_id'];

$fetch_notifications_ = $mysqli_connect->query("SELECT * FROM tbl_notifications WHERE user_id='$user_id' AND status = 1") or die(mysqli_error());

if ($fetch_notifications_->num_rows > 0) {
    while ($notif_row = $fetch_notifications_->fetch_assoc()) {
?>
    <div class="list-group-item">
        <div class="row align-items-center">
            <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
            <div class="col text-truncate">
                <a href="#" class="text-body d-block"><?= htmlspecialchars($notif_row['title']) ?></a>
                <div class="d-block text-muted text-truncate mt-n1">
                    <?= htmlspecialchars($notif_row['remarks']) ?>
                </div>
            </div>
            <div class="col-auto">
                <a href="#" onclick="makedRead(<?= $notif_row['notification_id'] ?>)" class="list-group-item-actions">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-check">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
                        <path d="M15 19l2 2l4 -4" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
<?php
    }
} else {
?>
    <div class="list-group-item text-muted">
        No new notifications.
    </div>
<?php
}
?>
