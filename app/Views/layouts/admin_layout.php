<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Dashboard') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <!-- Fonts and Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded">
  <link href="<?= base_url('assets/admin/css/nucleo-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/admin/css/nucleo-svg.css') ?>" rel="stylesheet">
  <link rel="icon" type="image/png" href="<?= base_url('uploads/logo/kademangan.png') ?>">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Core CSS -->
  <link id="pagestyle" href="<?= base_url('assets/admin/css/material-dashboard.css') ?>" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">

  <!-- Loader (Global) -->
  <div id="globalLoader" style="position: fixed; z-index: 9999; background: #fff; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
    <lottie-player
      src="<?= base_url('assets/frontend/anim/loading.json') ?>"
      background="transparent"
      speed="1"
      style="width: 200px; height: 200px"
      loop
      autoplay>
    </lottie-player>
  </div>

  <!-- Sidebar -->
  <?= $this->include('admin/partials/sidebar') ?>

  <!-- Main Content -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <?= $this->include('admin/partials/navbar') ?>
    <div class="container-fluid py-4">
      <?= $this->renderSection('content') ?>
    </div>
  </main>

  <!-- Core JS Files -->
  <script src="<?= base_url('assets/admin/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/js/plugins/chartjs.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/js/material-dashboard.min.js') ?>"></script>

  <!-- Optional: Initialize Scrollbar -->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
    }
  </script>

  <!-- Lottie Loader -->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Global SweetAlert + Loader Script -->
  <script src="<?= base_url('assets/frontend/js/global.js') ?>"></script>

  <!-- Flashdata SweetAlert -->
  <?php if (session()->getFlashdata('message')): ?>
    <script>showSuccessMessage("<?= session()->getFlashdata('message') ?>");</script>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <script>showErrorMessage("<?= session()->getFlashdata('error') ?>");</script>
  <?php endif; ?>

  <?php if (session()->getFlashdata('upload_success')): ?>
    <script>showFileUploadSuccess();</script>
  <?php endif; ?>

</body>
</html>
