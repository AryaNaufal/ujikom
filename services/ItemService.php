<?php

namespace App;

use Exception;

class ItemService
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getItems()
    {
        try {
            $sql = $this->db->squery("SELECT * FROM item", []);
            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function getItemById(string $item_id)
    {
        try {
            $sql = $this->db->squery_single("SELECT * FROM item WHERE id_item = :id_item", ['id_item' => $item_id]);
            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function postItem(array $data)
    {
        try {
            $sql = $this->db->squery(
                'INSERT INTO item (nama_item, uom, harga_beli, harga_jual) 
                VALUES (:nama_item, :uom, :harga_beli, :harga_jual)',
                [
                    'nama_item' => $data['nama_item'],
                    'uom' => $data['uom'],
                    'harga_beli' => $data['harga_beli'],
                    'harga_jual' => $data['harga_jual']
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Item berhasil ditambahkan',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function putItem(string $item_id, array $data)
    {
        try {
            $sql = $this->db->squery(
                'UPDATE item SET nama_item = :nama_item, uom = :uom, harga_beli = :harga_beli, harga_jual = :harga_jual WHERE id_item = :id_item',
                [
                    'id_item' => $item_id,
                    'nama_item' => $data['nama_item'],
                    'uom' => $data['uom'],
                    'harga_beli' => $data['harga_beli'],
                    'harga_jual' => $data['harga_jual']
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Item berhasil diperbarui'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function deleteItem(string $item_id)
    {
        try {
            $sql = $this->db->squery(
                'DELETE FROM item WHERE id_item = :id_item',
                ['id_item' => $item_id]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Item berhasil dihapus'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }
}
