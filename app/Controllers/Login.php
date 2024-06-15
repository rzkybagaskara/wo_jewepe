<?php

namespace App\Controllers;
use App\Models\M_login;
use App\Libraries\Hash;

// Controller untuk login admin
class Login extends BaseController {
    protected $loginModel;

    public function __construct() {
        $this->loginModel = new M_login();
    }

    public function loginPage() {
        return view('/loginAdmin');
    }

    public function checkLogin() {
        helper(['url', 'form']);
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'username_admin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Username harus diisi",
                ]
            ],
            'pw_admin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Password harus diisi"
                ]
            ],
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return view('loginAdmin', ['validation' => $validation]);
        } else {
            $username = $this->request->getVar('username_admin');
            $password = $this->request->getVar('pw_admin');
            
            $userInfo = $this->loginModel->where('username', $username)->first();
            
            if (!$userInfo) {
                session()->setFlashdata('fail', 'Username not found');
                return redirect()->to(base_url('/loginPage'))->withInput();
            }
            
            //$checkPassword = password_verify($password, $userInfo['password']); // Ensure password hashing method matches

            if ($password !== $userInfo['password']) {
                session()->setFlashdata('fail', 'Incorrect password');
                return redirect()->to(base_url('/loginPage'))->withInput();
            } else {
                $loggedUserId = $userInfo['id_admin'];
                $loggedUserFullName = $userInfo['admin_name'];
                //$loggedUserId = 01;
                //$loggedUserFullName = 'John Doe';

                session()->set('loggedUserId', $loggedUserId);
                session()->set('loggedUserFullName', $loggedUserFullName);
                //session()->set('IsLoggedIn', true);

                session()->setFlashdata('success', 'Login successful');
                //kalau make filters
                //return redirect()->to(base_url('/admin/daftarPaket'));
                return redirect()->to(base_url('/daftarPaket'));
            }
        }
    }
    
    public function logout() {
        if(session()->has('loggedUserId')) {
            session()->remove('loggedUserId');
            session()->remove('loggedUserFullName');
            return redirect()->to(base_url('/'))->with('fail', "You are logged out.");
        }
    }
}
?>