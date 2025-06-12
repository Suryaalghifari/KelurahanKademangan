-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2025 pada 19.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelurahan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `anonim` tinyint(1) DEFAULT 0,
  `kategori` varchar(50) DEFAULT NULL,
  `prioritas` enum('rendah','sedang','tinggi') DEFAULT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `lampiran` text DEFAULT NULL,
  `status` enum('baru','diproses','selesai') DEFAULT 'baru',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `nik`, `email`, `telepon`, `alamat`, `anonim`, `kategori`, `prioritas`, `judul`, `deskripsi`, `lokasi`, `lampiran`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Hirmawan', NULL, 'rizkigalangsatria221@gmail.com', '085793478682', 'JALAN Sugiharto', 0, 'kebersihan', 'tinggi', 'Banjir', 'Bandang', 'Setu Bendungan Kelurahan Kademangan', '1749574208_c4b8c5059f0cf6625c27.jpg', 'selesai', '2025-06-10 09:50:08', '2025-06-10 16:50:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skck`
--

CREATE TABLE `skck` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` enum('menunggu','diproses','selesai') DEFAULT 'menunggu',
  `formulir` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skck`
--

INSERT INTO `skck` (`id`, `nama`, `nik`, `email`, `alamat`, `keperluan`, `status`, `formulir`, `created_at`, `updated_at`) VALUES
(9, 'UyaDantol', '1234567890987654', 'm.suryaalghifari@gmail.com', 'Jl Dayung No 33', 'Daftar Kerja', 'diproses', '1749365436_60162db6b3e50b881990.pdf', '2025-06-08 06:50:36', '2025-06-08 17:46:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_menikah`
--

CREATE TABLE `surat_menikah` (
  `id` int(11) NOT NULL,
  `nama_suami` varchar(100) NOT NULL,
  `nik_suami` varchar(20) NOT NULL,
  `alamat_suami` text NOT NULL,
  `nama_istri` varchar(100) NOT NULL,
  `nik_istri` varchar(20) NOT NULL,
  `alamat_istri` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'menunggu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_menikah`
--

INSERT INTO `surat_menikah` (`id`, `nama_suami`, `nik_suami`, `alamat_suami`, `nama_istri`, `nik_istri`, `alamat_istri`, `email`, `lampiran`, `status`, `created_at`) VALUES
(3, 'Muhamad ', '1234567890123456', 'Jalan Dayung no 33', 'Diajeng', '1234567890123456', 'asasaas', 'm.suryaalghifari@gmail.com', '1749359198_17a603e1e984650d6b34.pdf', 'selesai', '2025-06-08 05:06:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$ZvDPs3LFDQquDCy1RNV7w.6SLVJTCudwSUu0NhTuJmX4DXTMtieWi', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skck`
--
ALTER TABLE `skck`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_menikah`
--
ALTER TABLE `surat_menikah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skck`
--
ALTER TABLE `skck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_menikah`
--
ALTER TABLE `surat_menikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
