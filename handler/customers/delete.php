<?php

session_start();

include_once __DIR__ . '/../../config.php';
include_once ROOT_PATH . 'vendor/autoload.php';

use App\CustomerService;

$customerService = new CustomerService();

$budgetId = $_POST['id'] ?? null;

$result = $customerService->deleteCustomer($budgetId);

if ($result['status'] === 'success') {
    $response = [
        'status' => $result['status'],
        'message' => $result['message']
    ];
} else {
    $response = [
        'status' => $result['status'],
        'message' => $result['message'] ?? 'Terjadi kesalahan saat menghapus budget.'
    ];
}

echo json_encode($response);
