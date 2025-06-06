<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

<div class="container">
    <!-- Alert sukses -->
    <?php if(session()->getFlashdata('message')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <!-- Header -->
    <div class="header">
        <h1>Form Pengaduan Kelurahan</h1>
        <p>Sampaikan keluhan dan saran Anda untuk pelayanan yang lebih baik</p>
    </div>

    <!-- Main Form -->
    <form id="complaintForm" class="complaint-form" method="post" action="<?= site_url('pengaduan/kirim') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-grid">
        <!-- Data Pelapor -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-user"></i> Data Pelapor</h3>
                <p>Isi data diri Anda dengan lengkap dan benar</p>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label for="name">Nama Lengkap *</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">No. Telepon *</label>
                        <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Alamat Lengkap *</label>
                    <textarea id="address" name="address" placeholder="Jalan, RT/RW, Kelurahan, Kecamatan" required></textarea>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="anonymous" name="anonymous">
                    <label for="anonymous">Kirim sebagai anonim</label>
                </div>
            </div>
        </div>

        <!-- Detail Pengaduan -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-file-text"></i> Detail Pengaduan</h3>
                <p>Jelaskan pengaduan Anda dengan detail</p>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label for="category">Kategori Pengaduan *</label>
                    <select id="category" name="category" required>
                        <option value="">Pilih kategori pengaduan</option>
                        <option value="infrastruktur">Infrastruktur & Jalan</option>
                        <option value="kebersihan">Kebersihan & Sampah</option>
                        <option value="keamanan">Keamanan & Ketertiban</option>
                        <option value="pelayanan">Pelayanan Publik</option>
                        <option value="lingkungan">Lingkungan Hidup</option>
                        <option value="sosial">Sosial & Kemasyarakatan</option>
                        <option value="ekonomi">Ekonomi & UMKM</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tingkat Prioritas *</label>
                    <div class="radio-group">
                        <div class="radio-item">
                            <input type="radio" id="rendah" name="priority" value="rendah" required>
                            <label for="rendah"><span class="badge badge-secondary">Rendah</span></label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="sedang" name="priority" value="sedang" required>
                            <label for="sedang"><span class="badge badge-warning">Sedang</span></label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="tinggi" name="priority" value="tinggi" required>
                            <label for="tinggi"><span class="badge badge-danger">Tinggi</span></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Judul Pengaduan *</label>
                    <input type="text" id="title" name="title" placeholder="Ringkasan singkat pengaduan" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Lengkap *</label>
                    <textarea id="description" name="description" rows="4" placeholder="Jelaskan detail pengaduan, kapan terjadi, dampak yang dirasakan, dll." required></textarea>
                </div>
                <div class="form-group">
                    <label for="location">Lokasi Kejadian</label>
                    <div class="input-with-button">
                        <input type="text" id="location" name="location" placeholder="Alamat atau patokan lokasi">
                        <button type="button" class="btn-icon" onclick="getLocation()">
                            <i class="fas fa-map-marker-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Bukti -->
    <div class="card full-width">
        <div class="card-header">
            <h3><i class="fas fa-upload"></i> Upload Bukti Pendukung</h3>
            <p>Upload foto, video, atau dokumen pendukung (opsional)</p>
        </div>
        <div class="card-content">
            <div class="upload-area" onclick="document.getElementById('fileInput').click()">
                <i class="fas fa-cloud-upload-alt upload-icon"></i>
                <p>Klik untuk upload atau drag & drop file di sini</p>
                <small>Format: JPG, PNG, PDF, MP4 (Max. 10MB)</small>
                <input type="file" id="fileInput" name="lampiran" accept="image/*,video/*,.pdf" onchange="previewFileName()">
            </div>
            <div id="fileList" class="file-list"></div>
        </div>
    </div>

    <!-- Alert Info -->
    <div class="alert alert-info">
        <i class="fas fa-info-circle"></i>
        <div>
            <strong>Informasi Penting:</strong> Pengaduan akan diproses dalam 1x24 jam. Anda akan mendapat notifikasi melalui SMS/Email mengenai status pengaduan.
        </div>
    </div>

    <!-- Submit Buttons -->
    <div class="form-actions">
        <button type="reset" class="btn btn-outline">Reset</button>
        <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
    </div>
</form>

    <!-- Footer Info -->
    <div class="footer-info">
        <p>Hotline Kelurahan: (021) 123-4567 | Email: kelurahan@example.com</p>
        <p>Jam Pelayanan: Senin - Jumat, 08:00 - 16:00 WIB</p>
    </div>
</div>
<script src="<?= base_url('assets/frontend/js/pengaduan.js') ?>"></script>

<?= $this->endSection() ?>
