<div class="modal fade" id="newChatModal" tabindex="-1" aria-labelledby="newChatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newChatModalLabel">Start New Conversation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="userSelect" class="form-label">Select User</label>
                <select id="userSelect" class="form-control">
                    <?php
                    $users = $mysqli_connect->query("SELECT * FROM tbl_users WHERE user_id != '$_SESSION[dvsa_user_id]' ");
                    while ($user = $users->fetch_assoc()) {
                        echo "<option value='".$user['user_id']."'>".$user['user_fname']." ".$user['user_lname']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="startConversation()">Start Chat</button>
            </div>
        </div>
    </div>
</div>
