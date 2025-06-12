<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Surat Tanggapan Pengaduan</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12pt; }
    .title { text-align: center; font-weight: bold; font-size: 14pt; margin-bottom: 30px; }
    .section { margin-top: 20px; }
  </style>
</head>
<body>
  <div class="title">SURAT TANGGAPAN PENGADUAN</div>

  <p>Kepada Yth,</p>
  <p><?= esc(isset($pengaduan['anonim']) && $pengaduan['anonim'] ? 'Pelapor Anonim' : ($pengaduan['nama'] ?? 'Pelapor')) ?>,</p>

  <p>Terima kasih atas laporan Anda terkait <strong><?= esc($pengaduan['kategori'] ?? '-') ?></strong> yang telah kami terima.</p>

  <div class="section">
    <p><strong>Judul Pengaduan:</strong> <?= esc($pengaduan['judul'] ?? '-') ?></p>
    <p><strong>Deskripsi Singkat:</strong> <?= esc($pengaduan['deskripsi'] ?? '-') ?></p>
  </div>

  <div class="section">
    <p><strong>Status Pengaduan Saat Ini:</strong> <?= esc(ucfirst($status ?? '-')) ?></p>
    <p><?= esc($statusMessage ?? 'Belum ada informasi status.') ?></p>
  </div>

  <?php if (!empty($pesan)): ?>
    <div class="section">
      <p><strong>Catatan Tambahan dari Petugas:</strong></p>
      <p><?= nl2br(esc($pesan)) ?></p>
    </div>
  <?php endif; ?>

  <br><br>
  <p>Demikian tanggapan dari kami. Terima kasih atas partisipasi Anda.</p>

  <p>Hormat kami,</p>
  <p><strong>Kelurahan Kademangan</strong></p>
</body>
</html>
