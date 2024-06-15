<?php

namespace App\Controllers;

use App\Models\M_paket;
use App\Models\M_pesanan;

//Main Controller untuk Admin melakukan manajemen website
class Home extends BaseController {
    protected $paketModel;
    protected $pesananModel;

    public function __construct() {
        $this->paketModel = new M_paket();
        $this->pesanModel= new M_pesanan();
    }

    public function index() {
        $paket = $this->paketModel->getAllPakets();
        
        if ($paket) {
            return view('main', ['paket' => $paket]);
        } else {
            return redirect()->to(base_url('/'));
        }
    }

    public function loginAdmin() {
        echo view('loginAdmin');
    }

    //Paket Wedding
    public function daftarPaket() {
        $paket = $this->paketModel->getAllPakets();

        if ($paket) {
            return view('daftarPaket', ['paket' => $paket]);
        } else {
            //kalau make filters make admin depannya
            //return redirect()->to(base_url('/admin/daftarPaket'));
            return redirect()->to(base_url('/daftarPaket'));
        }
    }

    public function tambahPaket($id = null) {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'jenis' => 'required|max_length[30]',
            'harga' => 'required',
            'fasilitas' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('tambahPaket', ['validation' => $validation]);
        } else {
            $id = substr(uniqid('item', true), 0, 11);

            $file = $this->request->getFile('upload_gambar_paket');
            $newName = $file->getRandomName();

            $config['upload_path'] = './upload/post';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 100000;
            $config['file_ext_tolower'] = true;
            $config['file_name'] = str_replace('.', '_', $id);

            $file->move(ROOTPATH . 'upload/post', $newName);

            $data = [
                'id_paket' => $id,
                'jenis' => $this->request->getVar('jenis'),
                'harga' => $this->request->getVar('harga'),
                'fasilitas' => $this->request->getVar('fasilitas'),
                'gambar' => $newName
            ];

            $this->paketModel->addPaket($data);
            //kalau make filters depannya kasih admin
            //return redirect()->to(base_url('/admin/daftarPaket'));
            return redirect()->to(base_url('/daftarPaket'));
        }
    }

    public function updatePaket($id = null) {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'jenis' => 'required|max_length[30]',
            'harga' => 'required',
            'fasilitas' => 'required',
        ]);

        $data['paket'] = $this->paketModel->getPaket($id);

        if (!$validation->withRequest($this->request)->run()) {
            return view('updatePaket', ['data' => $data['paket']], ['validation' => $validation]);
        } else {
            $config['upload_path'] = './upload/post';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 100000;
            $config['file_ext_tolower'] = true;
            $config['file_name'] = str_replace('.', '_', $id);

            $gambar_paket = $this->request->getFile('upload_gambar_paket');
            
             // Cek kalo ada gambar baru
            if ($gambar_paket->isValid() && !$gambar_paket->hasMoved()) {

                // Hapus gambar seblumyna kalo ada
                $prev_image = $data['paket']['gambar'];
                $newName = $gambar_paket->getRandomName();

                if ($prev_image && file_exists(ROOTPATH . 'upload/post/' . $prev_image)) {
                    unlink(ROOTPATH . 'upload/post/' . $prev_image);
                }

                // Simpen ke folder post
                $gambar_paket->move(ROOTPATH . 'upload/post',  $newName);

                // Update db pake nama baru
                $data = [
                    'jenis' => $this->request->getVar('jenis'),
                    'harga' => $this->request->getVar('harga'),
                    'fasilitas' => $this->request->getVar('fasilitas'),
                    'gambar' => $newName
                ];
            } else {
                // Ga ada gambar baru, langsung ambil data dari input field
                $data = [
                    'jenis' => $this->request->getVar('jenis'),
                    'harga' => $this->request->getVar('harga'),
                    'fasilitas' => $this->request->getVar('fasilitas'),
                ];
            }

            $this->paketModel->updatePaket($id, $data);
            //kalau make filters depannya harus kasih admin
            //return redirect()->to(base_url('/admin/daftarPaket'));
            return redirect()->to(base_url('/daftarPaket'));
        }
    }

    public function deletePaket($id = null) {
        $post = $this->paketModel->getPaket($id);

        if ($post) {
            $this->paketModel->deletePaket($id);
            unlink(ROOTPATH . 'upload/post/' . $post['gambar']);
        }
        //kalau make filters depannya harus kasih admin
        //return redirect()->to(base_url('/admin/daftarPaket'));
        return redirect()->to(base_url('/daftarPaket'));
    }

    //Pemesanan
    public function daftarPesanan() {
        $pesan = $this->pesanModel->getAllPesanans();

        if ($pesan) {
            return view('daftarPesanan', ['pesan' => $pesan]);
        } else {
            //kalau make filters depannya harus kasih admin
            //return redirect()->to(base_url('/admin/daftarPesanan'));
            return redirect()->to(base_url('/daftarPesanan'));
        }
    }

    public function updatePesanan($id = null){
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

        $data['pesan'] = $this->pesanModel->getPesanan($id);
        //$pesan = $this->pesananModel->getPesanan($id);

         // Check if data was retrieved successfully
        //if (empty($pesan)) {
        // Handle the case where no data was found (e.g., redirect to an error page or show a message)
            //return redirect()->to(base_url('/errorPage'))->with('message', 'Pesanan not found.');
        //}

        // Set the 'status_pesan' if it is not set
        //if (!isset($pesan['status_pesan'])) {
            //$pesan['status_pesan'] = 'Requested'; // or any default value you prefer
        //}

        //$data['pesan'] = $pesan;
        if (!$validation->withRequest($this->request)->run()) {
            return view('updatePesanan', ['data' => $data['pesan']], ['validation' => $validation]);
        } else {
                // Update db pake nama baru
                //$email = $this->request->getVar('email_customer');
                //$encodedEmail = urlencode($email);
            $statusPemesanan = $this->request->getVar('status_pemesanan_radio');

            $data = [
                'nama_cust' => $this->request->getVar('nama_customer'),
                //'email_cust' => $encodedEmail,
                'email_cust' => $this->request->getVar('email_customer'),
                'alamat_cust' => $this->request->getVar('alamat_customer'),
                'notelp_cust' => $this->request->getVar('notelp_customer'),
                'jenis' => $this->request->getVar('jenis_paket'),
                'tanggal' => $this->request->getVar('tanggal_pemesanan'),
                'status_pesan' => $statusPemesanan //default value
            ];
            
            $this->pesanModel->updatePesanan($id, $data);
            //kalau make filters depannya harus kasih admin
            //return redirect()->to(base_url('/admin/daftarPesanan'));
            return redirect()->to(base_url('/daftarPesanan'));
        }
    }
    
    public function deletePesanan($id = null) {
        $post = $this->pesanModel->getPesanan($id);
        
        if ($post) {
            $this->pesanModel->deletePesanan($id);
        }
        //kalau make filters harus kasih admin
        //return redirect()->to(base_url('/admin/daftarPesanan'));
        return redirect()->to(base_url('/daftarPesanan'));
    }
}