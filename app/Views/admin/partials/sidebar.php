<?php
// File: app/Views/admin/partials/sidebar.php

// Aktifkan URL Service
$uri = service('uri');

// Helper: fungsi menentukan menu aktif
function is_active_menu($segment2)
{
    return service('uri')->getSegment(2) == $segment2 ? 'active bg-gradient-dark text-white' : 'text-dark';
}
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-xl-none" id="iconSidenav"></i>
    <a class="navbar-brand px-4 py-3 m-0" href="<?= base_url('admin') ?>">
      <img src="<?= base_url('uploads/logo/kademangan.png') ?>" class="navbar-brand-img" width="26" height="26" alt="main_logo">
      <span class="ms-1 text-sm text-dark">Admin Kelurahan</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link <?= is_active_menu('') ?>" href="<?= base_url('admin') ?>">
          <i class="material-symbols-rounded opacity-5">dashboard</i>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= is_active_menu('pengaduan') ?>" href="<?= base_url('admin/pengaduan') ?>">
          <i class="material-symbols-rounded opacity-5">report_problem</i>
          <span class="nav-link-text ms-1">Pengaduan Masyarakat</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= is_active_menu('skck') ?>" href="<?= base_url('admin/skck') ?>">
          <i class="material-symbols-rounded opacity-5">badge</i>
          <span class="nav-link-text ms-1">Pengajuan Surat SKCK</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= is_active_menu('suratmenikah') ?>" href="<?= base_url('admin/suratmenikah') ?>">
          <i class="material-symbols-rounded opacity-5">favorite</i>
          <span class="nav-link-text ms-1">Pengajuan Surat Menikah</span>
        </a>
      </li>

      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
        </li>

      <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link text-danger">
        <i class="material-symbols-rounded opacity-5">logout</i>
        <span class="nav-link-text ms-1">Logout</span>
      </a>

      </li>


    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0 ">
  </div>
</aside>
