<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\PengaduanModel; // ✅ Tambahkan ini!

class Pengaduan extends BaseController
{
    public function index()
    {
        return view('frontend/pengaduan/pengaduan');
    }

    public function kirim()
    {
        $pengaduanModel = new PengaduanModel(); // ✅ Sudah bisa dipanggil sekarang

        $data = [
            'nama'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'telepon'   => $this->request->getPost('phone'),
            'alamat'    => $this->request->getPost('address'),
            'anonim'    => $this->request->getPost('anonymous') ? 1 : 0,
            'kategori'  => $this->request->getPost('category'),
            'prioritas' => $this->request->getPost('priority'),
            'judul'     => $this->request->getPost('title'),
            'deskripsi' => $this->request->getPost('description'),
            'lokasi'    => $this->request->getPost('location'),
            'status'    => 'menunggu',
        ];

        $file = $this->request->getFile('lampiran');
        if ($file && $file->getName() !== '' && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/pengaduan', $fileName);
            $data['lampiran'] = $fileName;
        }

        if (!$pengaduanModel->insert($data)) {
            dd($pengaduanModel->errors());
        }

        return redirect()->to('/pengaduan')->with('message', 'Pengaduan berhasil dikirim!');
    }
}
