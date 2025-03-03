<?php

require_once '../core/config.php';

$user_id = $_SESSION['dvsa_user_id'];
$fetch_r = $mysqli_connect->query("SELECT * FROM (SELECT * FROM `tbl_messages` WHERE sender_id='$user_id' OR receiver_id='$user_id' ORDER BY date_added DESC) AS subquery GROUP BY LEAST(sender_id, receiver_id), GREATEST(sender_id, receiver_id)");

while ($r_row = $fetch_r->fetch_assoc()) {
    $chat_name = $r_row['sender_id'] == $user_id ? getUser($r_row['receiver_id']) : getUser($r_row['sender_id']);
    $chat_id = $r_row['sender_id'] == $user_id ? $r_row['receiver_id'] : $r_row['sender_id'];
?>
    <a href="#" onclick="checkMessage(<?= $chat_id ?>)" class="list-group-item list-group-item-action "> <!-- active -->
        <div class="d-flex align-items-center">
            <span class="rounded-circle me-2" alt="User"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                </svg></span>
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <strong><?= $chat_name ?></strong>
                    <small class="text-muted"><?= timeAgoFromDatetime($r_row['date_added']) ?></small>
                </div>
                <span class="text-muted small"><?= $r_row['text'] ?></span>
            </div>
        </div>
    </a>
<?php } ?>