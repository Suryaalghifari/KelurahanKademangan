<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =========================
// ===== FRONTEND ROUTES ===
// =========================

$routes->get('test-email', 'TestEmail::index');
$routes->get('/', 'Frontend\Beranda::index');

// Pengaduan
$routes->get('pengaduan', 'Frontend\Pengaduan::index');
$routes->post('pengaduan/kirim', 'Frontend\Pengaduan::kirim');

// SKCK
$routes->get('skck', 'Frontend\PengantarSkck::index');
$routes->post('skck/submit', 'Frontend\PengantarSkck::submit');

// Surat Menikah
$routes->get('suratmenikah', 'Frontend\SuratMenikah::form');
$routes->post('suratmenikah/submit', 'Frontend\SuratMenikah::submit');


// =====================
// ===== AUTH ROUTES ===
// =====================
$routes->get('auth/login', 'Auth\Auth::login');
$routes->post('auth/login/process', 'Auth\Auth::loginProcess');
$routes->get('auth/logout', 'Auth\Auth::logout');


// ==========================
// ===== ADMIN ROUTES =======
// ==========================
$routes->group('admin', ['filter' => 'adminauth'], function($routes) {

    // Dashboard
    $routes->get('/', 'Admin\Dashboard::index');

    // ------------------------
    // Pengaduan
    // ------------------------
    $routes->get('pengaduan', 'Admin\Pengaduan::index');
    $routes->get('pengaduan/detail/(:num)', 'Admin\Pengaduan::detail/$1');
    $routes->post('pengaduan/status/(:num)', 'Admin\Pengaduan::updateStatus/$1');
    $routes->post('pengaduan/delete/(:num)', 'Admin\Pengaduan::delete/$1');
    $routes->get('pengaduan/download/(:segment)', 'Admin\Pengaduan::download/$1');
    $routes->post('pengaduan/kirim-email/(:num)', 'Admin\Pengaduan::kirimEmail/$1');



    // ------------------------
    // Pengajuan SKCK
    // ------------------------
    $routes->get('skck', 'Admin\PengajuanSkck::index');
    $routes->get('skck/detail/(:num)', 'Admin\PengajuanSkck::detail/$1');
    $routes->post('skck/status/(:num)', 'Admin\PengajuanSkck::updateStatus/$1');
    $routes->post('skck/delete/(:num)', 'Admin\PengajuanSkck::delete/$1');
    $routes->get('skck/view/(:segment)', 'Admin\PengajuanSkck::download/$1');
    $routes->post('skck/kirim-email/(:num)', 'Admin\PengajuanSkck::kirimEmail/$1');

    // Pengajuan Surat Menikah
    $routes->get('suratmenikah', 'Admin\SuratMenikah::index');
    $routes->get('suratmenikah/detail/(:num)', 'Admin\SuratMenikah::detail/$1');
    $routes->post('suratmenikah/status/(:num)', 'Admin\SuratMenikah::updateStatus/$1');
    $routes->get('suratmenikah/view/(:segment)', 'Admin\SuratMenikah::download/$1');
    $routes->post('suratmenikah/delete/(:num)', 'Admin\SuratMenikah::delete/$1');
    $routes->post('suratmenikah/kirim-email/(:num)', 'Admin\SuratMenikah::kirimEmail/$1');






    // (Jika nanti ada surat menikah, bisa ditambah di sini)
});
