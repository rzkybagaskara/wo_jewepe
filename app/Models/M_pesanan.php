<?php

namespace App\Models;

use CodeIgniter\Model;

//Model untuk Paket
class M_pesanan extends Model {
    //Tabel Paket Wedding
    protected $table = 'pemesanan';
    protected $primaryKey = 'email_cust';
    protected $allowedFields = ['email_cust', 'nama_cust', 'alamat_cust', 'notelp_cust', 'jenis', 'tanggal'];

    //Models Paket Wedding
    public function getAllPesanans() {
        return $this->findAll();
    }

    public function getPesanan($id) {
        return $this->find($id);
    }

    public function addPesanan($data) {
        return $this->insert($data);
    }

    public function updatePesanan($id, $data) {
        return $this->where('email_cust', $id)->set($data)->update();
    }

    public function deletePesanan($id) {
        return $this->where('email_cust', $id)->delete();
    }
}
?>