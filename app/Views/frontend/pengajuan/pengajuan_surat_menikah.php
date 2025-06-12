<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <!-- Flash Message -->
    <?php if(session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <!-- Header -->
    <div class="header">
        <h1>Form Pengajuan Surat Keterangan Menikah</h1>
        <p>Silakan lengkapi data berikut sesuai dengan dokumen resmi untuk keperluan pengajuan surat dari kelurahan</p>
    </div>

    <!-- Main Form -->
    <form id="formSuratMenikah" class="complaint-form" method="post" action="<?= site_url('suratmenikah/submit') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-grid">
        <!-- Data Calon Suami -->
          <!-- Upload Lampiran Permohonan -->
        <div class="card full-width">
            <div class="card-header">
                <h3><i class="fas fa-file-upload"></i> Upload Surat Permohonan</h3>
                <p>Silakan unduh template surat permohonan, isi sesuai format, lalu upload kembali dalam bentuk PDF.</p>
            </div>
            <div class="card-content">
                <a href="<?= base_url('assets/formulir/Surat_Permohonan_Menikah.pdf') ?>" class="btn btn-outline" download>Download Template Permohonan</a>
                <div class="form-group mt-3">
                    <label for="lampiran">Upload Surat Permohonan (PDF)</label>
                    <input type="file" id="lampiran" name="lampiran" accept=".pdf" required>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-male"></i> Data Calon Suami</h3>
                <p>Isi data sesuai KTP calon suami</p>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label for="nama_suami">Nama Lengkap *</label>
                    <input type="text" id="nama_suami" name="nama_suami" placeholder="Masukkan nama lengkap" value="<?= old('nama_suami') ?>" required>
                </div>
                <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email aktif" value="<?= old('email') ?>" required>
                </div>

                <div class="form-group">
                    <label for="nik_suami">NIK *</label>
                    <input type="text" id="nik_suami" name="nik_suami" placeholder="Masukkan NIK" value="<?= old('nik_suami') ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat_suami">Alamat Lengkap *</label>
                    <textarea id="alamat_suami" name="alamat_suami" placeholder="Contoh: Jl. Melati No. 10 RT 04 RW 02" required><?= old('alamat_suami') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Data Calon Istri -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-female"></i> Data Calon Istri</h3>
                <p>Isi data sesuai KTP calon istri</p>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label for="nama_istri">Nama Lengkap *</label>
                    <input type="text" id="nama_istri" name="nama_istri" placeholder="Masukkan nama lengkap" value="<?= old('nama_istri') ?>" required>
                </div>
                <div class="form-group">
                    <label for="nik_istri">NIK *</label>
                    <input type="text" id="nik_istri" name="nik_istri" placeholder="Masukkan NIK" value="<?= old('nik_istri') ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat_istri">Alamat Lengkap *</label>
                    <textarea id="alamat_istri" name="alamat_istri" placeholder="Contoh: Jl. Kenanga No. 5 RT 03 RW 01" required><?= old('alamat_istri') ?></textarea>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Info -->
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i>
        <div>
            <strong>Catatan:</strong> Pengajuan akan diproses dalam waktu 1–2 hari kerja. Pastikan data yang Anda isi benar dan dokumen terunggah dengan baik.
        </div>
    </div>

    <!-- Submit Buttons -->
    <div class="form-actions">
        <button type="reset" class="btn btn-outline">Reset</button>
        <button type="submit" class="btn btn-primary">Ajukan Permohonan</button>
    </div>

    </form>

    <!-- Footer Info -->
    <div class="footer-info">
        <p>Hotline Kelurahan: (021) 123-4567 | Email: kelurahan@example.com</p>
        <p>Jam Pelayanan: Senin - Jumat, 08:00 - 16:00 WIB</p>
    </div>
</div>

<script src="<?= base_url('assets/frontend/js/surat_menikah.js') ?>"></script>

<?= $this->endSection() ?>
