<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/loginAdmin', 'Home::loginAdmin');
$routes->get('/daftarPaket', 'Home::daftarPaket');
$routes->get('/tambahPaket', 'Home::tambahPaket');
$routes->get('/about', 'Home::about');