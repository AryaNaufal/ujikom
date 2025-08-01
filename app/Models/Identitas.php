<?php

namespace App\Models;

use Core\DB;
use Core\ResponseMessage;

class Identitas
{
    public static function all()
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery("SELECT * FROM identitas", []));
    }

    public static function find($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse('', $db->squery_single("SELECT * FROM identitas WHERE id_identitas = :id", ['id' => $id]));
    }

    public static function create($data)
    {
        $db = new DB();
        $fotoPath = '';

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'image/identitas/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $filename = time() . '-' . basename($_FILES['foto']['name']);
            $fotoPath = $uploadDir . $filename;

            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath)) {
                return ResponseMessage::createErrorResponse('Gagal mengunggah file foto.');
            }
        }

        return ResponseMessage::createSuccessResponse(
            'Identitas berhasil ditambahkan',
            $db->squery("INSERT INTO identitas (nama_identitas, badan_hukum, npwp, email, url, alamat, telp, fax, rekening, foto) VALUES (:nama_identitas, :badan_hukum, :npwp, :email, :url, :alamat, :telp, :fax, :rekening, :foto)", [
                'nama_identitas' => $data['namaIdentitas'],
                'badan_hukum'    => $data['badanHukum'],
                'npwp'           => $data['npwp'],
                'email'          => $data['email'],
                'url'            => $data['url'],
                'alamat'         => $data['alamat'],
                'telp'           => $data['telp'],
                'fax'            => $data['fax'],
                'rekening'       => $data['rekening'],
                'foto'           => basename($fotoPath) ?? '',
            ])
        );
    }

    public static function update($id, $data)
    {
        $db = new DB();
        $fotoPath = null;

        $existing = $db->squery_single("SELECT foto FROM identitas WHERE id_identitas = :id", ['id' => $id]);
        $oldFotoPath = $existing['foto'];

        // Handle file upload
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'image/identitas/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $filename = time() . '-' . str_replace(' ', '_', basename($_FILES['foto']['name']));
            $fotoPath = $uploadDir . $filename;

            if (!move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath)) {
                return ResponseMessage::createErrorResponse('Gagal mengunggah file foto.');
            }

            if (!empty($oldFotoPath) && file_exists($oldFotoPath)) {
                unlink('image/identitas/' . $oldFotoPath);
            }
        } else {
            $fotoPath = $oldFotoPath;
        }

        return ResponseMessage::createSuccessResponse(
            'Identitas berhasil diperbarui',
            $db->squery("UPDATE identitas SET nama_identitas = :nama_identitas, badan_hukum = :badan_hukum, npwp = :npwp, email = :email, url = :url, alamat = :alamat, telp = :telp, fax = :fax, rekening = :rekening, foto = :foto WHERE id_identitas = :id", [
                'id'             => $id,
                'nama_identitas' => $data['namaIdentitas'],
                'badan_hukum'    => $data['badanHukum'],
                'npwp'           => $data['npwp'],
                'email'          => $data['email'],
                'url'            => $data['url'],
                'alamat'         => $data['alamat'],
                'telp'           => $data['telp'],
                'fax'            => $data['fax'],
                'rekening'       => $data['rekening'],
                'foto'           => basename($fotoPath),
            ])
        );
    }

    public static function delete($id)
    {
        $db = new DB();
        return ResponseMessage::createSuccessResponse(
            'Identitas berhasil dihapus',
            $db->squery("DELETE FROM identitas WHERE id_identitas = :id", ['id' => $id])
        );
    }
}
