<?php

namespace App\Models;

use CodeIgniter\Model;

//Model untuk Paket
class M_paket extends Model {
    //Tabel Paket Wedding
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $allowedFields = ['jenis', 'harga', 'fasilitas', 'gambar'];

    //Models Paket Wedding
    public function getAllPakets() {
        return $this->findAll();
    }

    public function getPaket($id) {
        return $this->find($id);
    }

    public function addPaket($data) {
        return $this->insert($data);
    }

    public function updatePaket($id, $data) {
        return $this->where('id_paket', $id)->set($data)->update();
    }

    public function deletePaket($id) {
        return $this->where('id_paket', $id)->delete();
    }
}
?>