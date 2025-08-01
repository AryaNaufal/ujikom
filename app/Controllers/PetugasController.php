<?php

namespace App\Controllers;

use App\Models\Petugas;

use function Core\view;

class PetugasController
{
    public function index()
    {
        // session_start();
        // if (!isset($_SESSION['username'])) {
        //     header("Location: /login");
        //     exit;
        // }

        $petugas = Petugas::all();
        view('petugas/index', ['petugas' => $petugas['data']]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = Petugas::create($_POST);
            echo json_encode($result);
        } else {
            view('petugas/add');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            if (!isset($data['password']) || $data['password'] == '') {
                unset($data['password']);
            }
            $result = Petugas::update($id, $_POST);
            echo json_encode($result);
        } else {
            $petugas = Petugas::find($id);
            view('petugas/edit', ['petugas' => $petugas]);
        }
    }

    public function delete()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Petugas::delete($data['id']);
        echo json_encode($result);
    }
}
