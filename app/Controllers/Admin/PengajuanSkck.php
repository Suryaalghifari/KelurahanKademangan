<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SkckModel;

class PengajuanSkck extends BaseController
{
    protected $skckModel;

    public function __construct()
    {
        $this->skckModel = new SkckModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengajuan SKCK',
            'skckList' => $this->skckModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/pengajuanskck/index', $data);
    }

    public function detail($id)
    {
        $skck = $this->skckModel->find($id);

        if (!$skck) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data SKCK tidak ditemukan.');
        }

        return view('admin/pengajuanskck/detail', [
            'title' => 'Detail Pengajuan SKCK',
            'skck'  => $skck
        ]);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $allowed = ['menunggu', 'diproses', 'selesai'];
    
        if (!in_array($status, $allowed)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }
    
        $this->skckModel->update($id, ['status' => $status]);
    
        return redirect()->to('admin/skck/detail/' . $id)
                         ->with('message', 'Status berhasil diperbarui. Silakan kirim email balasan.');
    }
    

    public function download($filename)
    {
        $path = WRITEPATH . 'uploads/skck/' . $filename;

        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
        }

        $mime = mime_content_type($path);

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="' . basename($path) . '"')
            ->setBody(file_get_contents($path));
    }

    public function delete($id)
    {
        $data = $this->skckModel->find($id);

        if ($data) {
            if (!empty($data['formulir'])) {
                $filePath = FCPATH . 'uploads/skck/' . $data['formulir'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $this->skckModel->delete($id);

            return redirect()->to('/admin/skck')->with('message', 'Pengajuan berhasil dihapus.');
        }

        return redirect()->to('/admin/skck')->with('error', 'Data tidak ditemukan.');
    }
    public function kirimEmail($id)
    {
        $skck = $this->skckModel->find($id);
    
        if (!$skck) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        $pesanTambahan = $this->request->getPost('pesan');
        $statusMessage = $this->getStatusMessage($skck['status']);
    
        // === Generate PDF
        $html = view('emails/skck_pdf', [
            'nama' => $skck['nama'],
            'status' => $skck['status'],
            'statusMessage' => $statusMessage,
            'pesan' => $pesanTambahan
        ]);
    
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        $pdfPath = WRITEPATH . 'surat_terbit/surat_skck_' . $id . '.pdf';
        file_put_contents($pdfPath, $dompdf->output());
    
        // === Kirim Email
        $email = \Config\Services::email();
        $email->setTo($skck['email']);
        $email->setFrom('kademangantemp@gmail.com', 'Kelurahan Kademangan');
        $email->setSubject('Status Pengajuan SKCK Anda: ' . ucfirst($skck['status']));
        $email->setMessage(view('emails/skck_status', [
            'nama' => $skck['nama'],
            'status' => $skck['status'],
            'statusMessage' => $statusMessage,
            'pesanTambahan' => $pesanTambahan
        ]));
        $email->setMailType('html');
        $email->attach($pdfPath);
    
        if ($email->send()) {
            return redirect()->back()->with('message', 'Email dan surat PDF berhasil dikirim.');
        } else {
            $debug = $email->printDebugger(['headers']);
            return redirect()->back()->with('error', 'Gagal mengirim email. <pre>' . $debug . '</pre>');
        }
    }
    

    // =====================
    // Tambahan: Email Status Otomatis
    // =====================

    private function kirimStatusEmail($skck)
    {
        $statusMessage = $this->getStatusMessage($skck['status']);

        $emailContent = view('emails/skck_status', [
            'nama' => $skck['nama'],
            'status' => $skck['status'],
            'statusMessage' => $statusMessage,
            'pesanTambahan' => null
        ]);

        $email = \Config\Services::email();
        $email->setTo($skck['email']);
        $email->setFrom('kademangantemp@gmail.com', 'Kelurahan Kademangan');
        $email->setSubject('Status Pengajuan SKCK: ' . ucfirst($skck['status']));
        $email->setMessage($emailContent);
        $email->setMailType('html');
        $email->send();
    }

    private function getStatusMessage($status)
    {
        switch ($status) {
            case 'menunggu':
                return 'Pengajuan Anda telah kami terima dan akan segera diproses.';
            case 'diproses':
                return 'Pengajuan Anda sedang dalam proses oleh pihak kelurahan.';
            case 'selesai':
                return 'Pengajuan Anda telah selesai. Silakan datang ke kelurahan untuk mengambil surat.';
            default:
                return 'Status pengajuan Anda tidak dikenali.';
        }
    }
}
