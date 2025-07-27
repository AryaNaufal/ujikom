<?php
session_start();

include_once __DIR__ . '/../../config.php';
include_once ROOT_PATH . 'vendor/autoload.php';

use App\AuthService;

// Validasi method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    $response = [
        "status" => "error",
        "message" => "Metode request tidak diizinkan."
    ];

    echo json_encode($response);
    exit;
}

// Ambil data dari form
$username = trim($_POST['username'] ?? null);
$password = trim($_POST['password'] ?? null);

// Panggil UserService untuk melakukan login
$authService = new AuthService();
$result = $authService->login([
    'username' => $username,
    'password' => $password
]);

if ($result['status'] === 'success') {
    $response = [
        "status" => $result['status'],
        "message" => $result['message']
    ];

    echo json_encode($response);
} else {
    $response = [
        "status" => $result['status'],
        "message" => $result['message']
    ];

    echo json_encode($response);
}
