<?php

namespace App\Models;

use CodeIgniter\Model;

class SkckModel extends Model
{
    protected $table = 'skck';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nik','email', 'alamat', 'keperluan', 'formulir', 'status']; // ✅ tambahkan 'status'
    protected $useTimestamps = true;
}
