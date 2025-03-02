<?php
require_once '../app/controllers/AccountController.php';

$accountController = new AccountController();

if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountController->login();
} elseif ($_SERVER['REQUEST_URI'] === '/register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountController->register();
} else {
    http_response_code(404);
    echo "Not Found";
}
?>
