<?php

namespace App\Controllers;

use App\Models\Identitas;
use function Core\view;

class IdentitasController
{
    public function index()
    {
        // session_start();
        // if (!isset($_SESSION['username'])) {
        //     header("Location: /login");
        //     exit;
        // }

        $identitas = Identitas::all();
        view('identitas/index', ['identitas' => $identitas['data']]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Identitas::create($_POST);
            echo json_encode($result);
        } else {
            $identitas = Identitas::all();
            view('identitas/add', ['identitas' => $identitas['data']]);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Identitas::update($id, $_POST);
            echo json_encode($result);
        } else {
            $identitas = Identitas::find($id);
            view('identitas/edit', ['identitas' => $identitas['data']]);
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Identitas::delete($data['id']);
        echo json_encode($result);
    }
}
