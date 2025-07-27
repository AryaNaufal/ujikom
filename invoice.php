<?php
session_start();

require_once "config.php";
require_once "vendor/autoload.php";

$current_menu = "invoice";
$current_sub_menu = NULL;
$title = "Invoice";

$content_view = ROOT_PATH . 'components/layouts/Transaksi/invoice-layout.php';

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/page-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
