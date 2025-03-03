<div class="container mt-4">
    <div class="row">
        <!-- Sidebar: Conversations List -->
        <div class="col-md-4 border-end p-3 bg-light">
            <h5 class="mb-3">Inbox</h5>
            <button class="btn btn-success w-100 mb-3" data-bs-toggle="modal" data-bs-target="#newChatModal">
                New Conversation
            </button>



            <div class="list-group chat-list" id="dv_list_contacts">

            </div>
        </div>

        <!-- Chat Window -->
        <div class="col-md-8 p-3" id="div_conversation">

        </div>
    </div>


</div>

<?php require_once 'modals/new_convo.php'; ?>
<script>
    function getContacts() {

        $.ajax({
            type: "POST",
            url: "ajax/getContacts.php",

            success: function(data) {
                $("#dv_list_contacts").html(data);

            }
        });
    }

    $(document).ready(function() {
        getContacts();

        setTimeout(() => {
            var firstChat = $(".chat-list a").first();
            if (firstChat.length > 0) {
                var firstChatId = firstChat.attr("onclick").match(/\d+/)[0];
                checkMessage(firstChatId);
            }
        }, 500);
    });


    function startConversation() {
        var selectedUser = $("#userSelect").val();
        if (selectedUser) {
            checkMessage(selectedUser);
            $("#newChatModal").modal("hide");

            // Refresh contacts list
            setTimeout(getContacts, 500);
        }
    }

    function checkMessage(id) {

        getContacts();
        $.ajax({
            type: "POST",
            url: "ajax/getConversation.php",
            data: {
                id: id,
            },
            success: function(data) {
                $("#div_conversation").html(data);
                setTimeout(() => {
                    var chatBox = document.querySelector(".chat-box");
                    chatBox.scrollTop = chatBox.scrollHeight;
                }, 100);
            }
        });
    }

    function submitSend(id) {
        var text_ = $("#text_").val();
        $.ajax({
            type: "POST",
            url: "ajax/submitChat.php",
            data: {
                id: id,
                text_: text_
            },
            success: function(data) {
                checkMessage(id);
            }
        });
    }
</script>