<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Pengaduan Anda</title>
</head>
<body>
    <p>Yth. <?= esc(isset($pengaduan['anonim']) && $pengaduan['anonim'] ? 'Pelapor Anonim' : ($pengaduan['nama'] ?? 'Pelapor')) ?>,</p>

    <p>Terima kasih telah mengirimkan pengaduan dengan judul: <strong><?= esc($pengaduan['judul'] ?? '-') ?></strong>.</p>

    <p><strong>Status saat ini:</strong> <?= esc(ucfirst($status ?? '-')) ?></p>

    <p><?= esc($statusMessage ?? 'Status belum tersedia.') ?></p>

    <?php if (!empty($pesanTambahan)): ?>
        <p><strong>Catatan Tambahan dari Petugas:</strong></p>
        <p><?= nl2br(esc($pesanTambahan)) ?></p>
    <?php endif; ?>

    <br>
    <p>Jika ada pertanyaan lebih lanjut, silakan hubungi pihak Kelurahan.</p>

    <p>Hormat kami,<br><strong>Kelurahan Kademangan</strong></p>
</body>
</html>
