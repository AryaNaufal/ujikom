<?php
session_start();

require_once "../../config.php";
require_once ROOT_PATH . "vendor/autoload.php";

$itemService = new App\ItemService();

$item = $itemService->getItemById($_GET['id_item']);

$current_menu = "item";
$current_sub_menu = NULL;
$title = "Item";

$content_view = ROOT_PATH . 'components/layouts/Master/Item/edit-item-layout.php';

require_once ROOT_PATH . "components/layouts/header.php";
require_once ROOT_PATH . "components/layouts/page-layout.php";
require_once ROOT_PATH . "components/layouts/footer.php";
