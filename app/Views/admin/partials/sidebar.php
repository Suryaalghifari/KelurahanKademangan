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
      <img src="<?= base_url('assets/admin/img/logo-ct-dark.png') ?>" class="navbar-brand-img" width="26" height="26" alt="main_logo">
      <span class="ms-1 text-sm text-dark">Admin Panel</span>
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
        <a class="nav-link <?= is_active_menu('tables') ?>" href="<?= base_url('admin/tables') ?>">
          <i class="material-symbols-rounded opacity-5">table_view</i>
          <span class="nav-link-text ms-1">Tables</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= is_active_menu('pengaduan') ?>" href="<?= base_url('admin/pengaduan') ?>">
          <i class="material-symbols-rounded opacity-5">table_view</i>
          <span class="nav-link-text ms-1">Pengaduan Masyarakat</span>
        </a>
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
    <div class="mx-3">
      <a class="btn btn-outline-dark mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard" target="_blank">Documentation</a>
      <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank">Upgrade to pro</a>
    </div>
  </div>
</aside>
