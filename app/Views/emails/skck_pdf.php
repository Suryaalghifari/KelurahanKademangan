<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Surat Tanggapan SKCK</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12pt; }
    .title { text-align: center; font-weight: bold; font-size: 14pt; margin-bottom: 30px; }
    .section { margin-top: 20px; }
  </style>
</head>
<body>
  <div class="title">SURAT TANGGAPAN PENGAJUAN SKCK</div>

  <p>Kepada Yth:</p>
  <p><?= esc($nama ?? 'Pemohon') ?></p>

  <p>Terima kasih atas pengajuan SKCK yang telah Anda ajukan kepada Kelurahan Kademangan.</p>

  <div class="section">
    <p><strong>Status Pengajuan:</strong> <?= esc(ucfirst($status ?? '-')) ?></p>
    <p><?= esc($statusMessage ?? '-') ?></p>
  </div>

  <?php if (!empty($pesan)): ?>
    <div class="section">
      <p><strong>Catatan Tambahan dari Petugas:</strong></p>
      <p><?= nl2br(esc($pesan)) ?></p>
    </div>
  <?php endif; ?>

  <br><br>
  <p>Demikian tanggapan dari kami. Mohon membawa dokumen kelengkapan saat pengambilan.</p>

  <p>Hormat kami,</p>
  <p><strong>Kelurahan Kademangan</strong></p>
</body>
</html>
