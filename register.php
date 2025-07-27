<?php
require_once "config.php";
require_once "vendor/autoload.php";

$current_menu = "register";
$current_sub_menu = NULL;
$title = "Register";

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/Auth/register-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
