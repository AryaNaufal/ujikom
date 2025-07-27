<?php
session_start();

require_once "config.php";
require_once "vendor/autoload.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$current_menu = "dashboard";
$current_sub_menu = NULL;
$title = "Dashboard";

$content_view = ROOT_PATH . 'components/layouts/Home/home-layout.php';

require_once __DIR__ . "/components/layouts/header.php";
require_once __DIR__ . "/components/layouts/page-layout.php";
require_once __DIR__ . "/components/layouts/footer.php";
