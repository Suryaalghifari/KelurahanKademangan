<?php

namespace App\Models;
use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama', 'email', 'telepon', 'alamat', 'anonim',
        'kategori', 'prioritas', 'judul', 'deskripsi', 'lokasi',
        'lampiran', 'status', 'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}
