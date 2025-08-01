<?php

namespace App\Controllers;

use App\Models\Item;
use function Core\view;

class ItemController
{
    public function index()
    {
        // session_start();
        // if (!isset($_SESSION['username'])) {
        //     header("Location: /login");
        //     exit;
        // }

        $items = Item::all();
        view('item/index', ['items' => $items['data']]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Item::create($_POST);
            echo json_encode($result);
        } else {
            view('item/add');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Item::update($id, $_POST);
            echo json_encode($result);
        } else {
            $item = Item::find($id);
            view('item/edit', ['item' => $item['data']]);
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Item::delete($data['id']);
        echo json_encode($result);
    }
}
