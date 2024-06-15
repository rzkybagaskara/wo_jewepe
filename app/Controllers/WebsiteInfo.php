<?php

namespace App\Controllers;

use App\Models\M_websiteinfo;

//Controller User untuk melakukan pemesanan paket wedding
class User extends BaseController {
    protected $webInfoModel;

    public function __construct() {
        $this->webInfoModel= new M_webisteinfo();
    }

    
}
?>