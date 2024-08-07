<?php

namespace App\Controllers;

use App\Models\M_websiteinfo;

//Controller untuk mengedit info website
class WebsiteInfo extends BaseController {
    protected $webInfoModel;

    public function __construct() {
        $this->webInfoModel = new M_websiteinfo(); 
    }

    public function daftarWebInfo() {
        $info = $this->webInfoModel->getAllWebInfos();

        if ($info) {
            return view('/detailWebInfo', ['info' => $info]);
        } else {
            //kalau make filters make admin depannya
            //return redirect()->to(base_url('/admin/daftarPaket'));
                // Instead of redirecting, you can show an error message
            return view('/detailWebInfo', ['info' => [], 'error' => 'No information available.']);
        }
    }

    public function updateWebInfo($id = null) {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'notelp_bisnis' => 'required',
            'alamat_bisnis' => 'required',
            'email_bisnis' => 'required|valid_email',
        ]);

        $data['info'] = $this->webInfoModel->getWebInfo($id);

        if (!$validation->withRequest($this->request)->run()) {
            return view('/updateWebInfo', ['data' => $data['info']], ['validation' => $validation]);
        } else {
            $data = [
                'notelp_website' => $this->request->getVar('notelp_bisnis'),
                'alamat_website' => $this->request->getVar('alamat_bisnis'),
                'email_website' => $this->request->getVar('email_bisnis'),
            ];
            
            $this->webInfoModel->updateWebInfo($id, $data);
            //kalau make filters depannya harus kasih admin
            //return redirect()->to(base_url('/admin/daftarPesanan'));
            return redirect()->to(base_url('admin/detailWebInfo'));
        }
    }
}
?>