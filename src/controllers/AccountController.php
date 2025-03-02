<?php
require_once '../config/database.php';
require_once '../models/User.php';

class AccountController {
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: /dashboard.php");
            } else {
                echo "Invalid credentials";
            }
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $userModel = new User();
            $userModel->createUser($username, $email, $password);

            header("Location: /login.php");
        }
    }
}
?>
