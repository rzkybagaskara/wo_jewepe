<?php

namespace App\Models;

use CodeIgniter\Model;

//Model untuk Pemesanan
class M_pesanan extends Model {
    //Tabel Pemesanan Wedding
    protected $table = 'pemesanan';
    protected $primaryKey = 'email_cust';
    protected $allowedFields = ['email_cust', 'nama_cust', 'alamat_cust', 'notelp_cust', 'jenis', 'tanggal', 'status_pesan'];

    //Models Pemesanan
    public function getAllPesanans() {
        return $this->findAll();
    }

    public function getPesanan($id) {
        return $this->find($id);
    }

    public function getJenisCounts()
    {
        return $this->select('jenis, COUNT(*) as count')
                    ->groupBy('jenis')
                    ->findAll();
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