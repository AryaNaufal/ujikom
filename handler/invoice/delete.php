<?php
session_start();

use App\TransactionService;

include_once __DIR__ . '/../../config.php';
include_once ROOT_PATH . 'vendor/autoload.php';

$transactionService = new TransactionService();

$transactiontId = $_POST['id'] ?? null;

$result = $transactionService->deleteTransaction($budgetId);

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
