<?php

namespace App\Controllers;

use App\Models\Customer;
use function Core\view;

class CustomerController
{
    public function index()
    {
        // session_start();
        // if (!isset($_SESSION['username'])) {
        //     header("Location: /login");
        //     exit;
        // }

        $customers = Customer::all();
        view('customer/index', ['customers' => $customers['data']]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Customer::create($_POST);
            echo json_encode($result);
        } else {
            view('customer/add');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Customer::update($id, $_POST);
            echo json_encode($result);
        } else {
            $customer = Customer::find($id);
            view('customer/edit', ['customer' => $customer]);
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Customer::delete($data['id']);
        echo json_encode($result);
    }
}
