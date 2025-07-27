<?php

namespace App;

use Exception;

class SalesService
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getSales(): array
    {
        try {
            // Mengambil semua data dari tabel 'sales'
            $sql = $this->db->squery("SELECT * FROM sales", []);
            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage()); // Catat error ke log server
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server Saat Mengambil Data Penjualan'
            );
        }
    }

    public function getSalesById(string $sales_id): array
    {
        try {
            // Mengambil data dari tabel 'sales' berdasarkan id_sales
            $sql = $this->db->squery(
                "SELECT * FROM sales WHERE id_sales = :id_sales",
                ['id_sales' => $sales_id]
            );
            return ResponseMessage::createSuccessResponse(
                message: '',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server Saat Mengambil Data Penjualan Berdasarkan ID'
            );
        }
    }

    public function postSales(array $data): array
    {
        try {
            // Validasi input dasar
            if (empty($data['do_number']) || empty($data['tgl_sales']) || empty($data['id_customer']) || !isset($data['status'])) {
                return ResponseMessage::createErrorResponse(
                    message: 'Input tidak lengkap. Pastikan semua field (DO No, Tanggal Sales, Customer ID, Status) terisi.'
                );
            }

            // Memasukkan data ke tabel 'sales'
            // id_sales diasumsikan auto-increment atau dibuat sebelum query ini
            $this->db->squery(
                "INSERT INTO sales (do_number, tgl_sales, id_customer, status) VALUES (:do_number, :tgl_sales, :id_customer, :status)",
                [
                    'do_number' => $data['do_number'],
                    'tgl_sales' => $data['tgl_sales'],
                    'id_customer' => $data['id_customer'], // Ini harus berupa id_customer dari tabel customer
                    'status' => $data['status']
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Invoice Berhasil Ditambahkan!'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server Saat Menambahkan Invoice'
            );
        }
    }

    public function putSales(string $sales_id, array $data): array
    {
        try {
            // Validasi input dasar
            if (empty($data['do_number']) || empty($data['tgl_sales']) || empty($data['id_customer']) || !isset($data['status'])) {
                return ResponseMessage::createErrorResponse(
                    message: 'Input tidak lengkap. Pastikan semua field (DO No, Tanggal Sales, Customer ID, Status) terisi.'
                );
            }

            // Memperbarui data di tabel 'sales' berdasarkan id_sales
            $this->db->squery(
                "UPDATE sales SET do_number = :do_number, tgl_sales = :tgl_sales, id_customer = :id_customer, status = :status WHERE id_sales = :id_sales",
                [
                    'do_number' => $data['do_number'],
                    'tgl_sales' => $data['tgl_sales'],
                    'id_customer' => $data['id_customer'], // Ini harus berupa id_customer dari tabel customer
                    'status' => $data['status'],
                    'id_sales' => $sales_id
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Invoice Berhasil Diperbarui!'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server Saat Memperbarui Invoice'
            );
        }
    }

    public function deleteSales(string $sales_id): array
    {
        try {
            // Menghapus data dari tabel 'sales' berdasarkan id_sales
            $this->db->squery(
                'DELETE FROM sales WHERE id_sales = :id_sales',
                ['id_sales' => $sales_id]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Invoice Berhasil Dihapus!'
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server Saat Menghapus Invoice'
            );
        }
    }
}
