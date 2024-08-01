<?php

namespace App\Models;

use CodeIgniter\Model;

//Model untuk Paket
class M_websiteinfo extends Model {
    //Tabel Website Info
    protected $table = 'website_info';
    protected $primaryKey = 'id_webinfo';
    protected $allowedFields = ['hero_image', 'logo_website', 'notelp_website', 'alamat_website', 'email_website'];

    public function getAllWebInfos() {
        return $this->findAll();
    }

    public function getWebInfo($id) {
        return $this->where('id_webinfo', $id)->first(); 
    }

    // public function addWebInfo($data) {
    //     return $this->insert($data);
    // }

    public function updateWebInfo($id, $data) {
        return $this->where('id_webinfo', $id)->set($data)->update();
    }

    // public function deleteWebInfo($id) {
    //     return $this->where('id_webinfo', $id)->delete();
    // }
}
?>