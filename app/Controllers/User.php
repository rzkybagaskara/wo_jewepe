<?php

namespace App\Controllers;

use App\Models\M_pesanan;
use App\Models\M_paket;

//Controller User untuk melakukan pemesanan paket wedding
class User extends BaseController {
    protected $pesananModel;
    protected $paketModel;

    public function __construct() {
        $this->pesananModel= new M_pesanan();
        $this->paketModel= new M_paket();
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
            // 'id_paket' => 'required|numeric'
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
                'status_pesan' => 'Requested', //default value,
                // 'id_paket' => $this->request->getVar('id_paket'),
            ];

            $this->pesananModel->addPesanan($data);
            return redirect()->to(base_url('/'));
        }
    }

    public function cekStatusPesanan() {
        $statusPesan = $this->pesananModel->getAllPesanans();
        
        foreach ($statusPesan as &$pesanan) {
            $pesanan['color'] = $this->getProperColor($pesanan['status_pesan']);
        }
    
        return view('statusPesanan', ['statusPesan' => $statusPesan]);
    }
    
    private function getProperColor($status) {
        switch ($status) {
            case 'Requested':
                return '#FF8000';
            case 'Accepted':
                return '#00FF00';
            default:
                return '#FF0000';
        }
    }
    
}
?>