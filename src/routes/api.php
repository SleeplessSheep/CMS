<?php
require_once '../src/controller/AccountController.php';

$accountController = new AccountController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '/api/login':
        if ($method === 'POST') {
            $accountController->login();
        }
        break;
    case '/api/register':
        if ($method === 'POST') {
            $accountController->register();
        }
        break;
    case '/api/check-email':  // ✅ New endpoint for checking email
        if ($method === 'POST') {
            $accountController->checkEmail();
        }
        break;
    default:
        http_response_code(404);
        echo json_encode(["error" => "Route not found"]);
}
?>
