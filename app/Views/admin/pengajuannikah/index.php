<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-2">
  <div class="ms-3 mb-4">
    <h3 class="mb-0 h4 font-weight-bolder">Pengajuan Surat Menikah</h3>
    <p class="mb-0"> Tinjau dan Kelola Data Pengajuan Surat Menikah Dari Warga.</p>
  </div>
  <div class="row">

<div class="container-fluid py-4">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
        <h6 class="text-white text-capitalize ps-3">Daftar Pengajuan Surat Menikah</h6>
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-3">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Suami</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">NIK Suami</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Email Terdaftar</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Istri</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">NIK Istri</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Tanggal</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Status</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($menikah as $row): ?>
            <tr>
              <td>
                <h6 class="mb-0 text-sm"><?= esc($row['nama_suami']) ?></h6>
                <p class="text-xs text-secondary mb-0"><?= esc($row['alamat_suami']) ?></p>
              </td>
              <td>
                <p class="text-xs text-secondary mb-0"><?= esc($row['nik_suami']) ?></p>
              </td>
              <td>
                <p class="text-xs text-secondary mb-0"><?= esc($row['email']) ?></p>
              </td>
              <td>
                <h6 class="mb-0 text-sm"><?= esc($row['nama_istri']) ?></h6>
                <p class="text-xs text-secondary mb-0"><?= esc($row['alamat_istri']) ?></p>
              </td>
              <td>
                <p class="text-xs text-secondary mb-0"><?= esc($row['nik_istri']) ?></p>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold">
                  <?= date('d/m/Y H:i', strtotime($row['created_at'])) ?>
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
                <a href="<?= base_url('admin/suratmenikah/detail/' . $row['id']) ?>" class="btn btn-sm btn-outline-info me-1">
                  Detail
                </a>

                <form id="formDelete<?= $row['id'] ?>" action="<?= base_url('admin/suratmenikah/delete/' . $row['id']) ?>" method="post" style="display:inline;">
                  <?= csrf_field() ?>
                  <button type="button" 
                    onclick="showConfirmDialog('Yakin ingin menghapus pengajuan ini?', () => document.getElementById('formDelete<?= $row['id'] ?>').submit())" 
                    class="btn btn-sm btn-outline-danger">
                    Hapus
                  </button>
                </form>
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
