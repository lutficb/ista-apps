<?php

namespace App\Controllers;

use App\Models\Skl;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    protected $sklModel;

    public function __construct()
    {
        $this->sklModel = new Skl();
    }

    public function index()
    {
        // Data kelas
        $kelas = ['VII A1', 'VII A2', 'VII A3', 'VIII A1', 'VIII A2', 'VIII A3', 'IX A1', 'IX A2', 'IX A3', 'IDAD A', 'X A1', 'X A2', 'X A3', 'XI A1', 'XI A2', 'XI A3', 'XII A1', 'XII A2', 'XII A3', 'VII B1', 'VII B2', 'VII B3', 'VIII B1', 'VIII B2', 'VIII B3', 'IX B1', 'IX B2', 'IX B3', 'IDAD B', 'X B1', 'X B2', 'X B3', 'XI B1', 'XI B2', 'XI B3', 'XII B1', 'XII B2', 'XII B3', '1A', '1B', '2A', '2B', '3A', '3B', '4A', '4B', '5A', '5B', '6A', '6B'];

        // Data tahun ajaran
        $tahunAjaran = ['2019/2020', '2020/2021', '2021/2022', '2022/2023', '2023/2024', '2024/2025', '2025/2026', '2026/2027', '2027/2028', '2028/2029', '2029/2030'];

        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Bendahara',
            'subtitle' => 'Surat Keterangan Lunas',
            'kelas' => $kelas,
            'tahunAjaran' => $tahunAjaran,
            'skl' => $this->sklModel->orderBy('created_at', 'DESC')->findAll(),
        ];

        // Jika bukan POST request, maka tampilkan view
        if (!$this->request->is('post')) {
            return view('bendahara/skl', $data);
        }

        // Data yang akan disimpan
        $dataSkl = [
            'name' => $this->request->getPost('nama'),
            'name_orang_tua' => $this->request->getPost('namaortu'),
            'kelas' => $this->request->getPost('kelas'),
            'tahun_ajaran' => $this->request->getPost('tahunajaran'),
        ];

        // Validasi data
        if (!$this->validateData($dataSkl, 'skl_rules')) {
            // Jika validasi gagal, kembalikan input SKL beserta error
            return redirect()->back()->withInput();
        }

        // Cek apakah data berhasil disimpan
        if (!$this->sklModel->save($dataSkl)) {
            // Jika data gagal disimpan, tampilkan error
            session()->setFlashdata('error', 'Data SKL gagal disimpan.');
            return redirect()->back()->withInput();
        }

        // Save dataSkl to session
        session()->setFlashdata('success', 'Data SKL berhasil disimpan.');

        // Kemablikan ke halaman SKL
        return redirect()->to('skl');
    }

    public function cetakSkl($id)
    {
        // Get data from database based on id sent from user
        $skl = $this->sklModel->find($id);

        // Create month in Indonesia
        $bulanIndo = [
            1 => 'Janauri',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // Create date object
        $tempTanggal = Time::parse(Time::now('Asia/Jakarta')->toLocalizedString('d MMMM yyyy'));

        // Creta date in Indonesia format
        $tanggal = $tempTanggal->getDay() . ' ' . $bulanIndo[$tempTanggal->getMonth()] . ' ' . $tempTanggal->getYear();

        // If data not found, return 404
        if (!$skl) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Data that will be sent to view
        $data = [
            'title' => 'Cetak SKL',
            'skl' => $skl,
            'tanggal' => $tanggal,
        ];

        // Return view
        return view('bendahara/cetak-skl', $data);
    }

    public function update()
    {
        // Get data from ajax request
        $updatedData = [
            'name' => $this->request->getPost('nama'),
            'name_orang_tua' => $this->request->getPost('namaOrtu'),
            'kelas' => $this->request->getPost('kelas'),
            'tahun_ajaran' => $this->request->getPost('tahunAjaran'),
            'id' => $this->request->getPost('id'),
        ];

        // Check if data success saved to database
        if (!$this->sklModel->save($updatedData)) {
            // If data failed to save, return error
            $response = [
                'status' => 'fail',
                'data' => [
                    'message' => 'Data gagal diupdate.',
                ],
            ];
            echo json_encode($response);
            return;
        }

        // If data success saved, return success
        $response = [
            'status' => 'success',
            'data' => [
                'message' => 'Data berhasil diupdate.',
            ],
        ];
        echo json_encode($response);
    }
}
