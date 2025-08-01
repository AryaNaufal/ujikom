<?php

use App\Controllers\CustomerController;
use App\Controllers\DashboardController;
use App\Controllers\IdentitasController;
use App\Controllers\ItemController;
use App\Controllers\PetugasController;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
        (new DashboardController())->index();
        break;
    // Menu item
    case '/item':
        (new ItemController())->index();
        break;
    case '/item/add':
        (new ItemController())->add();
        break;
    case (preg_match('#^/item/edit/(\d+)$#', $uri, $matches) ? true : false):
        (new ItemController())->edit($matches[1]);
        break;
    case '/item/delete':
        (new ItemController())->delete();
        break;
    // Menu customer
    case '/customer':
        (new CustomerController())->index();
        break;
    case '/customer/add':
        (new CustomerController())->add();
        break;
    case (preg_match('#^/customer/edit/(\d+)$#', $uri, $matches) ? true : false):
        (new CustomerController())->edit($matches[1]);
        break;
    case '/customer/delete':
        (new CustomerController())->delete();
        break;
    // Menu petugas
    case '/petugas':
        (new PetugasController())->index();
        break;
    case '/petugas/add':
        (new PetugasController())->add();
        break;
    case (preg_match('#^/petugas/edit/(\d+)$#', $uri, $matches) ? true : false):
        (new PetugasController())->edit($matches[1]);
        break;
    case '/petugas/delete':
        (new PetugasController())->delete();
        break;
    // Menu identitas
    case '/identitas':
        (new IdentitasController())->index();
        break;
    case '/identitas/add':
        (new IdentitasController())->add();
        break;
    case (preg_match('#^/identitas/edit/(\d+)$#', $uri, $matches) ? true : false):
        (new IdentitasController())->edit($matches[1]);
        break;
    case '/identitas/delete':
        (new IdentitasController())->delete();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
}
