<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMenikahModel extends Model
{
    protected $table = 'surat_menikah';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_suami',
        'email', // ✅ Tambahkan ini
        'nik_suami',
        'alamat_suami',
        'nama_istri',
        'nik_istri',
        'alamat_istri',
        'lampiran',
        'status'
    ];
    
}
