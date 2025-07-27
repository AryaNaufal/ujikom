<?php

namespace App;

use Exception;

class TransactionService
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getTransactions(): array
    {
        try {
            $sql = $this->db->squery("SELECT * FROM transaction", []);
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

    public function getTransactionById(string $invoice_id): array
    {
        try {
            $sql = $this->db->squery(
                "SELECT * FROM transaction WHERE id_transaction = :id_transaction",
                ['id_transaction' => $invoice_id]
            );
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

    public function postTransaction(array $data): array
    {
        try {
            $this->db->squery(
                "INSERT INTO transaction (customer_id, amount, date) VALUES (:customer_id, :amount, :date)",
                [
                    'customer_id' => $data['customer_id'],
                    'amount' => $data['amount'],
                    'date' => $data['date']
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Transaksi Berhasil Ditambahkan!'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function putTransaction(string $invoice_id, array $data): array
    {
        try {
            $this->db->squery(
                "UPDATE transaction SET customer_id = :customer_id, amount = :amount, date = :date WHERE id_transaction = :id_transaction",
                [
                    'customer_id' => $data['customer_id'],
                    'amount' => $data['amount'],
                    'date' => $data['date'],
                    'id_transaction' => $invoice_id
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Transaksi Berhasil Diperbarui!'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function deleteTransaction(string $invoice_id)
    {
        try {
            $this->db->squery(
                'DELETE FROM customer WHERE id_customer = :id_customer',
                ['id_customer' => $invoice_id]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Data Customer Berhasil Dihapus!'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }
}
