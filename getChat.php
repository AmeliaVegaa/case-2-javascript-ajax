<?php
// Mengambil isi dari file chat.txt
$chatData = file_get_contents('chat.txt');
$chatMessages = explode(PHP_EOL, $chatData);

foreach ($chatMessages as $message) {
    if (!empty($message)) {
        echo '<div class="chat-message">' . $message . '</div>';
    }
}
?>