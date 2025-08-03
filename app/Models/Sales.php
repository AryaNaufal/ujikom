<?php

namespace App\Models;

use Core\DB;
use Core\ResponseMessage;
use Exception;

class Sales
{
    public static function all()
    {
        $db = new DB();
        $sql = "SELECT 
                    s.*, c.*
                FROM 
                    sales s
                LEFT JOIN 
                    customer c ON s.id_customer = c.id_customer";

        $result = $db->squery($sql, []);
        return ResponseMessage::createSuccessResponse('', $result);
    }

    public static function find(int $id)
    {
        $db = new DB();
        $sql = "SELECT 
                    s.id_sales, s.tgl_sales, s.status, s.do_customer, c.id_customer, c.nama_customer, i.nama_item, t.quantity, t.amount, i.id_item
                FROM 
                    sales s
                LEFT JOIN 
                    customer c ON s.id_customer = c.id_customer
                LEFT JOIN
                    transaction t ON s.id_sales = t.id_transaction
                LEFT JOIN 
                    item i ON t.id_item = i.id_item
                WHERE s.id_sales = :id";

        $result = $db->squery_single($sql, ['id' => $id]);
        return ResponseMessage::createSuccessResponse('', $result);
    }

    public static function create(array $data)
    {
        $db = new DB();

        $db->getPDO()->beginTransaction();
        try {
            // 1. Insert ke tabel sales
            $sql = "INSERT INTO sales (id_customer, do_customer, tgl_sales, status) VALUES (:id_customer, :do_customer, :tgl_sales, :status)";
            $db->squery($sql, [
                'id_customer' => $data['id_customer'],
                'do_customer' => $data['do_customer'],
                'tgl_sales' => $data['tgl_sales'],
                'status' => $data['status'],
            ]);

            $idSales = $db->getPDO()->lastInsertId();

            // 2. Ambil harga jual item
            $getItemPrice = "SELECT harga_jual FROM item WHERE id_item = :id_item";
            $result = $db->squery_single($getItemPrice, ['id_item' => $data['id_item']]);

            // 3. Hitung harga total
            $price = $result['harga_jual'] * $data['quantity'];

            // 4. Insert ke tabel transaction (pakai id_sales sebagai id_transaction)
            $sql2 = "INSERT INTO transaction (id_transaction, id_item, quantity, price, amount) 
                 VALUES (:id_transaction, :id_item, :quantity, :price, :amount)";
            $db->squery($sql2, [
                'id_transaction' => $idSales,
                'id_item' => $data['id_item'],
                'quantity' => $data['quantity'],
                'price' => $price,
                'amount' => $data['amount'],
            ]);

            $db->getPDO()->commit();
            return ResponseMessage::createSuccessResponse('Data sales berhasil ditambahkan', null);
        } catch (Exception $e) {
            $db->getPDO()->rollBack();
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse('Gagal menambahkan data sales');
        }
    }

    public static function update(int $id, array $data)
    {
        $db = new DB();

        $db->getPDO()->beginTransaction();
        try {
            // 1. Update tabel sales
            $updateSales = "UPDATE sales 
                        SET id_customer = :id_customer, 
                            do_customer = :do_customer, 
                            tgl_sales = :tgl_sales, 
                            status = :status 
                        WHERE id_sales = :id_sales";

            $db->squery($updateSales, [
                'id_sales' => $id,
                'id_customer' => $data['id_customer'],
                'do_customer' => $data['do_customer'],
                'tgl_sales' => $data['tgl_sales'],
                'status' => $data['status']
            ]);

            // 2. Ambil harga jual dari item baru
            $getItemPrice = "SELECT harga_jual FROM item WHERE id_item = :id_item";
            $result = $db->squery_single($getItemPrice, ['id_item' => $data['id_item']]);
            $price = $result['harga_jual'] * $data['quantity'];

            // 3. Update tabel transaction (id_transaction = id_sales)
            $updateTransaction = "UPDATE transaction 
                              SET id_item = :id_item, 
                                  quantity = :quantity, 
                                  price = :price, 
                                  amount = :amount 
                              WHERE id_transaction = :id_transaction";

            $db->squery($updateTransaction, [
                'id_transaction' => $id,
                'id_item' => $data['id_item'],
                'quantity' => $data['quantity'],
                'price' => $price,
                'amount' => $data['amount']
            ]);

            $db->getPDO()->commit();
            return ResponseMessage::createSuccessResponse('Data sales berhasil diperbarui', null);
        } catch (Exception $e) {
            $db->getPDO()->rollBack();
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse('Gagal memperbarui data sales');
        }
    }


    public static function delete(int $id)
    {
        $db = new DB();
        $sql = "DELETE FROM sales WHERE id_sales = :id";

        $result = $db->squery($sql, ['id' => $id]);
        return ResponseMessage::createSuccessResponse('Data sales berhasil dihapus', $result);
    }
}
