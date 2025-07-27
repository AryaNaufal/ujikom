<?php
session_start();

require_once "config.php";
require_once "services/DB.php";
require_once "vendor/autoload.php";

$customerService = new App\CustomerService();
$transactionService = new App\TransactionService();

$customers = $customerService->getCustomers();
$transactions = $transactionService->getTransactions();

$current_menu = "invoice";
$current_sub_menu = NULL;
$title = "Invoice";


$content_view = ROOT_PATH . 'components/layouts/Transaksi/add-invoice-layout.php';

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/page-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
