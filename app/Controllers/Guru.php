<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\SekolahModel;
use App\Models\SoalModel;

use function PHPUnit\Framework\throwException;


class Guru extends BaseController
{
    protected $materiModel;
    protected $guruModel;
    protected $mapelModel;
    protected $sekolahModel;
    protected $soalModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->guruModel = new GuruModel();
        $this->mapelModel = new MapelModel();
        $this->sekolahModel = new SekolahModel();
        $this->soalModel = new SoalModel();
        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
    }
    public function guru()
    {
        //mengambil semua data guru
        $query = $this->guruModel->semua_guru();
        $guru = $query->getResultArray();
        $guru_tanpa_sekolah =  $this->guruModel->semua_guru_tanpa_sekolah();;
        // dd($guru);
        $data = [
            'title'         => 'Bank Soal | Guru',
            'guru'          => $guru,
            'guru_tanpa_sekolah'          => $guru_tanpa_sekolah
        ];
        return view('admin/guru', $data);
    }
    public function tambah_guru($npsn = null)
    {
        // mengambil semua data sekolah
        $sekolah = $this->sekolahModel->orderBy('nama_sekolah', 'ASC')->findAll();
        // mengambil semua data mata_pelajaran
        $mapel = $this->mapelModel->orderBy('nama_mapel', 'ASC')->findAll();
        session();
        $validation = \Config\Services::validation();
        $data = [
            'title' => 'Bank Soal | Guru',
            'validation'    => $validation,
            'sekolah'          => $sekolah,
            'npsn_sekolah'      => $npsn,
            'mapel'          => $mapel
        ];
        return view('admin/tambah/form_tambah_guru', $data);
    }
    public function simpan_tambah_guru()
    {
        if (!$this->validate([
            'nuptk'      => 'required|exact_length[16]|is_unique[guru.nuptk]|numeric',
            'nip'      => 'is_unique[guru.nip]|exact_length[18]',
            'nama'      => 'required',
            'npsn'    => [
                'rules' => 'required',
                'errors' => ['required' => 'Bagian Sekolah Induk wajib diisi']
            ],
            'id_mapel'    => [
                'rules' => 'required',
                'errors' => ['required' => 'Bagian Mata Pelajaran wajib diisi']
            ]
        ])) {
            return redirect()->to('guru/tambah_guru')->withInput();
        }
        // melakukan penambahan data guru ke dalam database
        $this->guruModel->insert([
            'nuptk' => $this->request->getVar('nuptk'),
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama'),
            'npsn' => $this->request->getVar('npsn'),
            'id_mapel' => $this->request->getVar('id_mapel')
        ]);

        session()->setFlashdata('pesan-tambah-guru', 'Data Guru berhasil ditambahkan.');
        return redirect()->to('/guru/guru');
    }
    public function download_template()
    {
        return $this->response->download('assets/file/template_guru.xlsx', null);
    }
    public function tambah_guru_excel()
    {
        session();
        $validation = \Config\Services::validation();
        // mengambil semua data mata_pelajaran
        $mapel = $this->mapelModel->orderBy('nama_mapel', 'ASC')->findAll();
        $data = [
            'title'         => 'Bank Soal | Guru',
            'validation'    => $validation,
            'mapel'         => $mapel
        ];
        return view('admin/tambah/form_tambah_guru_excel', $data);
    }
    public function simpan_tambah_guru_excel()
    {
        // Ambil file excel
        $guru_excel = $this->request->getFile('guru_excel');
        $ext = $guru_excel->getClientExtension();
        $mapel = $this->mapelModel->orderBy('nama_mapel', 'ASC')->findAll();
        $sekolah = $this->sekolahModel->select('npsn')->findAll();

        if ($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $load_excel = $reader->load($guru_excel);

        $sheet = $load_excel->getActiveSheet()->toArray();
        // dd($sheet[2][2]);
        // dd($sekolah);
        foreach ($sheet as $i => $excel) {
            if ($i == 0 or $excel['0'] == null or $excel['2'] == null or $excel['3'] == null or $excel['4'] == null) {
                continue;
            } else if ($excel['0'] == null && $excel['1'] == null && $excel['2'] == null && $excel['3'] == null && $excel['4'] == null) {
                break;
            }
            $like_guru = $this->guruModel->find_like_guru($excel['0']);
            if ($like_guru != null) {
                continue;
            }
            // jika nip kosong
            if ($excel[1] == '' || $excel[1] == 'NULL' || $excel[1] == 'null') {
                $excel[1] == NULL;
            }
            // mengecek npsn apakah tersedia di database
            $isAdaNPSN = true;
            foreach ($sekolah as $skl) {
                if ($excel['2'] == $skl['npsn']) {
                    $isAdaNPSN = true;
                    break;
                } elseif ($excel[2] == '' || $excel[2] == 'NULL' || $excel[2] == 'null') {
                    $isAdaNPSN = false;
                } else {
                    $isAdaNPSN = false;
                }
            }
            if (!$isAdaNPSN) {
                $excel[2] = null;
            }
            // dd($excel[2]);
            $id_mapel_excel = $mapel[$excel['4'] - 1]['id_mapel'];
            $data = [
                'nuptk' => $excel['0'],
                'nip' => $excel['1'],
                'npsn' => $excel['2'],
                'nama_guru' => $excel['3'],
                'id_mapel' => $id_mapel_excel,
            ];
            // dd($data);
            $this->guruModel->insert($data);
        }
        // dd($nama_guru_img);

        session()->setFlashdata('pesan-tambah-guru', 'Data guru berhasil ditambahkan.');
        return redirect()->to('guru/guru/');
    }
    public function edit_guru($nuptk)
    {
        // mengambil semua data sekolah
        $sekolah = $this->sekolahModel->orderBy('nama_sekolah', 'ASC')->findAll();
        // mengambil semua data mata_pelajaran
        $mapel = $this->mapelModel->orderBy('nama_mapel', 'ASC')->findAll();
        // mengambil data guru sesuai dengan nip
        $guru = $this->guruModel->find($nuptk);
        session();
        $validation = \Config\Services::validation();
        $data = [
            'title'         => 'Bank Soal | Guru',
            'guru'          => $guru,
            'validation'    => $validation,
            'sekolah'       => $sekolah,
            'mapel'         => $mapel
        ];
        return view('admin/edit/form_edit_guru', $data);
    }
    public function simpan_edit_guru($nuptk)
    {
        $id = $this->request->getVar('nuptk');
        if ($nuptk == $id) {
            if (!$this->validate([
                'nuptk'      => 'required|exact_length[16]|numeric',
                'nip'      => 'required|exact_length[18]|numeric',
                'nama'      => 'required',
                'npsn'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Bagian Sekolah Induk wajib diisi']
                ],
                'id_mapel'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Bagian Mata Pelajaran wajib diisi']
                ]
            ])) {
                return redirect()->to('/guru/edit_guru/' . $nuptk)->withInput();
            }
        } else {
            if (!$this->validate([
                'nuptk'      => 'required|exact_length[16]|is_unique[guru.nuptk]|numeric',
                'nip'      => 'required|exact_length[18]|is_unique[guru.nip]|numeric',
                'nama'      => 'required',
                'npsn'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Bagian Sekolah Induk wajib diisi']
                ],
                'id_mapel'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Bagian Mata Pelajaran wajib diisi']
                ]
            ])) {
                return redirect()->to('/guru/edit_guru/' . $nuptk)->withInput();
            }
        }
        $data = [
            'nuptk' => $id,
            'nip' => $this->request->getVar('nip'),
            'npsn' => $this->request->getVar('npsn'),
            'nama_guru' => $this->request->getVar('nama'),
            'id_mapel' => $this->request->getVar('id_mapel')
        ];
        $this->guruModel->update($nuptk, $data);
        // $this->sekolahModel->update($npsn, $data);


        session()->setFlashdata('pesan-edit-guru', 'Data Guru berhasil diubah.');
        return redirect()->to('/guru/guru');
    }
    public function hapus_guru($nuptk)
    {
        $this->guruModel->delete($nuptk);

        session()->setFlashdata('pesan-hapus-guru', 'Data Guru berhasil dihapus.');

        return redirect()->to('/guru/guru');
    }
}