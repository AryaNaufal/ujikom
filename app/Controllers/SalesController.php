<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Sales;

use function Core\view;

class SalesController
{
    public function index()
    {
        // session_start();
        // if (!isset($_SESSION['username'])) {
        //     header("Location: /login");
        //     exit;
        // }

        $sales = Sales::all();
        view('sales/index', ['sales' => $sales['data']]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Sales::create($_POST);
            echo json_encode($result);
        } else {
            $customers = Customer::all();
            $items = Item::all();
            view('sales/add', ['customers' => $customers['data'], 'items' => $items['data']]);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Sales::update($id, $_POST);
            echo json_encode($result);
        } else {
            $sale = Sales::find($id);
            $customers = Customer::all();
            $items = Item::all();
            view('sales/edit', ['sale' => $sale['data'], 'customers' => $customers['data'], 'items' => $items['data']]);
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Sales::delete($data['id']);
        echo json_encode($result);
    }
}
