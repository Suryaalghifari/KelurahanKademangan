<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>


<!-- Hero Section -->
<section id="beranda" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Selamat Datang di Website Kelurahan Kademangan</h1>
                    <p>Melayani masyarakat dengan sepenuh hati untuk kemajuan bersama</p>
                    <div class="hero-buttons">
                        <a href="#layanan" class="btn btn-primary">Layanan Online</a>
                        <a href="#kontak" class="btn btn-outline">Hubungi Kami</a>
                    </div>
                </div>
                <div class="hero-image" style="background-image: url('<?= base_url('uploads/logo/kelurahan.png') ?>');">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3 class="stat-blue">2,450</h3>
                    <p>Total Penduduk</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-green">8</h3>
                    <p>RT/RW</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-orange">15</h3>
                    <p>Layanan Publik</p>
                </div>
                <div class="stat-item">
                    <h3 class="stat-purple">24/7</h3>
                    <p>Siap Melayani</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="services">
        <div class="container">
            <div class="section-header">
                <h2>Layanan Publik</h2>
                <p>Berbagai layanan administrasi kependudukan yang dapat Anda akses dengan mudah</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">📄</div>
                    <h3>Surat Keterangan Domisili</h3>
                    <p>Pengurusan surat keterangan domisili untuk warga</p>
                    <div class="service-time">⏱️ 1-2 hari kerja</div>
                </div>

                <div class="service-card">
                    <div class="service-icon">👥</div>
                    <h3>Surat Keterangan Tidak Mampu</h3>
                    <p>Pengurusan SKTM untuk berbagai keperluan</p>
                    <div class="service-time">⏱️ 1-3 hari kerja</div>
                </div>

                <div class="service-card">
                    <div class="service-icon">🏢</div>
                    <h3>Surat Pengantar KTP</h3>
                    <p>Surat pengantar untuk pembuatan KTP baru</p>
                    <div class="service-time">⏱️ 1 hari kerja</div>
                </div>

                <div class="service-card">
                    <div class="service-icon">✅</div>
                    <h3>Legalisir Dokumen</h3>
                    <p>Legalisir berbagai dokumen kependudukan</p>
                    <div class="service-time">⏱️ 1 hari kerja</div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="berita" class="news">
        <div class="container">
            <div class="section-header">
                <h2>Berita & Pengumuman</h2>
                <p>Informasi terkini seputar kegiatan dan program kelurahan</p>
            </div>

            <div class="news-grid">
                <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('uploads/kegiatan/vaksin.jpg') ?>" alt="Foto Vaksinansi Covid 10">
                </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-category">Kesehatan</span>
                            <span class="news-date">📅 15 Des 2024</span>
                        </div>
                        <h3>Pelaksanaan Vaksinasi COVID-19 Tahap 3</h3>
                        <p>Kelurahan mengadakan program vaksinasi COVID-19 tahap 3 untuk masyarakat umum...</p>
                        <a href="#" class="btn btn-outline">Baca Selengkapnya</a>
                    </div>
                </div>

                <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('uploads/kegiatan/bantuan.jpg') ?>" alt="Foto Bantuan Sosial">
                </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-category">Sosial</span>
                            <span class="news-date">📅 10 Des 2024</span>
                        </div>
                        <h3>Program Bantuan Sosial Bulan Desember</h3>
                        <p>Penyaluran bantuan sosial kepada keluarga kurang mampu di wilayah kelurahan...</p>
                        <a href="#" class="btn btn-outline">Baca Selengkapnya</a>
                    </div>
                </div>

                <div class="news-card">
                <div class="news-image">
                    <img src="<?= base_url('uploads/kegiatan/gotongroyong.jpg') ?>" alt="Gotong Royong">
                </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span class="news-category">Lingkungan</span>
                            <span class="news-date">📅 5 Des 2024</span>
                        </div>
                        <h3>Gotong Royong Pembersihan Lingkungan</h3>
                        <p>Kegiatan gotong royong membersihkan lingkungan RT/RW se-kelurahan...</p>
                        <a href="#" class="btn btn-outline">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <a href="#" class="btn btn-outline">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="contact">
        <div class="container">
            <div class="section-header">
                <h2>Hubungi Kami</h2>
                <p>Kami siap melayani dan membantu kebutuhan administrasi Anda</p>
            </div>

            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon contact-blue">📍</div>
                    <h3>Alamat</h3>
                    <p>
                        Jl. Contoh No. 123<br>
                        Kelurahan Kademangan<br>
                        Kecamatan Setu<br>
                        Kota Tanggerang Selatan12345
                    </p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon contact-green">📞</div>
                    <h3>Telepon</h3>
                    <p>
                        (021) 1234-5678<br>
                        (021) 8765-4321<br>
                        <small style="color: #6b7280;">Senin - Jumat: 08:00 - 16:00</small>
                    </p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon contact-orange">✉️</div>
                    <h3>Email</h3>
                    <p>
                        kelurahankademangan@gmail.com<br>
                        infokademangan@kelurahankademangan.go.id
                    </p>
                </div>
            </div>
        </div>
    </section>

  <?= $this->endSection() ?>
