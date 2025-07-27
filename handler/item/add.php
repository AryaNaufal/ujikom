<?php
session_start();

include_once __DIR__ . '/../../config.php';
include_once ROOT_PATH . 'vendor/autoload.php';

$itemService = new App\ItemService();

$data = [
    'nama_item' => $_POST['namaItem'],
    'uom' => $_POST['uom'],
    'harga_beli' => $_POST['hargaBeli'],
    'harga_jual' => $_POST['hargaJual']
];

$result = $itemService->postItem($data);

if ($result['status'] === 'success') {
    $response = [
        "status" => $result['status'],
        "message" => $result['message']
    ];
} else {
    $response = [
        "status" => $result['status'],
        "message" => $result['message']
    ];
}

echo json_encode($response);
