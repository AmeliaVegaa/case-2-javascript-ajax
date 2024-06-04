<?php
require_once 'C:\xampp\htdocs\case5\models\ChatModel.php';

class ChatController {
    private $model;

    public function __construct() {
        $this->model = new ChatModel();
    }

    public function saveMessage($username, $message) {
        $this->model->saveMessage($username, $message);
    }

    public function getMessages() {
        return $this->model->getMessages();
    }
}

