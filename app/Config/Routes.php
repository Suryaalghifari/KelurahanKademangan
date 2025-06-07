<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ====== FRONTEND ======
$routes->get('/', 'Frontend\Beranda::index');
$routes->get('pengaduan', 'Frontend\Pengaduan::index');
$routes->post('pengaduan/kirim', 'Frontend\Pengaduan::kirim');

// ====== ADMIN LOGIN ======
$routes->get('auth/login', 'Auth\Auth::login');
$routes->post('auth/login/process', 'Auth\Auth::loginProcess');
$routes->get('auth/logout', 'Auth\Auth::logout'); // Tambahkan logout (opsional)

// ====== ADMIN PROTECTED ROUTES ======
$routes->group('admin', ['filter' => 'adminauth'], function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('pengaduan', 'Admin\Pengaduan::index');
    $routes->get('pengaduan/detail/(:num)', 'Admin\Pengaduan::detail/$1');
    $routes->post('pengaduan/status/(:num)', 'Admin\Pengaduan::updateStatus/$1');
});





