<?php
require_once '../core/config.php';
$sender_id = $mysqli_connect->real_escape_string($_POST['id']);
$user_id = $_SESSION['dvsa_user_id'];

?>

<div class="d-flex justify-content-between align-items-center border-bottom pb-2">
    <div class="d-flex align-items-center">
        <span class="rounded-circle me-2" alt="User"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
            </svg></span>
        <h6 class="m-0"><?= getUser($sender_id) ?></h6>
    </div>
</div>

<!-- Chat Messages -->
<div class="chat-box p-3" style="height: 400px; overflow-y: auto;">
    <?php
    $fetch = $mysqli_connect->query("SELECT * from tbl_messages WHERE (receiver_id='$sender_id' AND sender_id='$user_id') OR (receiver_id='$user_id' AND sender_id='$sender_id') ORDER BY date_added ASC");
    while ($row = $fetch->fetch_assoc()) {

        if($row['receiver_id'] == $user_id){
    ?>
        <div class="d-flex mb-3">
            <div class="bg-light p-2 rounded">
                <p class="m-0"><?= $row['text'] ?></p>
                <small class="text-muted"><?= timeAgoFromDatetime($row['date_added']) ?></small>
            </div>
        </div>
    <?php }
    if($row['sender_id'] == $user_id){
    
    ?>
        <div class="d-flex justify-content-end mb-3">
            <div class="bg-primary text-white p-2 rounded">
                <p class="m-0"><?= $row['text'] ?></p>
                <small class="text-light"><?= timeAgoFromDatetime($row['date_added']) ?></small>
            </div>
        </div>
    <?php } } ?>
</div>

<!-- Message Input -->
<div class="mt-3">
    <div class="input-group">
        <input type="text" id="text_" class="form-control" placeholder="Type a message...">
        <button onclick="submitSend(<?= $sender_id ?>)" class="btn btn-primary">Send</button>
    </div>
</div>