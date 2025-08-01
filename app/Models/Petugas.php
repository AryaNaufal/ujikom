<?php

namespace App\Models;

use Core\DB;
use Core\ResponseMessage;

class Petugas
{
    public static function all()
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery("SELECT * FROM petugas", []));
    }

    public static function find($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery_single("SELECT * FROM petugas WHERE id_user = :id", ['id' => $id]));
    }

    public static function create($data)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Petugas berhasil ditambahkan',
            $db->squery("INSERT INTO petugas (nama_user, username, password, level) VALUES (:nama_user, :username, :password, 'petugas')", [
                'nama_user' => $data['namaUser'],
                'username'  => $data['username'],
                'password'  => password_hash($data['password'], PASSWORD_DEFAULT),
            ])
        );
    }

    public static function update($id, $data)
    {
        $db = new DB();
        $params = [
            'id' => $id,
            'nama_user' => $data['namaUser'],
            'username'  => $data['username'],
            'level'     => $data['level']
        ];

        $query = "UPDATE petugas SET nama_user = :nama_user, username = :username, level = :level";

        if (!empty($data['password'])) {
            $query .= ", password = :password";
            $params['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $query .= " WHERE id_user = :id";

        return ResponseMessage::createSuccessResponse(
            'Petugas berhasil diperbarui',
            $db->squery($query, $params)
        );
    }

    public static function delete($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Petugas berhasil dihapus',
            $db->squery("DELETE FROM petugas WHERE id_user = :id", ['id' => $id])
        );
    }
}
