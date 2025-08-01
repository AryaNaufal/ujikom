<?php

namespace App\Models;

use Core\DB;
use Core\ResponseMessage;

class Customer
{
    public static function all()
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery("SELECT * FROM customer", []));
    }

    public static function find($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery_single("SELECT * FROM customer WHERE id_customer = :id", ['id' => $id]));
    }

    public static function create($data)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Customer berhasil ditambahkan',
            $db->squery("INSERT INTO customer (nama_customer, telp, fax, email, alamat, created_at, updated_at) VALUES (:nama_customer, :telp, :fax, :email, :alamat, now(), now())", [
                'nama_customer' => $data['namaCustomer'],
                'telp'          => $data['telp'],
                'fax'           => $data['fax'],
                'email'         => $data['email'],
                'alamat'        => $data['alamat'],
            ])
        );
    }

    public static function update($id, $data)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Customer berhasil diperbarui',
            $db->squery("UPDATE customer SET nama_customer = :nama_customer, telp = :telp, fax = :fax, email = :email, alamat = :alamat, updated_at = NOW() WHERE id_customer = :id", [
                'id'            => $id,
                'nama_customer' => $data['namaCustomer'],
                'telp'          => $data['telp'],
                'fax'           => $data['fax'],
                'email'         => $data['email'],
                'alamat'        => $data['alamat']
            ])
        );
    }

    public static function delete($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Customer berhasil dihapus',
            $db->squery("DELETE FROM customer WHERE id_customer = :id", ['id' => $id])
        );
    }
}
