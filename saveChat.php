<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $message = $_POST['message'];

    // Format pesan chat
    $chatMessage = $username . ': ' . $message . PHP_EOL;

    // Menyimpan pesan ke dalam file chat.txt
    file_put_contents('chat.txt', $chatMessage, FILE_APPEND);
}
exit();
