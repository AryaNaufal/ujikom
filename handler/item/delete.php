<?php
session_start();

include_once __DIR__ . '/../../config.php';
include_once ROOT_PATH . 'vendor/autoload.php';

$itemService = new App\ItemService();

$itemId = $_POST['id'] ?? null;

$result = $itemService->deleteItem($itemId);

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
