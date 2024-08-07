<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Root Page
$routes->get('/', 'Home::index');

 //Paket Wedding Page
// $routes->get('/daftarPaket', 'Home::daftarPaket');
// $routes->get('/tambahPaket', 'Home::tambahPaket');
// $routes->post('/deletePaket/(:any)', 'Home::deletePaket/$1');
// $routes->post('/updatePaket/(:any)', 'Home::updatePaket/$1');
// $routes->post('/tambahPaket', 'Home::tambahPaket');

//Pemesanan Page
$routes->get('/rsvp', 'User::rsvp');
$routes->post('/user/tambahPesanan', 'User::tambahPesanan');
// $routes->get('/daftarPesanan', 'Home::daftarPesanan');
// $routes->get('/laporanPesanan', 'Home::laporanPesanan');
// $routes->post('/updatePesanan/(:any)', 'Home::updatePesanan/$1');
// $routes->post('/deletePesanan/(:any)', 'Home::deletePesanan/$1');

//Status Pesan
#$routes->get('/statusPesanan', 'User::statusPesanan');
$routes->get('/statusPesanan', 'User::cekStatusPesanan');

//Website Info Page
// $routes->get('/detailWebInfo', 'WebsiteInfo::daftarWebInfo');
// $routes->post('/updateWebInfo/(:any)', 'WebsiteInfo::updateWebInfo/$1');

//Login Admin Page
$routes->get('/loginPage', 'Login::loginPage');
$routes->post('/checkLogin', 'Login::checkLogin');

//  //Logout
// $routes->get('/logout', 'Login::logout');

// Routes jika menggunakan filters
$routes->group('admin',['filter' => 'auth'], function ($routes) {
    //Daftar Pesanan
    $routes->get('daftarPesanan', 'Home::daftarPesanan');
    $routes->get('laporanPesanan', 'Home::laporanPesanan');
    $routes->post('updatePesanan/(:any)', 'Home::updatePesanan/$1');
    $routes->post('deletePesanan/(:any)', 'Home::deletePesanan/$1');

    //Paket Wedding Page
    $routes->get('daftarPaket', 'Home::daftarPaket');
    $routes->get('tambahPaket', 'Home::tambahPaket');
    $routes->post('deletePaket/(:any)', 'Home::deletePaket/$1');
    $routes->post('updatePaket/(:any)', 'Home::updatePaket/$1');
    $routes->post('tambahPaket', 'Home::tambahPaket');

    //Website Info Page
    $routes->get('detailWebInfo', 'WebsiteInfo::daftarWebInfo');
    $routes->post('updateWebInfo/(:any)', 'WebsiteInfo::updateWebInfo/$1');

    //Logout
    $routes->get('logout', 'Login::logout');
});