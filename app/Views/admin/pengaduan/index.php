<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Tabel Pengaduan Masyarakat</h6>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-3">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kontak</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prioritas</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Status</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Tanggal</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pengaduan as $row): ?>
            <tr>
              <td>
                <h6 class="mb-0 text-sm"><?= esc($row['anonim'] ? 'Anonim' : $row['nama']) ?></h6>
              </td>
              <td>
                <p class="text-xs text-secondary mb-0"><?= esc($row['email']) ?><br><?= esc($row['telepon']) ?></p>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0"><?= esc($row['judul']) ?></p>
                <p class="text-xs text-secondary mb-0"><?= esc($row['lokasi']) ?></p>
              </td>
              <td>
                <p class="text-xs text-secondary mb-0"><?= esc($row['kategori']) ?></p>
              </td>
              <td>
                <span class="badge badge-sm bg-gradient-<?= 
                  $row['prioritas'] === 'tinggi' ? 'danger' : 
                  ($row['prioritas'] === 'sedang' ? 'warning' : 'info') ?>">
                  <?= ucfirst($row['prioritas']) ?>
                </span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm bg-gradient-<?= 
                  $row['status'] === 'menunggu' ? 'secondary' : 
                  ($row['status'] === 'diproses' ? 'warning' : 'success') ?>">
                  <?= ucfirst($row['status']) ?>
                </span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold"><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></span>
              </td>
              <td class="align-middle text-center">
                <a href="<?= base_url('admin/pengaduan/detail/' . $row['id']) ?>" class="text-primary text-xs font-weight-bold">
                  Detail
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
