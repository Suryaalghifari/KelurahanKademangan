<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use App\Models\SkckModel;
use App\Models\SuratMenikahModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pengaduanModel     = new PengaduanModel();
        $skckModel          = new SkckModel();
        $suratMenikahModel  = new SuratMenikahModel();

        $data = [
            'title' => 'Dashboard Admin',
            'jumlah_pengaduan' => $pengaduanModel->countAllResults(),
            'jumlah_skck' => $skckModel->countAllResults(),
            'jumlah_surat_menikah' => $suratMenikahModel->countAllResults(),
            'pengaduan_terbaru' => $pengaduanModel->orderBy('created_at', 'DESC')->findAll(5),
            'log_skck' => $skckModel->select('nama, status, updated_at')->orderBy('updated_at', 'DESC')->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }
}
