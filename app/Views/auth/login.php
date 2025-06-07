<?= $this->extend('layouts/login_layout') ?>
<?= $this->section('content') ?>

<!-- Header -->
<div class="header">
  <div class="logo">
    <svg viewBox="0 0 24 24">
      <path d="M10.5 2.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 .75.75v.75h3.75a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-.75.75H15v12.75a.75.75 0 0 1-.75.75h-4.5a.75.75 0 0 1-.75-.75V5.25H6a.75.75 0 0 1-.75-.75v-1.5a.75.75 0 0 1 .75-.75h3.75v-.75Z"/>
    </svg>
  </div>
  <h1>Admin Kelurahan</h1>
  <p>Sistem Informasi Administrasi</p>
</div>

<!-- Login Card -->
<div class="login-card">
  <div class="card-header">
    <h2 class="card-title">Masuk ke Sistem</h2>
    <p class="card-description">Masukkan kredensial Anda untuk mengakses dashboard admin</p>
  </div>

  <form action="<?= base_url('auth/login/process') ?>" method="post">
    <div class="form-group">
      <label class="form-label" for="username">Username</label>
      <div class="input-wrapper">
        <svg class="input-icon" viewBox="0 0 24 24">
          <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
        </svg>
        <input type="text" name="username" class="form-input" placeholder="Masukkan username" required>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label" for="password">Password</label>
      <div class="input-wrapper password-wrapper">
        <svg class="input-icon" viewBox="0 0 24 24">
          <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2z"/>
        </svg>
        <input type="password" name="password" id="password" class="form-input" placeholder="Masukkan password" required>
        <button type="button" class="password-toggle" id="togglePassword">
          <svg id="eyeIcon" viewBox="0 0 24 24">
            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/>
          </svg>
        </button>
      </div>
    </div>

    <div class="form-options">
      <div class="checkbox-wrapper">
        <input type="checkbox" id="remember" name="remember" class="checkbox">
        <label for="remember" class="checkbox-label">Ingat saya</label>
      </div>
      <a href="#" class="forgot-link">Lupa password?</a>
    </div>

    <button type="submit" class="login-button">Masuk ke Dashboard</button>
  </form>
</div>

<script src="<?= base_url('assets/login/js/script.js') ?>"></script>

<?= $this->endSection() ?>
