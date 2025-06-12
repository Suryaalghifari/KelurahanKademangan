<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Pengajuan Surat Menikah</title>
</head>
<body>
    <p>Yth. Bapak/Ibu <?= esc($nama_suami) ?> dan <?= esc($nama_istri) ?>,</p>

    <p>Terima kasih telah mengajukan permohonan Surat Keterangan Menikah di Kelurahan Kademangan.</p>

    <p>Status pengajuan Anda saat ini adalah: <strong><?= esc(ucfirst($status)) ?></strong></p>

    <p><?= esc($statusMessage ?? 'Status belum tersedia.') ?></p>

    <?php if (!empty($pesanTambahan)): ?>
        <p><strong>Catatan Tambahan:</strong></p>
        <p><?= nl2br(esc($pesanTambahan)) ?></p>
    <?php endif; ?>

    <br>
    <p>Jika ada pertanyaan lebih lanjut, silakan hubungi kantor kelurahan atau datang langsung ke loket pelayanan.</p>

    <p>Hormat kami,<br><strong>Kelurahan Kademangan</strong></p>
</body>
</html>
