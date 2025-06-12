<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SuratMenikahModel;

class SuratMenikah extends BaseController
{
    public function index()
    {
        $model = new SuratMenikahModel();
        $data = [
            'title' => 'Data Pengajuan Surat Menikah',
            'menikah' => $model->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/pengajuannikah/index', $data);
    }
    public function detail($id)
    {
        $model = new \App\Models\SuratMenikahModel();
        $data = $model->find($id);

        if (!$data) {
            return redirect()->to('/admin/suratmenikah')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/pengajuannikah/detail', [
            'title' => 'Detail Pengajuan Surat Menikah',
            'menikah' => $data
        ]);
    }
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        $allowed = ['menunggu', 'diproses', 'selesai'];

        if (!in_array($status, $allowed)) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $model = new \App\Models\SuratMenikahModel();
        $model->update($id, ['status' => $status]);

        return redirect()->to('/admin/suratmenikah/detail/' . $id)
                        ->with('message', 'Status berhasil diperbarui. Silakan lanjutkan dengan mengirim email balasan.');
    }


    public function download($filename)
    {
        $path = WRITEPATH . 'uploads/surat_menikah/' . $filename;

        if (!file_exists($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Lampiran tidak ditemukan.');
        }

        $mime = mime_content_type($path);

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="' . basename($path) . '"')
            ->setBody(file_get_contents($path));
    }
    public function delete($id)
    {
        $model = new \App\Models\SuratMenikahModel();
        $data = $model->find($id);

        if ($data) {
            // Hapus file lampiran jika ada
            if (!empty($data['lampiran'])) {
                $filePath = WRITEPATH . 'uploads/surat_menikah/' . $data['lampiran'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Hapus dari database
            $model->delete($id);

            return redirect()->to('/admin/suratmenikah')->with('message', 'Pengajuan berhasil dihapus.');
        }

        return redirect()->to('/admin/suratmenikah')->with('error', 'Data tidak ditemukan.');
    }
    public function kirimEmail($id)
    {
        $model = new \App\Models\SuratMenikahModel();
        $data = $model->find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pesanTambahan = $this->request->getPost('pesan');
        $statusMessage = $this->getStatusMessage($data['status']);

        // === Generate PDF
        $html = view('emails/surat_menikah_pdf', [
            'nama_suami' => $data['nama_suami'],
            'nama_istri' => $data['nama_istri'],
            'status' => $data['status'],
            'statusMessage' => $statusMessage,
            'pesan' => $pesanTambahan
        ]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfPath = WRITEPATH . 'surat_terbit/surat_menikah_' . $id . '.pdf';
        file_put_contents($pdfPath, $dompdf->output());

        // === Kirim Email
        $email = \Config\Services::email();
        $email->setTo($data['email']);
        $email->setFrom('kademangantemp@gmail.com', 'Kelurahan Kademangan');
        $email->setSubject('Status Pengajuan Surat Menikah Anda: ' . ucfirst($data['status']));
        $email->setMessage(view('emails/surat_menikah_status', [
            'nama_suami' => $data['nama_suami'],
            'nama_istri' => $data['nama_istri'],
            'status' => $data['status'],
            'statusMessage' => $statusMessage,
            'pesanTambahan' => $pesanTambahan
        ]));
        $email->setMailType('html');
        $email->attach($pdfPath);

        if ($email->send()) {
            return redirect()->back()->with('message', 'Email dan surat PDF berhasil dikirim.');
        } else {
            $debug = $email->printDebugger(['headers']);
            return redirect()->back()->with('error', 'Gagal mengirim email.<br><pre>' . $debug . '</pre>');
        }
    }


        private function getStatusMessage($status)
        {
            switch ($status) {
                case 'menunggu':
                    return 'Pengajuan Anda telah kami terima dan akan segera diproses.';
                case 'diproses':
                    return 'Pengajuan Surat Menikah Anda sedang diproses oleh kelurahan.';
                case 'selesai':
                    return 'Pengajuan Anda telah selesai. Surat dapat diambil di kantor kelurahan.';
                default:
                    return 'Status pengajuan tidak dikenali.';
            }
        }



}
