<?php

namespace App;

use Exception;

class CustomerService
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getCustomers()
    {
        try {
            $sql = $this->db->squery("SELECT * FROM customer", []);
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

    public function getCustomerById(string $customer_id)
    {
        try {
            $sql = $this->db->squery_single("SELECT * FROM customer WHERE id_customer = :id_customer", ['id_customer' => $customer_id]);
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

    public function postCustomer(array $data)
    {
        try {
            $sql = $this->db->squery(
                'INSERT INTO customer (nama_customer, telp, fax, email, alamat) 
                VALUES (:nama_customer, :telp, :fax, :email, :alamat)',
                [
                    'nama_customer' => $data['nama_customer'],
                    'telp' => $data['telp'],
                    'fax' => $data['fax'],
                    'email' => $data['email'],
                    'alamat' => $data['alamat']
                ]
            );

            return ResponseMessage::createSuccessResponse(
                message: 'Data Customer Berhasil Dibuat!',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function putCustomer(string $customer_id, array $data)
    {
        try {
            $sql = $this->db->squery(
                'UPDATE customer SET nama_customer = :nama_customer, telp = :telp, fax = :fax, email = :email, alamat = :alamat WHERE id_customer = :id_customer',
                [
                    'id_customer' => $customer_id,
                    'nama_customer' => $data['nama_customer'],
                    'telp' => $data['telp'],
                    'fax' => $data['fax'],
                    'email' => $data['email'],
                    'alamat' => $data['alamat']
                ]
            );

            return ResponseMessage::createSuccessResponse(
                message: 'Data Customer Berhasil Diubah!',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function deleteCustomer(string $customer_id)
    {
        try {
            $this->db->squery('DELETE FROM customer WHERE id_customer = :id_customer', ['id_customer' => $customer_id]);
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
