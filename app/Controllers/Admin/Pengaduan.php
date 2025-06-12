<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    public function index()
    {
        $model = new PengaduanModel();

        $data = [
            'title' => 'Data Pengaduan Masyarakat',
            'pengaduan' => $model->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/pengaduan/index', $data);
    }


    public function detail($id)
    {
        $model = new PengaduanModel();
        $pengaduan = $model->find($id);

        if (!$pengaduan) {
            return redirect()->to('/admin/pengaduan')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Detail Pengaduan Masyarakat',
            'pengaduan' => $pengaduan
        ];

        return view('admin/pengaduan/detail', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $allowed = ['menunggu', 'diproses', 'selesai'];
    
        if (!in_array($status, $allowed)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }
    
        $model = new \App\Models\PengaduanModel();
        $model->update($id, ['status' => $status]);
    
        return redirect()->to('admin/pengaduan/detail/' . $id)
                         ->with('message', 'Status berhasil diperbarui. Silakan kirim email balasan.');
    }
    
    public function download($filename)
    {
        $path = WRITEPATH . 'uploads/pengaduan/' . $filename;
    
        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
        }
    
        // Deteksi tipe file
        $mime = mime_content_type($path);
    
        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="' . basename($path) . '"')
            ->setBody(file_get_contents($path));
    }
    public function kirimEmail($id)
    {
        $model = new PengaduanModel();
        $data = $model->find($id);
        if (!$data) return redirect()->back()->with('error', 'Data tidak ditemukan.');
    
        $pesanTambahan = $this->request->getPost('pesan');
        $statusMessage = $this->getStatusMessage($data['status']);
    
        // === 1. Generate PDF
        $html = view('emails/surat_pengaduan_pdf', [
            'pengaduan' => $data,
            'pesan' => $pesanTambahan,
            'status' => $data['status']
        ]);
    
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $pdfPath = WRITEPATH . 'surat_terbit/surat_pengaduan_approved_' . $id . '.pdf';
        file_put_contents($pdfPath, $dompdf->output());
    
        // === 2. Kirim Email
        $email = \Config\Services::email();
        $email->setTo($data['email']);
        $email->setFrom('kademangantemp@gmail.com', 'Kelurahan Kademangan');
        $email->setSubject('Status Pengaduan Anda: ' . ucfirst($data['status']));
        $email->setMessage(view('emails/pengaduan_status', [
            'pengaduan' => $data,
            'statusMessage' => $statusMessage,
            'pesanTambahan' => $pesanTambahan
        ]));
        $email->setMailType('html');
        $email->attach($pdfPath); // ✅ Lampirkan surat
    
        if ($email->send()) {
            return redirect()->back()->with('message', 'Email dan surat berhasil dikirim.');
        } else {
            return redirect()->back()->with('error', 'Gagal mengirim email.');
        }
    }
    

    private function getStatusMessage($status)
    {
        switch ($status) {
            case 'menunggu':
                return 'Pengaduan Anda telah kami terima dan akan segera ditinjau.';
            case 'diproses':
                return 'Pengaduan Anda sedang kami proses.';
            case 'selesai':
                return 'Pengaduan Anda telah selesai ditangani. Terima kasih atas partisipasi Anda.';
            default:
                return 'Status pengaduan tidak dikenali.';
        }
    }

    public function delete($id)
    {
        $model = new \App\Models\PengaduanModel();
        $data = $model->find($id);

        if ($data) {
            // Hapus file lampiran jika ada
            if (!empty($data['lampiran'])) {
                $filePath = FCPATH . 'uploads/pengaduan/' . $data['lampiran'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Hapus data dari database
            $model->delete($id);
            return redirect()->to('/admin/pengaduan')->with('message', 'Pengaduan berhasil dihapus.');
        }

        return redirect()->to('/admin/pengaduan')->with('error', 'Data tidak ditemukan.');
    }
        
}
