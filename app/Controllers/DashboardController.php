<?php

namespace App\Controllers;

use App\Models\Item;
use App\Models\Customer;
use App\Models\Sales;

use function Core\view;

class DashboardController
{
    public function index()
    {
        // session_start();
        // if (!isset($_SESSION['username'])) {
        //     header("Location: /login");
        //     exit;
        // }

        $items = Item::all();
        $customers = Customer::all();
        $sales = Sales::all();
        view('/index', ['customers' => $customers['data'], 'items' => $items['data'], 'sales' => $sales['data']]);
    }
}
