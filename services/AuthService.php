<?php

namespace App;

use Error;
use Exception;
use LDAP\Result;

class AuthService
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function login(array $data)
    {
        $query = "SELECT * FROM petugas WHERE username = :username LIMIT 1";
        try {
            $user = $this->db->squery_single($query, [
                'username' => $data['username']
            ]);

            // Memeriksa user
            if (!$user) {
                return ResponseMessage::createErrorResponse(
                    message: 'User Tidak Ditemukan'
                );
            }

            // Verifikasi password
            if (!password_verify($data['password'], $user['password'])) {
                return ResponseMessage::createErrorResponse(
                    message: 'Password Tidak Sesuai'
                );
            }

            return ResponseMessage::createSuccessResponse(
                message: 'Anda Telah Berhasil Masuk',
                data: [
                    $_SESSION['id'] = $user['id_user'],
                    $_SESSION['username'] = $user['username'],
                    $_SESSION['level'] = $user['level']
                ]
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }

    public function register(array $data): array
    {
        $checkUser = $this->db->squery_single(
            'SELECT * FROM petugas WHERE username = :username LIMIT 1',
            [
                'username' => $data['username']
            ]
        );

        if ($checkUser) {
            return ResponseMessage::createErrorResponse(
                message: 'Username Sudah Terdaftar'
            );
        }

        try {

            $sql = $this->db->squery(
                'INSERT INTO petugas (nama_user, username, password, level) 
                VALUES (:nama_user, :username, :password, :level)',
                [
                    'nama_user' => $data['username'],
                    'username' => $data['username'],
                    'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                    'level' => 'petugas'
                ]
            );
            return ResponseMessage::createSuccessResponse(
                message: 'Berhasil Mendaftar Akun!',
                data: $sql
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
            return ResponseMessage::createErrorResponse(
                message: 'Terjadi Kesalahan Pada Server'
            );
        }
    }
}
