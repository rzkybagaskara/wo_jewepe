<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // if(!session()->has('loggedUserId')) {
        //     return redirect()->back()->with('fail', "Anda harus login");
        //     //return redirect()->to(base_url('/loginPage'))->with('fail', 'You need to login');
        // }
        $session = session();
        if (!$session->has('IsLoggedIn')) {
            // Redirect to login page if user is not authenticated or not an admin
            return redirect()->to('/loginPage');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}