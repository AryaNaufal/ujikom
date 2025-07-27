<?php
session_start();

require_once "../../config.php";
require_once ROOT_PATH . "vendor/autoload.php";

$customerService = new App\CustomerService();
$customer = $customerService->getCustomerById($_GET['id_customer']);

$current_menu = "customer";
$current_sub_menu = NULL;
$title = "Customer";

$content_view = ROOT_PATH . 'components/layouts/Master/Customer/edit-customer-layout.php';

require_once ROOT_PATH . "components/layouts/header.php";
require_once ROOT_PATH . "components/layouts/page-layout.php";
require_once ROOT_PATH . "components/layouts/footer.php";
