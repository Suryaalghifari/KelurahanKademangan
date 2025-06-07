<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Admin Kelurahan - Login' ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('uploads/logo/kademangan.png') ?>">
  <!-- Custom Login Style -->
  <link rel="stylesheet" href="<?= base_url('assets/login/css/style.css') ?>">

  <!-- Font (optional) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap">
</head>
<body>

  <div class="container">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Global Loader -->
  <div id="globalLoader" style="position: fixed; z-index: 9999; background: #fff; top: 0; left: 0; width: 100%; height: 100%; display: none; justify-content: center; align-items: center;">
    <lottie-player
      src="<?= base_url('assets/frontend/anim/loading.json') ?>"
      background="transparent"
      speed="1"
      style="width: 200px; height: 200px"
      loop
      autoplay>
    </lottie-player>
  </div>

  <!-- Lottie -->
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Flashdata Notifications -->
  <?php if (session()->getFlashdata('message')): ?>
    <script>showSuccessMessage("<?= session()->getFlashdata('message') ?>");</script>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <script>showErrorMessage("<?= session()->getFlashdata('error') ?>");</script>
  <?php endif; ?>

  <!-- Global Helper JS -->
  <script src="<?= base_url('assets/frontend/js/global.js') ?>"></script>

  <?= $this->renderSection('scripts') ?>
</body>
</html>
