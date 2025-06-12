<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Detail Pengajuan Surat Menikah</h6>
      </div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h6>Data Suami</h6>
          <p><strong>Nama:</strong> <?= esc($menikah['nama_suami']) ?></p>
          <p><strong>NIK:</strong> <?= esc($menikah['nik_suami']) ?></p>
          <p><strong>Alamat:</strong> <?= esc($menikah['alamat_suami']) ?></p>
        </div>
        <div class="col-md-6">
          <h6>Data Istri</h6>
          <p><strong>Nama:</strong> <?= esc($menikah['nama_istri']) ?></p>
          <p><strong>NIK:</strong> <?= esc($menikah['nik_istri']) ?></p>
          <p><strong>Alamat:</strong> <?= esc($menikah['alamat_istri']) ?></p>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-6">
          <p><strong>Status Saat Ini:</strong></p>
          <form action="<?= base_url('admin/suratmenikah/status/' . $menikah['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="input-group mb-3">
              <select name="status" class="form-select">
                <option value="menunggu" <?= $menikah['status'] === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                <option value="diproses" <?= $menikah['status'] === 'diproses' ? 'selected' : '' ?>>Diproses</option>
                <option value="selesai" <?= $menikah['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
              </select>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
          <p><strong>Dikirim pada:</strong> <?= date('d M Y, H:i', strtotime($menikah['created_at'])) ?></p>
        </div>

        <div class="col-md-6">
          <h6 class="mb-3">Kirim Email Balasan ke Pemohon</h6>

          <div class="alert alert-info p-2">
            <i class="fas fa-info-circle"></i> Email akan dikirim ke <strong><?= esc($menikah['email']) ?></strong> menggunakan <u>template otomatis</u> sesuai status saat ini.
            <br>Tambahkan catatan tambahan di bawah ini.
          </div>

          <form action="<?= base_url('admin/suratmenikah/kirim-email/' . $menikah['id']) ?>" method="post" id="formEmailMenikah">
            <?= csrf_field() ?>
            <div class="mb-3">
              <label for="pesan" class="form-label fw-semibold">Catatan Tambahan</label>
              <textarea name="pesan" id="pesan" rows="4" class="form-control" placeholder="Contoh: Lengkapi alamat istri atau bawa fotokopi KTP." required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">
              <i class="fas fa-paper-plane"></i> Kirim Email ke <?= esc($menikah['email']) ?>
            </button>
          </form>
        </div>


      <div class="mt-4">
        <?php if (!empty($menikah['lampiran'])): ?>
          <p><strong>Lampiran Surat:</strong></p>
          <iframe src="<?= base_url('admin/suratmenikah/view/' . $menikah['lampiran']) ?>" width="100%" height="500px" style="border:1px solid #ccc; border-radius: 6px;"></iframe>
          <a href="<?= base_url('admin/suratmenikah/view/' . $menikah['lampiran']) ?>" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
            Buka di Tab Baru / Unduh
          </a>
        <?php else: ?>
          <p class="text-muted">Tidak ada lampiran terlampir.</p>
        <?php endif; ?>
      </div>

      <a href="<?= base_url('admin/suratmenikah') ?>" class="btn btn-secondary mt-4">← Kembali</a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
