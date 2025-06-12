<?php
namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\SuratMenikahModel;

class SuratMenikah extends BaseController
{
    public function form()
    {
        return view('frontend/pengajuan/pengajuan_surat_menikah');
    }

    public function submit()
    {
        $model = new SuratMenikahModel();
    
        $data = [
            'nama_suami'     => $this->request->getPost('nama_suami'),
            'email'          => $this->request->getPost('email'), // ✅ Tambahkan ini
            'nik_suami'      => $this->request->getPost('nik_suami'),
            'alamat_suami'   => $this->request->getPost('alamat_suami'),
            'nama_istri'     => $this->request->getPost('nama_istri'),
            'nik_istri'      => $this->request->getPost('nik_istri'),
            'alamat_istri'   => $this->request->getPost('alamat_istri'),
        ];
    
        // Validasi file upload
        $file = $this->request->getFile('lampiran');
        if ($file && $file->getName() !== '' && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $uploadPath = WRITEPATH . 'uploads/surat_menikah';
    
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true); // Buat folder jika belum ada
            }
    
            if (!$file->move($uploadPath, $fileName)) {
                return redirect()->back()->withInput()->with('error', 'Gagal mengunggah file lampiran.');
            }
    
            $data['lampiran'] = $fileName;
        } else {
            return redirect()->back()->withInput()->with('error', 'Lampiran tidak valid atau belum dipilih.');
        }
    
        // Simpan ke database
        if ($model->insert($data)) {
            return redirect()->to('/suratmenikah')->with('message', 'Pengajuan surat menikah berhasil dikirim.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
