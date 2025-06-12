<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Detail Pengaduan Masyarakat</h6>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <!-- Data Pelapor -->
        <div class="col-md-6">
          <h6>Data Pelapor</h6>
          <p><strong>Nama:</strong> <?= $pengaduan['anonim'] ? 'Anonim' : esc($pengaduan['nama']) ?></p>
          <p><strong>Email:</strong> <?= esc($pengaduan['email']) ?></p>
          <p><strong>Telepon:</strong> <?= esc($pengaduan['telepon']) ?></p>
          <p><strong>Alamat:</strong> <?= esc($pengaduan['alamat']) ?></p>
        </div>

        <!-- Detail Pengaduan -->
        <div class="col-md-6">
          <h6>Detail Pengaduan</h6>
          <p><strong>Kategori:</strong> <?= esc($pengaduan['kategori']) ?></p>
          <p><strong>Prioritas:</strong> <?= ucfirst($pengaduan['prioritas']) ?></p>
          <p><strong>Lokasi:</strong> <?= esc($pengaduan['lokasi']) ?></p>
        </div>
      </div>

      <!-- Status dan Kirim Email Sejajar -->
      <div class="row mt-4">
        <!-- Status -->
        <div class="col-md-6">
          <label class="fw-bold mt-2 mb-1">Status Saat Ini:</label>
          <form action="<?= base_url('admin/pengaduan/status/' . $pengaduan['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="input-group mb-3">
              <select name="status" class="form-select">
                <option value="menunggu" <?= $pengaduan['status'] === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                <option value="diproses" <?= $pengaduan['status'] === 'diproses' ? 'selected' : '' ?>>Diproses</option>
                <option value="selesai" <?= $pengaduan['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
              </select>
              <button type="submit" class="btn btn-danger">Ubah</button>
            </div>
          </form>
          <p><strong>Dikirim pada:</strong> <?= date('d M Y, H:i', strtotime($pengaduan['created_at'])) ?></p>
        </div>

        <!-- Form Kirim Email -->
        <div class="col-md-6">
          <h6 class="mb-3">Kirim Email Balasan ke Pelapor</h6>

          <div class="alert alert-info text-dark p-3 rounded" style="background-color: #e0f0ff;">
            <i class="fas fa-info-circle me-1"></i>
            Email akan dikirim ke <strong><?= esc($pengaduan['email']) ?></strong> menggunakan
            <a href="#" class="text-primary text-decoration-underline">template otomatis</a> sesuai status saat ini.
            <br>Tambahkan catatan tambahan di bawah ini.
          </div>

          <form action="<?= base_url('admin/pengaduan/kirim-email/' . $pengaduan['id']) ?>" method="post" id="formEmailPengaduan">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label for="pesan" class="form-label fw-semibold">Catatan Tambahan</label>
              <textarea name="pesan" id="pesan" rows="4" class="form-control" placeholder="Contoh: Petugas akan menindaklanjuti dalam waktu dekat." required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">
              <i class="fas fa-paper-plane me-1"></i> Kirim Email ke <?= esc($pengaduan['email']) ?>
            </button>
          </form>
        </div>
      </div>

      <!-- Isi Pengaduan -->
      <div class="mt-5">
        <h6 class="mb-2">Isi Pengaduan</h6>
        <p><strong>Judul:</strong> <?= esc($pengaduan['judul']) ?></p>
        <p><strong>Deskripsi:</strong><br><?= nl2br(esc($pengaduan['deskripsi'])) ?></p>

        <?php if (!empty($pengaduan['lampiran'])): ?>
          <p class="mt-3"><strong>Lampiran Bukti:</strong></p>
          <iframe src="<?= base_url('admin/pengaduan/download/' . $pengaduan['lampiran']) ?>" width="100%" height="500px" style="border:1px solid #ccc; border-radius:6px;"></iframe>
          <a href="<?= base_url('admin/pengaduan/download/' . $pengaduan['lampiran']) ?>" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
            Buka di Tab Baru / Unduh
          </a>
        <?php else: ?>
          <p class="text-muted">Tidak ada lampiran terlampir.</p>
        <?php endif; ?>
      </div>

      <a href="<?= base_url('admin/pengaduan') ?>" class="btn btn-secondary mt-4">← Kembali</a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
