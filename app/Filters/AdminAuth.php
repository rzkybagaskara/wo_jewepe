<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null){
        $session = session();
        if (!$session->has('IsLoggedIn')) {
            // Redirect to login page if user is not authenticated or not an admin
            return redirect()->to('/loginPage')->with('fail', 'You need to login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        // Do something here
    }
}