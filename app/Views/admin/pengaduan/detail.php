<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid py-4">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Detail Pengaduan Masyarakat</h6>
      </div>
</div>
<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header pb-0">
      <h6>Detail Pengaduan: <?= esc($pengaduan['judul']) ?></h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <p><strong>Nama:</strong> <?= $pengaduan['anonim'] ? 'Anonim' : esc($pengaduan['nama']) ?></p>
          <p><strong>Email:</strong> <?= esc($pengaduan['email']) ?></p>
          <p><strong>Telepon:</strong> <?= esc($pengaduan['telepon']) ?></p>
          <p><strong>Alamat:</strong> <?= esc($pengaduan['alamat']) ?></p>
        </div>
        <div class="col-md-6">
          <p><strong>Kategori:</strong> <?= esc($pengaduan['kategori']) ?></p>
          <p><strong>Prioritas:</strong> <?= ucfirst($pengaduan['prioritas']) ?></p>
          <p><strong>Status:</strong> <?= ucfirst($pengaduan['status']) ?></p>
          <p><strong>Status Saat Ini:</strong> <?= ucfirst($pengaduan['status']) ?></p>
        <form action="<?= base_url('admin/pengaduan/status/' . $pengaduan['id']) ?>" method="post" class="d-flex align-items-center gap-2 mb-3">
        <select name="status" class="form-select form-select-sm" style="width: auto;">
            <option value="menunggu" <?= $pengaduan['status'] === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
            <option value="diproses" <?= $pengaduan['status'] === 'diproses' ? 'selected' : '' ?>>Diproses</option>
            <option value="selesai" <?= $pengaduan['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
        </select>
        <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
        </form>
          <p><strong>Lokasi:</strong> <?= esc($pengaduan['lokasi']) ?></p>
        </div>
        <div class="col-12">
          <hr>
          <p><strong>Deskripsi:</strong><br><?= esc($pengaduan['deskripsi']) ?></p>

          <?php if (!empty($pengaduan['lampiran'])): ?>
            <p><strong>Lampiran:</strong> 
              <a href="<?= base_url('uploads/pengaduan/' . $pengaduan['lampiran']) ?>" target="_blank" class="btn btn-sm btn-info">Lihat Lampiran</a>
            </p>
          <?php endif ?>

          <p><small><i>Dikirim pada: <?= date('d M Y, H:i', strtotime($pengaduan['created_at'])) ?></i></small></p>
          <a href="<?= base_url('admin/pengaduan') ?>" class="btn btn-sm btn-secondary mt-2">← Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
