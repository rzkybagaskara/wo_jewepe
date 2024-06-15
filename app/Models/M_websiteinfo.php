<?php

namespace App\Models;

use CodeIgniter\Model;

//Model untuk Paket
class M_websiteinfo extends Model {
    //Tabel Website Info
    protected $table = 'website_info';
    protected $primaryKey = 'id_webinfo';
    protected $allowedFields = ['hero_image', 'logo_website', 'notelp_website', 'alamat_website'];

    //Models Paket Wedding
    public function getAllWebInfos() {
        return $this->findAll();
    }

    public function getWebInfo($id) {
        return $this->find($id);
    }

    public function addWebInfo($data) {
        return $this->insert($data);
    }

    public function updateWebInfo($id, $data) {
        return $this->where('id_paket', $id)->set($data)->update();
    }

    public function deleteWebInfo($id) {
        return $this->where('id_paket', $id)->delete();
    }
}
?>