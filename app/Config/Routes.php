<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ====== FRONTEND ======
$routes->get('/', 'Frontend\Beranda::index');
$routes->get('pengaduan', 'Frontend\Pengaduan::index');
$routes->post('pengaduan/kirim', 'Frontend\Pengaduan::kirim');

// ====== ADMIN ======
$routes->get('admin', 'Admin\Dashboard::index');
$routes->get('admin/pengaduan', 'Admin\Pengaduan::index');
$routes->get('admin/pengaduan/detail/(:num)', 'Admin\Pengaduan::detail/$1');




