<?php
session_start();

include_once __DIR__ . '/../../config.php';
include_once ROOT_PATH . 'vendor/autoload.php';

use App\CustomerService;

$customerService = new CustomerService();

$data = [
    'nama_customer' => $_POST['namaCustomer'],
    'telp' => $_POST['telp'],
    'fax' => $_POST['fax'],
    'email' => $_POST['email'],
    'alamat' => $_POST['alamat']
];

$result = $customerService->putCustomer($_GET['id_customer'], $data);

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
