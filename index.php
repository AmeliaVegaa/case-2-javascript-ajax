<?php include ("header.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat App</title>
    <style>
        /* CSS untuk tampilan chat */
        #chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        #chat-header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            cursor: pointer;
        }

        .chat-message {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        #chat-input {
            padding: 10px;
            border: none;
            width: 100%;
        }

        #chat-input:focus {
            outline: none;
        }

        #chat-send-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        section {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 80%;
            height: 70vh;
        }

        .png {
            width: 50px;
            height: auto;
        }

        .button {
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            outline: none;
            background-color: white;
            border: 2px solid #2E3D71;
            transition: all 0.5s ease-in-out;
        }

        .button:hover {
            background-color: #2E3D71;
            transition: all 0.5s ease-in-out;
        }

        #chat-body {
            overflow-y: auto;
            /* Add vertical scrollbar */
            max-height: 300px;
            /* Set maximum height for the chat body */
        }

        .chat-message {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            clear: both;
            /* Clear floats */
        }

        .chat-message:nth-child(odd) {
            background-color: #f9f9f9;
            text-align: right;
        }

        .chat-message:nth-child(even) {
            background-color: #e0f7fa;
            text-align: left;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <section>
        <button id="chat-toggle" class="button"><img class="png" src="bubble-chat.png" alt=""></button>
    </section>
    <div class="position-absolute top-50 start-50 translate-middle" id="chat-container">
        <div id="chat-header">Chat App</div>
        <div id="chat-body"></div>
        <div id="chat-input-container">
            <input type="text" id="chat-input" placeholder="Type your message...">
            <button id="chat-send-button">Kirim</button>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var chatContainer = $('#chat-container');
            var chatBody = $('#chat-body');
            var chatInput = $('#chat-input');
            var chatToggle = $('#chat-toggle');
            var chatSendButton = $('#chat-send-button');

            // Inisialisasi status chat (sembunyi atau tampil)
            var chatVisible = false;
            chatContainer.hide();

            // Fungsi untuk memperbarui tampilan chat
            function updateChat() {
                $.ajax({
                    url: 'getChat.php',
                    type: 'GET',
                    success: function (data) {
                        chatBody.html(data);
                        chatBody.scrollTop(chatBody[0].scrollHeight);
                    }
                });
            }
            setInterval(updateChat, 500);


            // Fungsi untuk mengirim pesan chat
            function sendChatMessage() {
                var message = chatInput.val();
                var username = prompt('Enter your username:');
                if (username && message) {
                    $.ajax({
                        url: 'saveChat.php',
                        type: 'POST',
                        data: { username: username, message: message },
                        success: function () {
                            chatInput.val('');
                            updateChat();
                        }
                    });
                }
            }

            // Event handler untuk tombol/chat toggle
            chatToggle.click(function () {
                chatVisible = !chatVisible;
                if (chatVisible) {
                    chatContainer.show();
                    updateChat();
                } else {
                    chatContainer.hide();
                }
            });

            // Event handler untuk tombol Kirim
            chatSendButton.click(function () {
                sendChatMessage();
            });

            // Event handler untuk input chat
            chatInput.keydown(function (event) {
                if (event.keyCode === 13) {
                    sendChatMessage();
                }
            });
        });
    </script>
    <?php include ("Footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>