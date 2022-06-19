<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\SekolahModel;
use App\Models\SoalModel;

use function PHPUnit\Framework\throwException;


class Mapel extends BaseController
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
    public function mapel()
    {
        $mapel = $this->mapelModel->orderBy('nama_mapel', 'ASC')->findAll();
        foreach ($mapel as $data_mapel) {
            $jumlah_guru[] = $this->guruModel->jumlah_guru_mapel($data_mapel['id_mapel']);
            $jumlah_soal[] = $this->soalModel->jumlah_soal_mapel($data_mapel['id_mapel']);
        }
        $data = [
            'title' => 'Bank Soal | Soal',
            'jumlah_guru'   => $jumlah_guru,
            'jumlah_soal'   => $jumlah_soal,
            'mapel' => $mapel
        ];
        return view('admin/mapel', $data);
    }
    public function tambah_mapel()
    {
        session();
        $validation = \Config\Services::validation();
        $data = [
            'title' => 'Bank Soal | Soal',
            'validation'    => $validation
        ];
        return view('admin/tambah/form_tambah_mapel', $data);
    }
    public function simpan_tambah_mapel()
    {
        // $data = [
        //     'nama_materi'     => $this->request->getVar('materi_semester2_1'),
        //     'nama_materi1'     => $this->request->getVar('materi_semester2_3')
        // ];
        // dd($data);
        // mengambil jumlah materi dari form
        $jumlah_materi_semester1 =  $this->request->getVar('jumlah_materi_semester1');
        $jumlah_materi_semester2 =  $this->request->getVar('jumlah_materi_semester2');
        // dd($jumlah_materi_semester2);
        // menyimpan data
        $this->mapelModel->insert([
            'nama_mapel' => $this->request->getVar('nama'),
        ]);
        // mengambil id dari mapel yang baru diinput
        $id_mapel = $this->db->insertID();
        // menyimpan data materi sesuai dengan mapel
        // semester 1
        for ($i = 1; $i <= $jumlah_materi_semester1; $i++) {
            $this->materiModel->insert([
                'id_mapel' => $id_mapel,
                'nama_materi'     => $this->request->getVar('materi_semester1_' . $i),
                'semester' => 1
            ]);
        }
        //semester 2
        for ($i = 1; $i <= $jumlah_materi_semester2; $i++) {
            $this->materiModel->insert([
                'id_mapel' => $id_mapel,
                'nama_materi'     => $this->request->getVar('materi_semester2_' . $i),
                'semester' => 2
            ]);
        }


        session()->setFlashdata('pesan-tambah-mapel', 'Data Mata Pelajaran ditambahkan.');
        return redirect()->to('/mapel/mapel');
    }
    public function edit_mapel($id_mapel)
    {
        $mapel = $this->mapelModel->find($id_mapel);
        // mengambil seluruh materi dalam mapel tertentu
        $materi_semester1  = $this->materiModel->find_materi($id_mapel, 1);
        $materi_semester2  = $this->materiModel->find_materi($id_mapel, 2);
        // mengambil jumlah materi dalam mapel tertentu
        $jumlah_materi =  $this->materiModel->jumlah_materi($id_mapel);
        session();
        $validation = \Config\Services::validation();
        // dd($mapel);
        $data = [
            'title' => 'Bank Soal | Soal',
            'validation'    => $validation,
            'mapel'         => $mapel,
            'materi_semester1'           => $materi_semester1,
            'materi_semester2'           => $materi_semester2,
            'jumlah_materi' => $jumlah_materi
        ];
        return view('admin/edit/form_edit_mapel', $data);
    }
    public function simpan_edit_mapel($id_mapel, $semester)
    {
        if (!$this->validate([
            'nama'    => [
                'rules' => 'required',
                'errors' => ['required' => 'Bagian Mata Pelajaran wajib diisi']
            ],
            'materi_semester' . $semester . '_1' => [
                'rules' => 'required',
                'errors' => ['required' => 'Bagian Materi 1 wajib diisi']
            ],
        ])) {
            return redirect()->to('mapel/edit_mapel/' . $id_mapel)->withInput();
        }
        // dd($semester);
        $data = [
            'nama_mapel' => $this->request->getVar('nama')
        ];
        $this->mapelModel->update($id_mapel, $data);
        $jumlah_materi =  $this->request->getVar('jumlah_materi_semester' . $semester);
        // dd($jumlah_materi);
        // dd($semester);
        for ($i = 1; $i <= $jumlah_materi; $i++) {
            $id_materi  = $this->request->getVar('id_semester' . $semester . '_' . $i);
            $data_materi = [
                'id_materi'   => $id_materi,
                'id_mapel' => $id_mapel,
                'semester' => $semester,
                'nama_materi'     => $this->request->getVar('materi_semester' . $semester . '_' . $i)
            ];
            $this->materiModel->save($data_materi);
        }


        session()->setFlashdata('pesan-tambah-mapel', 'Data Mata Pelajaran berhasil diubah.');
        return redirect()->to('/mapel/mapel');
    }
    public function hapus_mapel($id_mapel)
    {
        $this->mapelModel->delete($id_mapel);

        session()->setFlashdata('pesan-hapus-mapel', 'Data Mata Pelajaran berhasil dihapus.');

        return redirect()->to('/mapel/mapel');
    }
    public function hapus_materi($id_materi, $id_mapel)
    {
        $this->materiModel->delete($id_materi);

        session()->setFlashdata('pesan-hapus-materi', 'Data Materi berhasil dihapus.');

        return redirect()->to('mapel/edit_mapel/' . $id_mapel);
    }
}