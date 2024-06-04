<?php
require_once 'C:\xampp\htdocs\case5\config\database.php';

class ChatModel {
    private $conn;
    private $table_name = "pesan";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function saveMessage($username, $message) {
        $query = "INSERT INTO " . $this->table_name . " (username, message) VALUES (:username, :message)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':message', $message);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getMessages() {
        $query = "SELECT username, message FROM " . $this->table_name ;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

