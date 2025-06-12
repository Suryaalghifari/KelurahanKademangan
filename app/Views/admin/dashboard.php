<?php
// admin/dashboard.php
?>
<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-2">
  <div class="ms-3 mb-4">
    <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
    <p class="mb-0">Ringkasan data layanan masyarakat.</p>
  </div>
  <div class="row">
    <!-- Pengaduan -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Jumlah Pengaduan</p>
              <h4 class="mb-0"><?= esc($jumlah_pengaduan) ?></h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-danger shadow-danger text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">report</i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-2 ps-3">
          <p class="mb-0 text-sm">Termasuk semua kategori pengaduan</p>
        </div>
      </div>
    </div>

    <!-- SKCK -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Jumlah SKCK</p>
              <h4 class="mb-0"><?= esc($jumlah_skck) ?></h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-info shadow-info text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">badge</i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-2 ps-3">
          <p class="mb-0 text-sm">Total surat pengantar SKCK</p>
        </div>
      </div>
    </div>

    <!-- Surat Menikah -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Jumlah Surat Menikah</p>
              <h4 class="mb-0"><?= esc($jumlah_surat_menikah) ?></h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-success shadow-success text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">favorite</i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-2 ps-3">
          <p class="mb-0 text-sm">Total pengajuan surat menikah</p>
        </div>
      </div>
    </div>

    <!-- Placeholder: Data Tambahan -->
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-header p-2 ps-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="text-sm mb-0 text-capitalize">Statistik Lain</p>
              <h4 class="mb-0">-</h4>
            </div>
            <div class="icon icon-md icon-shape bg-gradient-secondary shadow-secondary text-center border-radius-lg">
              <i class="material-symbols-rounded opacity-10">bar_chart</i>
            </div>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-2 ps-3">
          <p class="mb-0 text-sm">Segera tersedia</p>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>