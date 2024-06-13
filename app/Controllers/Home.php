<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() {
        return view('main') . view('footer');
    }

    public function loginAdmin() {
        echo view('loginAdmin');
    }

    public function daftarPaket() {
        echo view('daftarPaket');
    }

    public function tambahPaket() {
        echo view('tambahPaket');
    }

    public function about(){
        echo view('about');
    }
}