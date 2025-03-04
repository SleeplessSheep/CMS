<?php
require_once '../config/database.php';

class User {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $email, $password_hash) {
        $stmt = $this->conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $password_hash]);
    }

    public function emailExists($email) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }
    
}
?>
