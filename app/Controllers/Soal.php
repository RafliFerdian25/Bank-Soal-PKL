<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\SekolahModel;
use App\Models\SoalModel;
use App\Models\CetakModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use function PHPUnit\Framework\throwException;


class Soal extends BaseController
{
    protected $materiModel;
    protected $guruModel;
    protected $mapelModel;
    protected $sekolahModel;
    protected $soalModel;
    protected $CetakModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->guruModel = new GuruModel();
        $this->mapelModel = new MapelModel();
        $this->sekolahModel = new SekolahModel();
        $this->soalModel = new SoalModel();
        $this->CetakModel = new CetakModel();
        $this->db = \Config\Database::connect();
        // $UsersModel = new \Myth\Auth\Models\UserModel();
    }
    public function daftar_soal($id_mapel, $semester = 1)
    {
        //mengambil seluruh data materi pada mapel tertentu
        $materi_mapel = $this->materiModel->find_materi($id_mapel, $semester);
        $soal_cetak = $this->CetakModel->find_soal_cetak(user_id());
        $i = 0;
        foreach ($materi_mapel as $data_materi_mapel) {
            // jumlah soal per materi
            $jumlah_soal_materi = $this->soalModel->jumlah_soal_materi($data_materi_mapel['id_materi']);
            $materi_mapel[$i++]['jumlah_soal'] = $jumlah_soal_materi;
        }
        // dd($materi_mapel);
        //mengambil seluruh data soal pada mapel tertentu
        // dan group admin
        if (in_groups('admin') || in_groups('mgmp')) {
            foreach ($materi_mapel as $materi) {
                $query_soal = $this->soalModel->find_soal($materi['id_materi'],  $semester);
                $soal[] = $query_soal->getResultArray();
            }
        }
        // group guru
        else {
            foreach ($materi_mapel as $materi) {
                $query_soal = $this->soalModel->find_soal_guru($materi['id_materi'], user()->nuptk,  $semester);
                $soal[] = $query_soal->getResultArray();
            }
        }

        $mapel = $this->mapelModel->find($id_mapel);
        // dd($soal);
        if ($materi_mapel != null) {
            $data = [
                'title' => 'Bank Soal | Soal',
                'mapel' => $mapel,
                'soal'  => $soal,
                'soal_cetak'  => $soal_cetak,
                'materi'   => $materi_mapel,
                'semester' => $semester
            ];
            return view('daftar_soal', $data);
        } else {
            $data = [
                'title' => 'Bank Soal | Soal',
                'mapel' => $mapel,
                'soal'  => $soal = null,
                'soal_cetak'  => $soal_cetak,
                'materi'   => $materi_mapel,
                'semester' => $semester

            ];
            return view('daftar_soal', $data);
        }
    }
    public function detail_soal($id_soal)
    {
        $soal = $this->soalModel->find_detail_soal($id_soal);
        $mapel = $this->mapelModel->find($soal['id_mapel']);
        $data = [
            'title' => 'Bank Soal | Soal',
            'mapel' => $mapel,
            'soal'  =>  $soal
        ];
        return view('detail_soal', $data);
    }
    public function tambah_soal($id_mapel)
    {
        session();
        $validation = \Config\Services::validation();
        //mengambil seluruh data materi pada mapel tertentu
        $materi = $this->materiModel->find_materi($id_mapel);
        // mengambil mapel dengan user tertentu
        $mapel = $this->mapelModel->find_mapel(user_id());
        $data = [
            'title'         => 'Bank Soal | Soal',
            'materi'           => $materi,
            'validation'    => $validation,
            'id_mapel'      => $id_mapel,
            'mapel'         => $mapel
        ];
        return view('tambah/form_tambah_soal', $data);
    }
    public function simpan_tambah_soal($id_mapel)
    {
        if (!$this->validate([
            'soal'      => 'required',
            'materi'    => 'required',
            'opsi_a'    => 'required',
            'opsi_b'    => 'required',
            'opsi_c'    => 'required',
            'opsi_d'    => 'required',
            'jawaban'     => 'required',
            'soal_img' => [
                'rules' => 'max_size[soal_img,2048]|is_image[soal_img]|mime_in[soal_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar yang diupload lebih besar dari 2MB',
                    'is_image' => 'File yang diupload bukan gambar',
                    'mime_in' => 'File yang diupload bukan gambar',
                ]
            ],
            'alasan_jawaban_img' => [
                'rules' => 'max_size[alasan_jawaban_img,2048]|is_image[alasan_jawaban_img]|mime_in[alasan_jawaban_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar yang diupload lebih besar dari 2MB',
                    'is_image' => 'File yang diupload bukan gambar',
                    'mime_in' => 'File yang diupload bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('soal/tambah_soal/' . $id_mapel)->withInput();
        }
        //ambil gambar soal inputan
        $soal_img = $this->request->getFile('soal_img');
        // pindahkan file gambar soal ke folder image
        // apakah tidak ada gambar soal yang di upload
        if ($soal_img->getError() != 4) {
            // pindahkan file ke folder image
            $nama_soal_img = $soal_img->getRandomName();
            $soal_img->move('assets/images/soal', $nama_soal_img);
        } else {
            $nama_soal_img = null;
        }
        //ambil scan alasan jawaban inputan
        $alasan_jawaban_img = $this->request->getFile('alasan_jawaban_img');
        // pindahkan file scan alasan jawaban ke folder image
        // apakah tidak ada scan alasan jawaban yang di upload
        if ($alasan_jawaban_img->getError() != 4) {
            // pindahkan file ke folder image
            $nama_alasan_jawaban_img = $alasan_jawaban_img->getRandomName();
            $alasan_jawaban_img->move('assets/images/soal', $nama_alasan_jawaban_img);
        } else {
            $nama_alasan_jawaban_img = null;
        }
        // apakah user yang menjalankan fungsi ini seorang guru?
        if (in_groups('guru')) {
            $nuptk = user()->nuptk;
        } else {
            $nuptk = null;
        }
        $this->soalModel->insert([
            'soal'      => $this->request->getVar('soal'),
            'id_materi'    => $this->request->getVar('materi'),
            'opsi_a'    => $this->request->getVar('opsi_a'),
            'opsi_b'    => $this->request->getVar('opsi_b'),
            'opsi_c'    => $this->request->getVar('opsi_c'),
            'opsi_d'    => $this->request->getVar('opsi_d'),
            'jawaban'   => $this->request->getVar('jawaban'),
            'soal_img'  => $nama_soal_img,
            'alasan_jawaban_img'  => $nama_alasan_jawaban_img,
            'alasan_jawaban' => $this->request->getVar('alasan_jawaban'),
            'nuptk'       => $nuptk,
            'id_status_soal'       => 1
        ]);

        session()->setFlashdata('pesan-tambah-soal', 'Data Soal berhasil ditambahkan.');
        return redirect()->to('soal/daftar_soal/' . $id_mapel);
    }
    public function tambah_soal_excel($id_mapel)
    {
        session();
        $validation = \Config\Services::validation();
        //mengambil seluruh data materi pada mapel tertentu
        $materi = $this->materiModel->find_materi($id_mapel);
        // dd($materi);
        // mengambil mapel dengan user tertentu
        $mapel = $this->mapelModel->find_mapel(user_id());
        $data = [
            'title'         => 'Bank Soal | Soal',
            'materi'           => $materi,
            'validation'    => $validation,
            'id_mapel'      => $id_mapel,
            'mapel'         => $mapel
        ];
        return view('tambah/form_tambah_soal_excel', $data);
    }
    public function simpan_tambah_soal_excel($id_mapel)
    {
        if (in_groups('guru')) {
            $nuptk = user()->nuptk;
        } else {
            $nuptk = null;
        }
        //mengambil seluruh data materi pada mapel tertentu
        $materi = $this->materiModel->find_materi($id_mapel);
        // mengambil data soal
        $soal = $this->soalModel->findAll();
        // Ambil file excel
        $soal_excel = $this->request->getFile('soal_excel');
        $ext = $soal_excel->getClientExtension();

        if ($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $load_excel = $reader->load($soal_excel);

        $sheet = $load_excel->getActiveSheet()->toArray();
        // dd($sheet);
        foreach ($sheet as $i => $excel) {
            if ($i == 0 or $excel['0'] == null or $excel['1'] == null or $excel['2'] == null or $excel['3'] == null or $excel['4'] == null or $excel['5'] == null or $excel['6'] == null or $excel['7'] == null) {
                continue;
            } else if ($excel['0'] == null && $excel['1'] == null && $excel['2'] == null && $excel['3'] == null && $excel['4'] == null && $excel['5'] == null && $excel['6'] == null && $excel['7'] == null) {
                break;
            }
            $like_soal = $this->soalModel->find_like_soal($excel['0']);
            if ($like_soal != null) {
                continue;
            }
            $data = [
                'soal' => $excel['0'],
                'id_materi' => $materi[$excel['1'] - 1]['id_materi'],
                'opsi_a' => $excel['2'],
                'opsi_b' => $excel['3'],
                'opsi_c' => $excel['4'],
                'opsi_d' => $excel['5'],
                'jawaban' => $excel['6'],
                'alasan_jawaban' => $excel['7'],
                'nuptk'    => $nuptk,
                'id_status_soal' => 1
            ];
            // dd($data);
            $this->soalModel->insert($data);
        }
        // dd($nama_soal_img);

        session()->setFlashdata('pesan-tambah-soal', 'Data Soal berhasil ditambahkan.');
        return redirect()->to('soal/daftar_soal/' . $id_mapel);
    }
    public function download_template()
    {
        return $this->response->download('assets/file/template_soal.xlsx', null);
    }
    public function edit_soal($id_soal)
    {
        session();
        $validation = \Config\Services::validation();
        //mengambil data detail sebuah soal
        $soal = $this->soalModel->find_detail_soal($id_soal);
        //mengambil seluruh data materi pada mapel tertentu
        $materi = $this->materiModel->find_materi($soal['id_mapel']);

        $mapel = $this->mapelModel->find($soal['id_mapel']);
        // dd($materi);
        $data = [
            'title' => 'Bank Soal | Soal',
            'mapel' => $mapel,
            'materi'   => $materi,
            'soal'  => $soal,
            'validation'    => $validation
        ];
        return view('edit/form_edit_soal', $data);
    }
    public function simpan_edit_soal($id_soal)
    {
        //mengambil data detail sebuah soal
        $soal = $this->soalModel->find_detail_soal($id_soal);
        if (!$this->validate([
            'soal'      => 'required',
            'materi'    => 'required',
            'opsi_a'    => 'required',
            'opsi_b'    => 'required',
            'opsi_c'    => 'required',
            'opsi_d'    => 'required',
            'jawaban'     => 'required',
            'soal_img' => [
                'rules' => 'max_size[soal_img,2048]|is_image[soal_img]|mime_in[soal_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar yang diupload lebih besar dari 2MB',
                    'is_image' => 'File yang diupload bukan gambar',
                    'mime_in' => 'File yang diupload bukan gambar',
                ]
            ],
            'alasan_jawaban_img' => [
                'rules' => 'max_size[alasan_jawaban_img,2048]|is_image[alasan_jawaban_img]|mime_in[alasan_jawaban_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar yang diupload lebih besar dari 2MB',
                    'is_image' => 'File yang diupload bukan gambar',
                    'mime_in' => 'File yang diupload bukan gambar',
                ]
            ],
        ])) {
            return redirect()->to('soal/edit_soal/' . $id_soal)->withInput();
        }
        // gambar soal
        //ambil gambar soal inputan
        $soal_img = $this->request->getFile('soal_img');
        //mengambil nama gambar soal sebelumnya
        $gambar_Lama = $this->request->getVar('gambar_lama');
        // apakah tidak ada gambar soal yang di upload
        if ($soal_img->getError() == 4) {
            if ($gambar_Lama != null) {
                $nama_soal_img = $gambar_Lama;
            } else {
                $nama_soal_img = '';
            }
        } else {
            //mengambil nama dari gambar soal yang diinput
            $nama_soal_img = $soal_img->getRandomName();
            // pindahkan file ke folder image
            $soal_img->move('assets/images/soal', $nama_soal_img);
            if ($gambar_Lama != null) {
                //hapus gambar soal lama
                unlink('assets/images/soal/' . $gambar_Lama);
            }
        }
        // scan alasan jawaban
        //ambil scan alasan jawaban inputan
        $alasan_jawaban_img = $this->request->getFile('alasan_jawaban_img');
        //mengambil nama scan alasan jawaban sebelumnya
        $alasan_jawaban_img_Lama = $this->request->getVar('alasan_jawaban_img_lama');
        // apakah tidak ada scan alasan jawaban yang di upload
        if ($alasan_jawaban_img->getError() == 4) {
            if ($alasan_jawaban_img_Lama != null) {
                $nama_alasan_jawaban_img = $alasan_jawaban_img_Lama;
            } else {
                $nama_alasan_jawaban_img = '';
            }
        } else {
            //mengambil nama dari scan alasan jawaban yang diinput
            $nama_alasan_jawaban_img = $alasan_jawaban_img->getRandomName();
            // pindahkan file ke folder image
            $alasan_jawaban_img->move('assets/images/soal', $nama_alasan_jawaban_img);
            if ($alasan_jawaban_img_Lama != null) {
                //hapus scan alasan jawaban lama
                unlink('assets/images/soal/' . $alasan_jawaban_img_Lama);
            }
        }
        $data = [
            'soal' => $this->request->getVar('soal'),
            'id_materi' => $this->request->getVar('materi'),
            'opsi_a' => $this->request->getVar('opsi_a'),
            'opsi_b' => $this->request->getVar('opsi_b'),
            'opsi_c' => $this->request->getVar('opsi_c'),
            'opsi_d' => $this->request->getVar('opsi_d'),
            'jawaban' => $this->request->getVar('jawaban'),
            'soal_img' => $nama_soal_img,
            'alasan_jawaban_img' => $nama_alasan_jawaban_img,
            'alasan_jawaban' => $this->request->getVar('alasan_jawaban'),
        ];
        // dd($nama_soal_img);
        $this->soalModel->update($id_soal, $data);

        session()->setFlashdata('pesan-edit-soal', 'Data Soal berhasil diubah.');
        return redirect()->to('soal/detail_soal/' . $id_soal);
    }
    public function hapus_soal($id_soal)
    {
        //mengambil data detail sebuah soal
        $soal = $this->soalModel->find_detail_soal($id_soal);
        //hapus soal image lama
        if ($soal['soal_img'] != null) {
            unlink('assets/images/soal/' . $soal['soal_img']);
        }
        //hapus scan alasan jawaban lama
        if ($soal['alasan_jawaban_img'] != null) {
            unlink('assets/images/soal/' . $soal['alasan_jawaban_img']);
        }
        $this->soalModel->delete($id_soal);


        session()->setFlashdata('pesan-hapus-soal', 'Data Soal berhasil dihapus.');

        return redirect()->to('soal/daftar_soal/' . $soal['id_mapel']);
    }
    public function simpan_cetak_soal($id_mapel, $semester)
    {
        //mengambil seluruh data materi pada mapel tertentu
        $materi = $this->materiModel->find_materi($id_mapel, $semester);
        $cetak_soal = $this->CetakModel->find_soal_cetak(user_id());
        if ($cetak_soal != null) {
            foreach ($cetak_soal as $cetak_soal_hapus) {
                $this->CetakModel->delete($cetak_soal_hapus['id_soal_cetak']);
            }
        }
        // menghitung jumlah soal
        // $soal_acak = null;
        foreach ($materi as $materi) {
            $materi_acak_soal = $this->request->getVar('materi_' .  $materi['id_materi']);
            // dd($materi_acak_soal);
            if ($materi_acak_soal == 'materi_' . $materi['id_materi']) {
                $jumlah_soal = $this->request->getVar("jumlah_cetak_soal_" . $materi["id_materi"]);
                // dd($jumlah_soal);
                // if jumlah soal '0' maka tidak akan dicetak
                if ($jumlah_soal == '') {
                    $jumlah_soal = 0;
                }
                // mengambil soal acak dari materi tertentu
                $soal = $this->soalModel->acak_soal($materi['id_materi'], $jumlah_soal);
                foreach ($soal as $soal_materi) {
                    $soal_acak = [
                        'soal' => $soal_materi['soal'],
                        'opsi_a' => $soal_materi['opsi_a'],
                        'opsi_b' => $soal_materi['opsi_b'],
                        'opsi_c' => $soal_materi['opsi_c'],
                        'opsi_d' => $soal_materi['opsi_d'],
                        'jawaban' => $soal_materi['jawaban'],
                        'soal_img' => $soal_materi['soal_img'],
                        'alasan_jawaban' => $soal_materi['alasan_jawaban'],
                        'tgl_input' => $soal_materi['tgl_input'],
                        'id_materi' => $soal_materi['id_materi'],
                        'id' => user_id(),
                        'alasan_jawaban_img' => $soal_materi['alasan_jawaban_img'],
                        'id_status_soal' => $soal_materi['id_status_soal'],
                    ];
                    $this->CetakModel->insert($soal_acak);
                }
            }
        }
        // dd($materi_acak_soal);
        // $data = [
        //     'title' => 'Bank Soal | Cetak Soal',
        //     'soal' => $soal_acak
        // ];
        return redirect()->to('soal/daftar_soal/' . $id_mapel . '/'. $semester);
        // return view('a dmin/cetak_soal', $data);
    }
    public function cetak_soal()
    {
        $cetak_soal = $this->CetakModel->find_soal_cetak(user_id());
        $data = [
            'title' => 'Bank Soal | Cetak Soal',
            'soal'    => $cetak_soal
        ];
        return view('admin/cetak_soal', $data);
        // return redirect()->to('soal/daftar_soal/' . $soal['id_mapel']);
    }
    public function cetak_kunci_jawaban()
    {
        $cetak_soal = $this->CetakModel->find_soal_cetak(user_id());
        $data = [
            'title' => 'Bank Soal | Cetak Soal',
            'soal'    => $cetak_soal
        ];
        return view('admin/cetak_kunci_jawaban', $data);
        // return redirect()->to('soal/daftar_soal/' . $soal['id_mapel']);
    }
    public function edit_status_soal($id_soal)
    {
        $data = [
            'id_status_soal'    => $this->request->getVar('status_soal')
        ];
        $this->soalModel->update($id_soal, $data);

        session()->setFlashdata('pesan-edit-soal', 'Status Soal berhasil diubah.');

        return redirect()->to('soal/detail_soal/' . $id_soal);
    }
}