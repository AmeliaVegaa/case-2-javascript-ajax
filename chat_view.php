<?php require_once 'C:\xampp\htdocs\case5\view\header.php' ?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat App</title>
    <link href="chat.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <button type="submit" id="chat-send-button">Kirim</button>
        </div>
    </div>
    
    <script src="chat.js"></script>
    <?php require_once 'C:\xampp\htdocs\case5\view\footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>