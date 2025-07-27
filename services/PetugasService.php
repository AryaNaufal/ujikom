<?php

namespace App;

use Exception;

class PetugasService
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getPetugas()
    {
        $sql = $this->db->squery('SELECT id_user, nama_user, username, level FROM petugas', []);
        return $sql;
    }
}
