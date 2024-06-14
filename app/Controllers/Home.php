<?php

namespace App\Controllers;

use App\Models\M_paket;


class Home extends BaseController {
    protected $paketModel;

    public function __construct() {
        $this->paketModel = new M_paket();
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

    public function daftarPaket() {
        $paket = $this->paketModel->getAllPakets();

        if ($paket) {
            return view('daftarPaket', ['paket' => $paket]);
        } else {
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
                $prev_image = $data['paket']['gambar_paket'];
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

            return redirect()->to(base_url('/daftarPaket'));
        }
    }

    public function deletePaket($id = null) {
        $post = $this->paketModel->getPaket($id);

        if ($post) {
            $this->paketModel->deletePaket($id);
            unlink(ROOTPATH . 'upload/post/' . $post['gambar']);
        }
        return redirect()->to(base_url('/daftarPaket'));
    }

    public function about(){
        echo view('about');
    }
}