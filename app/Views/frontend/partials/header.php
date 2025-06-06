    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo">KC</div>
                    <div class="logo-text">
                        <h1>Kelurahan Contoh</h1>
                        <p>Kecamatan Contoh, Kota Contoh</p>
                    </div>
                </div>

                <nav>
                    <div class="nav-item">
                        <a href="<?= base_url('/') ?>" class="nav-link">Beranda</a>
                    </div>

                    <div class="nav-item">
                        <a href="#profil" class="nav-link">
                            Profil <span class="dropdown-arrow">▼</span>
                        </a>
                        <div class="dropdown">
                            <a href="#sejarah" class="dropdown-item">Sejarah Kelurahan</a>
                            <a href="#visi-misi" class="dropdown-item">Visi & Misi</a>
                            <a href="#struktur" class="dropdown-item">Struktur Organisasi</a>
                            <a href="#geografis" class="dropdown-item">Kondisi Geografis</a>
                            <div class="dropdown-separator"></div>
                            <a href="#demografi" class="dropdown-item">Data Demografi</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="#layanan" class="nav-link">
                            Layanan <span class="dropdown-arrow">▼</span>
                        </a>
                        <div class="dropdown">
                            <a href="#surat-domisili" class="dropdown-item">Surat Keterangan Domisili</a>
                            <a href="#sktm" class="dropdown-item">Surat Keterangan Tidak Mampu</a>
                            <a href="#pengantar-ktp" class="dropdown-item">Surat Pengantar KTP</a>
                            <a href="#legalisir" class="dropdown-item">Legalisir Dokumen</a>
                            <div class="dropdown-separator"></div>
                            <a href="#surat-usaha" class="dropdown-item">Surat Keterangan Usaha</a>
                            <a href="#surat-kelahiran" class="dropdown-item">Surat Keterangan Kelahiran</a>
                            <a href="#surat-kematian" class="dropdown-item">Surat Keterangan Kematian</a>
                            <a href="#surat-pindah" class="dropdown-item">Surat Keterangan Pindah</a>
                            <div class="dropdown-separator"></div>
                            <a href="<?= base_url('pengaduan') ?>" class="dropdown-item">Pengaduan Online</a>
                            <a href="#informasi-publik" class="dropdown-item">Informasi Publik</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="#berita" class="nav-link">
                            Berita <span class="dropdown-arrow">▼</span>
                        </a>
                        <div class="dropdown">
                            <a href="#berita-terbaru" class="dropdown-item">Berita Terbaru</a>
                            <a href="#pengumuman" class="dropdown-item">Pengumuman</a>
                            <a href="#kegiatan" class="dropdown-item">Kegiatan Kelurahan</a>
                            <a href="#program" class="dropdown-item">Program Kerja</a>
                            <div class="dropdown-separator"></div>
                            <a href="#galeri" class="dropdown-item">Galeri Foto</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a href="#kontak" class="nav-link">
                            Kontak <span class="dropdown-arrow">▼</span>
                        </a>
                        <div class="dropdown">
                            <a href="#alamat" class="dropdown-item">Alamat & Lokasi</a>
                            <a href="#telepon" class="dropdown-item">Nomor Telepon</a>
                            <a href="#email" class="dropdown-item">Email Resmi</a>
                            <div class="dropdown-separator"></div>
                            <a href="#jam-pelayanan" class="dropdown-item">Jam Pelayanan</a>
                            <a href="#peta" class="dropdown-item">Peta Lokasi</a>
                        </div>
                    </div>
                </nav>

                <button class="mobile-menu-btn" onclick="toggleMobileMenu()">Menu</button>

                <div class="mobile-nav" id="mobileNav">
                    <div class="mobile-nav-section">
                        <div class="mobile-nav-title">Profil</div>
                        <a href="#sejarah" class="mobile-nav-item">Sejarah Kelurahan</a>
                        <a href="#visi-misi" class="mobile-nav-item">Visi & Misi</a>
                        <a href="#struktur" class="mobile-nav-item">Struktur Organisasi</a>
                        <a href="#geografis" class="mobile-nav-item">Kondisi Geografis</a>
                        <a href="#demografi" class="mobile-nav-item">Data Demografi</a>
                    </div>

                    <div class="mobile-nav-section">
                        <div class="mobile-nav-title">Layanan</div>
                        <a href="#surat-domisili" class="mobile-nav-item">Surat Keterangan Domisili</a>
                        <a href="#sktm" class="mobile-nav-item">Surat Keterangan Tidak Mampu</a>
                        <a href="#pengantar-ktp" class="mobile-nav-item">Surat Pengantar KTP</a>
                        <a href="#legalisir" class="mobile-nav-item">Legalisir Dokumen</a>
                        <a href="#surat-usaha" class="mobile-nav-item">Surat Keterangan Usaha</a>
                        <a href="#pengaduan" class="mobile-nav-item">Pengaduan Online</a>
                    </div>

                    <div class="mobile-nav-section">
                        <div class="mobile-nav-title">Berita</div>
                        <a href="#berita-terbaru" class="mobile-nav-item">Berita Terbaru</a>
                        <a href="#pengumuman" class="mobile-nav-item">Pengumuman</a>
                        <a href="#kegiatan" class="mobile-nav-item">Kegiatan Kelurahan</a>
                        <a href="#galeri" class="mobile-nav-item">Galeri Foto</a>
                    </div>

                    <div class="mobile-nav-section">
                        <div class="mobile-nav-title">Kontak</div>
                        <a href="#alamat" class="mobile-nav-item">Alamat & Lokasi</a>
                        <a href="#telepon" class="mobile-nav-item">Nomor Telepon</a>
                        <a href="#email" class="mobile-nav-item">Email Resmi</a>
                        <a href="#jam-pelayanan" class="mobile-nav-item">Jam Pelayanan</a>
                    </div>
                </div>
            </div>
        </div>
    </header>