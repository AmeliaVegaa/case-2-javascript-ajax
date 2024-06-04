<?php
require_once 'C:\xampp\htdocs\case5\controller\c_chatmodel.php';

$controller = new ChatController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $message = $_POST['message'];
    $controller->saveMessage($username, $message);
} else {
    $messages = $controller->getMessages();
    foreach (array_reverse($messages) as $message) { // Display messages in reverse order
        echo '<div class="chat-message"><strong>' . htmlspecialchars($message['username']) . '</strong>: ' . htmlspecialchars($message['message']) . '</div>';
    }
}
