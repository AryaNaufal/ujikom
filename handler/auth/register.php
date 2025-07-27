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

// Validasi data yang dikirim
if (empty($username) || empty($password)) {
    $response = [
        "status" => "error",
        "message" => "Semua data wajib diisi."
    ];

    echo json_encode($response);
    exit;
}

// Validasi panjang password
if (strlen($password) < 8) {
    $response = [
        "status" => "error",
        "message" => "Password harus minimal 8 karakter."
    ];

    echo json_encode($response);
    exit;
}

// Panggil UserService untuk menambahkan user
$authService = new AuthService();
$result = $authService->register([
    'username' => $username,
    'password' => $password,
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
