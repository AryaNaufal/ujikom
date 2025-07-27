<?php
session_start();

require_once "config.php";
require_once "vendor/autoload.php";

$itemService = new App\ItemService();

$items = $itemService->getItems();

$current_menu = "item";
$current_sub_menu = NULL;
$title = "Item";

$content_view = ROOT_PATH . 'components/layouts/Master/Item/item-layout.php';

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/page-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
