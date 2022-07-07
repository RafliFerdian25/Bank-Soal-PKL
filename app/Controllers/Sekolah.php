<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\SekolahModel;
use App\Models\SoalModel;

use function PHPUnit\Framework\throwException;


class Sekolah extends BaseController
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
    public function sekolah()
    {
        //mengambil data sekolah
        // $sekolah = $this->sekolahModel->findAll();

        // Jumlah guru sesuai sekolah
        $sekolah = $this->sekolahModel->sekolah_guru()->getResultArray();

        $data = [
            'title'     => 'Bank Soal | Sekolah',
            'sekolah'   => $sekolah,
        ];
        return view('admin/sekolah', $data);
    }
    public function detail_sekolah($npsn)
    {
        $sekolah = $this->sekolahModel->sekolah_guru($npsn)->getFirstRow('array');
        $guru = $this->guruModel->guru_sekolah($npsn)->getResultArray();
        $data = [
            'title'     => 'Bank Soal | Detail Sekolah',
            'sekolah'   => $sekolah,
            'guru'      => $guru
        ];
        return view('admin/detail_sekolah', $data);
    }
    public function tambah_sekolah()
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'title' => 'Bank Soal | Sekolah',
            'validation'    => $validation
        ];
        return view('admin/tambah/form_tambah_sekolah', $data);
    }
    public function simpan_tambah_sekolah()
    {
        if (!$this->validate([
            'npsn'      => 'required|exact_length[8]|is_unique[sekolah.NPSN]|numeric',
            'nama'      => 'required|is_unique[sekolah.nama_sekolah]',
            'alamat'    => 'required',
            'logo'      => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->to('sekolah/tambah_sekolah')->withInput();
        }
        if ($this->request->getVar('email') != null) {
            if (!$this->validate([
                'email'     => 'valid_email',
            ])) {
                return redirect()->to('sekolah/tambah_sekolah')->withInput();
            }
        }
        //ambil gambar inputan
        $logo = $this->request->getFile('logo');
        // apakah tidak ada gambar yang di upload
        if ($logo->getError() == 4) {
            $namaLogo = 'logo-batang.png';
        } else {
            // pindahkan file ke folder image
            $namaLogo = $logo->getRandomName();
            $logo->move('assets/images/logo', $namaLogo);
        }
        $this->sekolahModel->insert([
            'npsn' => $this->request->getVar('npsn'),
            'nama_sekolah' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'logo_sekolah' => $namaLogo
        ]);
        // dd($logo);

        session()->setFlashdata('pesan-tambah-sekolah', 'Data Sekolah berhasil ditambahkan.');
        return redirect()->to('/sekolah/sekolah');
    }
    public function edit_sekolah($npsn)
    {
        session();
        $validation = \Config\Services::validation();
        // mengambil data sekolah sesuai npsn
        $sekolah = $this->sekolahModel->find($npsn);
        $data = [
            'title' => 'Bank Soal | Sekolah',
            'sekolah'   => $sekolah,
            'validation'    => $validation
        ];
        return view('admin/edit/form_edit_sekolah', $data);
    }
    public function simpan_edit_sekolah($npsn)
    {
        $sekolah = $this->sekolahModel->find($npsn);
        // dd($sekolah);
        $id = $this->request->getVar('npsn');
        $nama_sekolah = $this->request->getVar('nama');
        if ($npsn == $id or $nama_sekolah = $sekolah['nama_sekolah']) {
            if (!$this->validate([
                'npsn'      => 'required|exact_length[8]|numeric',
                'nama'      => 'required',
                'alamat'    => 'required',
                'logo'      => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
            ])) {
                return redirect()->to('sekolah/edit_sekolah/' . $npsn)->withInput();
            }
        } else {
            if (!$this->validate([
                'npsn'      => 'required|exact_length[8]|is_unique[sekolah.NPSN]|numeric',
                'nama'      => 'required|is_unique[sekolah.nama]',
                'alamat'    => 'required',
                'logo'      => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]'
            ])) {
                return redirect()->to('sekolah/edit_sekolah/' . $npsn)->withInput();
            }
        }

        //ambil gambar inputan
        $logo = $this->request->getFile('logo');
        // dd($logo);
        $logoLama = $this->request->getVar('logoLama');
        // dd($logoLama);
        // apakah tidak ada gambar yang di upload
        if ($logo->getError() == 4) {
            $namaLogo = $logoLama;
        } else {
            //mengambil nama dari logo yang diinput
            $namaLogo = $logo->getRandomName();
            if ($logoLama != 'logo-batang.png') {
                // pindahkan file ke folder image
                $logo->move('assets/images/logo', $namaLogo);
                //hapus file lama
                unlink('assets/images/logo/' . $logoLama);
            }
        }
        $data = [
            'nama_sekolah' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'logo_sekolah' => $namaLogo
        ];
        // dd($npsn);
        $builder = $this->db->table('sekolah');
        $builder->set('npsn', $id);
        $builder->where('npsn', $npsn);
        $builder->update();
        $this->sekolahModel->update($id, $data);

        session()->setFlashdata('pesan-edit-sekolah', 'Data Sekolah berhasil diubah.');
        return redirect()->to('/sekolah/sekolah');
    }
    public function hapus_sekolah($npsn)
    {
        //cari gambar berdasarkan id
        $sekolah = $this->sekolahModel->find($npsn);
        $logo = $sekolah['logo_sekolah'];
        if ($logo != 'logo-batang.png') {
            unlink('assets/images/logo/' . $sekolah['logo_sekolah']);
        }
        $this->sekolahModel->delete($npsn);

        session()->setFlashdata('pesan-hapus-sekolah', 'Data sekolah berhasil dihapus.');

        return redirect()->to('/sekolah/sekolah');
    }
}