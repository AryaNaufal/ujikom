<?php

namespace App\Models;

use Core\DB;
use Core\ResponseMessage;

class Item
{
    public static function all()
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery("SELECT * FROM item", []));
    }

    public static function find($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery_single("SELECT * FROM item WHERE id_item = :id", ['id' => $id]));
    }

    public static function create($data)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Item berhasil ditambahkan',
            $db->squery("INSERT INTO item (nama_item, uom, harga_beli, harga_jual) VALUES (:nama, :uom, :beli, :jual)", [
                'nama'  => $data['namaItem'],
                'uom'   => $data['uom'],
                'beli'  => $data['hargaBeli'],
                'jual'  => $data['hargaJual'],
            ])
        );
    }

    public static function update($id, $data)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Item berhasil diperbarui',
            $db->squery("UPDATE item SET nama_item = :nama, uom = :uom, harga_beli = :beli, harga_jual = :jual WHERE id_item = :id", [
                'id'   => $id,
                'nama' => $data['namaItem'],
                'uom'  => $data['uom'],
                'beli' => $data['hargaBeli'],
                'jual' => $data['hargaJual'],
            ])
        );
    }

    public static function delete($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Item berhasil dihapus',
            $db->squery("DELETE FROM item WHERE id_item = :id", ['id' => $id])
        );
    }
}
