<?php
require_once "config.php";
require_once "vendor/autoload.php";

$current_menu = "dashboard";
$current_sub_menu = NULL;
$title = "Dashboard";

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/Auth/login-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
