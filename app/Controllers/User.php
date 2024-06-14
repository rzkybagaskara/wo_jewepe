<?php

namespace App\Controllers;

use App\Models\M_pesanan;

//Controller User untuk melakukan pemesanan paket wedding
class User extends BaseController {
    protected $pesananModel;

    public function __construct() {
        $this->pesananModel= new M_pesanan();
    }

    public function rsvp() {
        return view('rsvp');
    }

    public function tambahPesanan(){
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_customer' => 'required',
            'email_customer' => 'required|max_length[30]',
            'alamat_customer' => 'required',
            'notelp_customer' => 'required',
            'jenis_paket' => 'required',
            'tanggal_pemesanan' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('rsvp', ['validation' => $validation]);
        } else {
              // Encode email
           // $email = $this->request->getVar('email_customer');
            //$encodedEmail = urlencode($email);
        
            $data = [
                'nama_cust' => $this->request->getVar('nama_customer'),
                //'email_cust' => $encodedEmail,
                'email_cust' => $this->request->getVar('email_customer'),
                'alamat_cust' => $this->request->getVar('alamat_customer'),
                'notelp_cust' => $this->request->getVar('notelp_customer'),
                'jenis' => $this->request->getVar('jenis_paket'),
                'tanggal' => $this->request->getVar('tanggal_pemesanan'),
                'status_pesan' => 'Requested' //default value
            ];

            $this->pesananModel->addPesanan($data);
            return redirect()->to(base_url('/'));
        }
    }
}
?>