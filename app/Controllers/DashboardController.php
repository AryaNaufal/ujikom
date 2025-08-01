<?php

namespace App\Controllers;

use App\Models\Item;
use App\Models\Customer;

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
        view('/index', ['customers' => $customers['data'], 'items' => $items['data']]);
    }
}
