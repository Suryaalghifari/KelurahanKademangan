<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Status Pengajuan SKCK</title>
</head>
<body>
    <p>Yth. <?= esc($nama ?? 'Pemohon') ?>,</p>

    <p>Terima kasih telah mengajukan permohonan Surat Keterangan Catatan Kepolisian (SKCK) melalui Kelurahan Kademangan.</p>

    <p>Status pengajuan Anda saat ini: <strong><?= esc(ucfirst($status ?? '-')) ?></strong></p>

    <p><?= esc($statusMessage ?? '-') ?></p>

    <?php if (!empty($pesanTambahan)): ?>
        <p><strong>Catatan Tambahan:</strong></p>
        <p><?= nl2br(esc($pesanTambahan)) ?></p>
    <?php endif; ?>

    <br>
    <p>Jika ada pertanyaan lebih lanjut, silakan hubungi atau datang langsung ke kantor kelurahan.</p>

    <p>Hormat kami,<br><strong>Kelurahan Kademangan</strong></p>
</body>
</html>
