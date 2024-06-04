$(document).ready(function () {
    var chatContainer = $('#chat-container');
    var chatBody = $('#chat-body');
    var chatInput = $('#chat-input');
    var chatToggle = $('#chat-toggle');
    var chatSendButton = $('#chat-send-button');

    // Update chat function
    function updateChat() {
        $.ajax({
            url: 'chat.php',
            type: 'GET',
            success: function (data) {
                chatBody.html(data);
                chatBody.scrollTop(chatBody[0].scrollHeight); // Scroll to the bottom
            }
        });
    }
    setInterval(updateChat, 500);

    // Send chat message function
    function sendChatMessage() {
        var message = chatInput.val();
        var username = prompt('Enter your username:');
        if (username && message) {
            $.ajax({
                url: 'chat.php',
                type: 'POST',
                data: { username: username, message: message },
                success: function () {
                    chatInput.val('');
                    updateChat();
                }
            });
        }
    }

    // Toggle chat visibility on button click
    chatToggle.click(function () {
        chatContainer.toggle();
        if (chatContainer.is(':visible')) {
            updateChat();
        }
    });

    // Send message on button click
    chatSendButton.click(function () {
        sendChatMessage();
    });

    // Send message on Enter key press
    chatInput.keydown(function (event) {
        if (event.keyCode === 13) {
            sendChatMessage();
        }
    });
});
