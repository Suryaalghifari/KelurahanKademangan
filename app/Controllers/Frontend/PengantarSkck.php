<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\SkckModel;

class PengantarSkck extends BaseController
{
    protected $skckModel;

    public function __construct()
    {
        $this->skckModel = new SkckModel();
    }

    public function index()
    {
        return view('frontend/skck/skck');
    }
    

    public function submit()
    {
        if (!$this->validate([
            'nama'      => 'required',
            'nik'       => 'required|numeric',
            'email'     => 'required|valid_email', // ✅ Tambahan
            'alamat'    => 'required',
            'keperluan' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Data tidak lengkap atau salah.');
        }
        
        $formulir = $this->request->getFile('formulir_skck');
        if ($formulir->isValid() && !$formulir->hasMoved()) {
            $newName = $formulir->getRandomName();
            $formulir->move(WRITEPATH . 'uploads/skck', $newName);
        } else {
            return redirect()->back()->withInput()->with('error', 'Upload formulir gagal. Pastikan file PDF valid.');
        }

        $this->skckModel->save([
            'nama'      => $this->request->getPost('nama'),
            'nik'       => $this->request->getPost('nik'),
            'email'     => $this->request->getPost('email'), // ✅ Tambahan
            'alamat'    => $this->request->getPost('alamat'),
            'keperluan' => $this->request->getPost('keperluan'),
            'formulir'  => $newName,
        ]);
        

        return redirect()->to('/skck')->with('message', 'Pengajuan surat SKCK berhasil dikirim!'); // ✅ Tambahan ini                

    }

}
