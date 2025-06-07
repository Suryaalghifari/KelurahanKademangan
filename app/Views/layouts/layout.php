<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Kelurahan Contoh - Website Resmi') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/frontend/css/style.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('uploads/logo/kademangan.png') ?>">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
    <!-- Loader Container -->
    <div id="globalLoader" style="position: fixed; z-index: 9999; background: #fff; top: 0; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center;">
        <lottie-player
        src="<?= base_url('assets/frontend/anim/loading.json') ?>"
        background="transparent"
        speed="1"
        style="width: 200px; height: 200px"
        loop
        autoplay
        ></lottie-player>
    </div>
    

    <!-- Header -->
    <?= $this->include('frontend/partials/header') ?>

    <!-- Konten Utama -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('frontend/partials/footer') ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('a:not([target="_blank"]):not([href^="#"])');

        links.forEach(link => {
        link.addEventListener('click', function (e) {
            const loader = document.getElementById('globalLoader');
            if (loader) {
            e.preventDefault(); // cegah dulu pindah halaman
            loader.style.display = 'flex';
            loader.style.opacity = 1;

            // tunggu sebentar biar animasi kelihatan, baru pindah
            setTimeout(() => {
                window.location.href = this.href;
            }, 1000); // ubah ke 1500 jika masih terlalu cepat
            }
        });
        });
    });
    </script>


    <!-- JS Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/frontend/js/global.js') ?>"></script>
    <script src="<?= base_url('assets/frontend/js/script.js') ?>"></script>

    <!-- SweetAlert Flashdata -->
    <?php if (session()->getFlashdata('message')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('message') ?>',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('upload_success')): ?>
        <script>
            showFileUploadSuccess();
        </script>
    <?php endif; ?>
    <script>
    window.addEventListener('load', function () {
        const loader = document.getElementById('globalLoader');
        if (loader) {
        // Tunda minimal 2 detik sebelum menghilangkan loading
        setTimeout(() => {
            loader.style.opacity = 0;
            setTimeout(() => loader.style.display = 'none', 500);
        }, 2000); // <-- 2000ms = 2 detik
        }
    });
    </script>
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Kelurahan"
    id="waButton"
    style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;"
    target="_blank">
    <lottie-player
        src="<?= base_url('assets/frontend/anim/whatsapp.json') ?>"
        background="transparent"
        speed="1"
        style="width: 60px; height: 60px;"
        loop
        autoplay>
    </lottie-player>
    </a>
</body>
</html>
