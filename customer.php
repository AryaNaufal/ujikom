<?php
session_start();

require_once "config.php";
require_once "vendor/autoload.php";

$customerService = new App\CustomerService();

$customers = $customerService->getCustomers();

$current_menu = "customer";
$current_sub_menu = NULL;
$title = "Customer";

$content_view = ROOT_PATH . 'components/layouts/Master/Customer/customer-layout.php';

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/page-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
