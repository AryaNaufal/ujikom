<?php
session_start();

require_once "../../config.php";
require_once ROOT_PATH . "vendor/autoload.php";

$current_menu = "user account";
$current_sub_menu = NULL;
$title = "User Account";

$content_view = ROOT_PATH . 'components/layouts/Master/User/add-user-account-layout.php';

require_once ROOT_PATH . "components/layouts/header.php";
require_once ROOT_PATH . "components/layouts/page-layout.php";
require_once ROOT_PATH . "components/layouts/footer.php";
