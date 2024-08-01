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
            return view('detailWebInfo', ['info' => $info]);
        } else {
            //kalau make filters make admin depannya
            //return redirect()->to(base_url('/admin/daftarPaket'));
                // Instead of redirecting, you can show an error message
            return view('detailWebInfo', ['info' => [], 'error' => 'No information available.']);
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
            return view('updateWebInfo', ['data' => $data['info']], ['validation' => $validation]);
        } else {
            $data = [
                'notelp_website' => $this->request->getVar('notelp_bisnis'),
                'alamat_website' => $this->request->getVar('alamat_bisnis'),
                'email_website' => $this->request->getVar('email_bisnis'),
            ];
            
            $this->webInfoModel->updateWebInfo($id, $data);
            //kalau make filters depannya harus kasih admin
            //return redirect()->to(base_url('/admin/daftarPesanan'));
            return redirect()->to(base_url('/detailWebInfo'));
        }
    }

    public function footerWebInfo() {
        $id = 1;
    
        $webInfo = $this->webInfoModel->first();
    
        if ($webInfo) {
            $data = [
                'notelp' => $webInfo['notelp_website'],
                'alamat' => $webInfo['alamat_website'],
                'email' => $webInfo['email_website']
            ];
            
            // Load the views with data
            $header = view('header');
            $main = view('main', $data);
            $footer = view('footer', $data);
    
            // Concatenate the views
            $output = $header . $main . $footer;
    
            return $output;
        } else {
            // Handle case where no web info is found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Web info not found');
        }
    }
    
}
?>