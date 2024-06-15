<?php

namespace App\Models;

use CodeIgniter\Model;

//Model untuk Login Admin
class M_login extends Model {
    //Tabel Admin
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password', 'admin_name'];
}
?>