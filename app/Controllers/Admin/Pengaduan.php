<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    public function index()
    {
        $model = new PengaduanModel();
        $data['pengaduan'] = $model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/pengaduan/index', $data);
    }

    public function detail($id)
    {
        $model = new PengaduanModel();
        $pengaduan = $model->find($id);

        if (!$pengaduan) {
            return redirect()->to('/admin/pengaduan')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/pengaduan/detail', ['pengaduan' => $pengaduan]);
    }
    public function updateStatus($id)
    {
        $model = new PengaduanModel();
        $pengaduan = $model->find($id);

        if (!$pengaduan) {
            return redirect()->to('/admin/pengaduan')->with('error', 'Data tidak ditemukan.');
        }

        $status = $this->request->getPost('status');
        $allowedStatus = ['menunggu', 'diproses', 'selesai'];

        if (!in_array($status, $allowedStatus)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $model->update($id, ['status' => $status]);

        return redirect()->back()->with('message', 'Status berhasil diperbarui.');
    }

}
