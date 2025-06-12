<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container">

    <!-- Header -->
    <div class="header">
        <h1>Form Pengajuan Surat Pengantar SKCK</h1>
        <p>Silakan lengkapi data berikut untuk pengajuan surat pengantar SKCK</p>
    </div>

    <!-- Main Form -->
    <form id="skckForm" method="post" action="<?= site_url('skck/submit') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

        <div class="form-grid">
            <!-- Data Pemohon -->
            <div class="card full-width">
    <div class="card-header">
        <h3><i class="fas fa-file-upload"></i> Upload Formulir SKCK</h3>
        <p>Silakan unduh dan lengkapi formulir, lalu upload kembali dalam format PDF</p>
        </div>
        <div class="card-content">
            <a href="<?= base_url('assets/formulir/Surat_Permohonan_SKCK.pdf') ?>" class="btn btn-outline" download>Download Formulir</a>
            <div class="form-group mt-3">
                <label for="formulir_skck">Upload Formulir yang Telah Diisi (PDF)</label>
                <input type="file" id="formulir_skck" name="formulir_skck" accept=".pdf" required>
            </div>
        </div>
    </div>

            <div class="card full-width">
                <div class="card-header">
                    <h3><i class="fas fa-user-edit"></i> Data Pemohon</h3>
                    <p>Isi dengan data sesuai KTP</p>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap *</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email aktif" value="<?= old('email') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK *</label>
                        <input type="text" id="nik" name="nik" placeholder="Masukkan NIK" value="<?= old('nik') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap *</label>
                        <textarea id="alamat" name="alamat" rows="2" placeholder="Contoh: Jl. Melati No. 10 RT 04 RW 02" required><?= old('alamat') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="keperluan">Keperluan *</label>
                        <input type="text" id="keperluan" name="keperluan" placeholder="Contoh: Pengajuan SKCK untuk melamar kerja" value="<?= old('keperluan') ?>" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi -->
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Catatan:</strong> Surat pengantar SKCK akan diproses dalam waktu 1–2 hari kerja. Pastikan data yang Anda isi benar dan valid.
            </div>
        </div>

        <!-- Submit Button -->
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

<script src="<?= base_url('assets/frontend/js/skck.js') ?>"></script>

<?= $this->endSection() ?>
