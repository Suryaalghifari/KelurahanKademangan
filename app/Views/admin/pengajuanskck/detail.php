<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Detail Pengajuan SKCK</h6>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <!-- Kolom kiri -->
        <div class="col-md-6">
          <p><strong>Nama:</strong> <?= esc($skck['nama']) ?></p>
          <p><strong>NIK:</strong> <?= esc($skck['nik']) ?></p>
          <p><strong>Alamat:</strong> <?= esc($skck['alamat']) ?></p>
        </div>

        <!-- Kolom kanan -->
        <div class="col-md-6">
          <p><strong>Keperluan:</strong> <?= esc($skck['keperluan']) ?></p>
        </div>

        <!-- Status & Email (Horizontal Row) -->
        <div class="col-md-6">
          <p><strong>Status Saat Ini:</strong></p>
          <form action="<?= base_url('admin/skck/status/' . $skck['id']) ?>" method="post" class="d-flex align-items-center gap-2 mb-3">
            <?= csrf_field() ?>
            <select name="status" class="form-select form-select-sm" style="width: auto;">
              <option value="menunggu" <?= $skck['status'] == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
              <option value="diproses" <?= $skck['status'] == 'diproses' ? 'selected' : '' ?>>Diproses</option>
              <option value="selesai" <?= $skck['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
            <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
          </form>
          <p><strong>Dikirim pada:</strong> <?= date('d M Y, H:i', strtotime($skck['created_at'])) ?></p>
        </div>

        <div class="col-md-6">
            <h6 class="mb-3">Kirim Email Balasan ke Pemohon</h6>

            <div class="alert alert-info p-2">
              <i class="fas fa-info-circle"></i> Email ini akan dikirim ke <strong><?= esc($skck['email']) ?></strong> menggunakan <u>template otomatis</u> sesuai status saat ini.
              <br>Silakan tambahkan catatan tambahan jika perlu.
            </div>

            <form action="<?= base_url('admin/skck/kirim-email/' . $skck['id']) ?>" method="post" id="formEmailSkck">
              <?= csrf_field() ?>

              <div class="mb-3">
                <label for="pesan" class="form-label fw-semibold">Catatan Tambahan</label>
                <textarea name="pesan" id="pesan" rows="4" class="form-control" placeholder="Contoh: Mohon lengkapi NIK, atau silakan ambil surat besok pagi." required></textarea>
              </div>

              <button type="submit" class="btn btn-success w-100">
                <i class="fas fa-paper-plane"></i> Kirim Email ke <?= esc($skck['email']) ?>
              </button>
            </form>
          </div>


      <!-- Preview Formulir -->
      <div class="mt-4">
        <p><strong>Lampiran Formulir:</strong></p>
        <?php if (!empty($skck['formulir'])): ?>
          <iframe src="<?= base_url('admin/skck/view/' . $skck['formulir']) ?>" width="100%" height="500px" style="border:1px solid #ccc; border-radius: 6px;"></iframe>
          <a href="<?= base_url('admin/skck/view/' . $skck['formulir']) ?>" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
            Buka di Tab Baru / Unduh
          </a>
        <?php else: ?>
          <p class="text-muted">Tidak ada formulir terlampir.</p>
        <?php endif; ?>
      </div>

      <!-- Tombol Kembali -->
      <div class="d-flex gap-2 mt-4">
        <a href="<?= base_url('admin/skck') ?>" class="btn btn-sm btn-secondary">← Kembali</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
