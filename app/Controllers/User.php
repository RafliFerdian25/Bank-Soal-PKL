<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\GuruModel;
use App\Models\MapelModel;
use App\Models\SekolahModel;
use App\Models\SoalModel;
use \Myth\Auth\Controllers;
use \Myth\Auth\Models\UserModel;

use function PHPUnit\Framework\throwException;


class User extends BaseController
{
    protected $materiModel;
    protected $guruModel;
    protected $mapelModel;
    protected $sekolahModel;
    protected $soalModel;
    protected $UsersModel;

    public function __construct()
    {
        $this->materiModel = new MateriModel();
        $this->guruModel = new GuruModel();
        $this->mapelModel = new MapelModel();
        $this->sekolahModel = new SekolahModel();
        $this->soalModel = new SoalModel();
        $this->db = \Config\Database::connect();
        $this->UsersModel = new UserModel();
        // $UsersModel->useModel(new \Myth\Auth\Models\UserModel());
    }

    public function index()
    {
        // Jumlah sekolah di batang
        $builder_sekolah = $this->db->table('sekolah');
        $jumlah_sekolah = $builder_sekolah->countAll();

        // Jumlah guru di batang
        $builder_guru = $this->db->table('guru');
        $jumlah_guru = $builder_guru->countAll();

        // Jumlah soal keseluruhan
        $builder_soal = $this->db->table('soal');
        $jumlah_soal = $builder_soal->countAll();

        // Jumlah soal IPA
        $builder_soal_ipa = $this->db->table('soal');
        $builder_soal_ipa->join('materi', 'materi.id_materi = soal.id_materi');
        $builder_soal_ipa->where('materi.id_mapel', 24);
        $jumlah_soal_ipa = $builder_soal_ipa->countAllResults();

        // Jumlah soal IPS
        $builder_soal_ips = $this->db->table('soal');
        $builder_soal_ips->join('materi', 'materi.id_materi = soal.id_materi');
        $builder_soal_ips->where('materi.id_mapel', 25);
        $jumlah_soal_ips = $builder_soal_ips->countAllResults();

        if (in_groups('mgmp')) {
            $mapel = $this->mapelModel->mapel_mgmp(user()->id_mgmp);
        } else {
            $mapel = $this->mapelModel->find_mapel(user_id());
        }

        // dd($mapel);
        $data = [
            'title' => 'Bank Soal | Beranda',
            'mapel' => $mapel,
            'sekolah'   => $jumlah_sekolah,
            'guru'   => $jumlah_guru,
            'soal'   => $jumlah_soal,
            'soal_ipa'   => $jumlah_soal_ipa,
            'soal_ips'   => $jumlah_soal_ips,
        ];
        return view('beranda', $data);
    }
    public function daftar_akun()
    {
        $builder_user = $this->db->table('users');
        $builder_user->select('users.id as userid, username, email, user_image, users.nuptk, name,deleted_at');
        $builder_user->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder_user->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder_user->where('users.id !=', user_id());
        $builder_user->where('deleted_at =', null);
        $query = $builder_user->get();
        $users = $query->getResultArray();

        // dd($users);
        $data = [
            'title' => 'Bank Soal | Manajemen Akun',
            'users' => $users
        ];
        return view('admin/daftar_akun', $data);
    }
    public function edit_akun($user_id)
    {
        session();
        $validation = \Config\Services::validation();
        $builder = $this->db->table('users');
        $builder->select('users.id as userid, username, email, user_image, nuptk, name, id_mgmp');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $user_id);
        $user = $builder->get()->getFirstRow('array');

        $guru = $this->guruModel->guru_belum_akun()->getResultArray();
        if ($user['nuptk'] != null) {
            $guru_sebelum = $this->guruModel->find($user['nuptk']);
        } else {
            $guru_sebelum = null;
        }
        // dd($user);
        // mengambil data mata pelajaran
        $mapel = $this->mapelModel->findAll();
        $data = [
            'title' => 'Bank Soal | Manajemen Akun',
            'user'  => $user,
            'guru'  => $guru,
            'guru_sebelum'  => $guru_sebelum,
            'validation'    => $validation,
            'mapel'     => $mapel
        ];
        return view('admin/edit/form_edit_akun', $data);
    }
    public function simpan_edit_akun($user_id)
    {
        // aturan validasi jika username tidak berubah
        $user = $this->UsersModel->find($user_id);
        if ($user->nuptk != null && $user->nuptk == $this->request->getVar('nuptk')) {
            $nuptk = $user->nuptk;
        } else {
            $nuptk = $this->request->getVar('nuptk');
        }
        $username = $this->request->getVar('username');
        if ($user->username == $username) {
            $rules_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]';
        } else {
            $rules_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }
        // aturan validasi jika email tidak berubah
        $email = $this->request->getVar('email');
        if ($user->email == $email) {
            $rules_email = 'required|valid_email';
        } else {
            $rules_email = 'required|valid_email|is_unique[users.email]';
        }
        // Validasi
        if (!$this->validate([
            'email'     => $rules_email,
            'username' =>  $rules_username,
        ])) {
            return redirect()->to('user/edit_akun/' . $user_id)->withInput();
        }
        $peran = $this->request->getVar('peran');
        $mapel_mgmp = $this->request->getVar('mapel_mgmp');
        // dd($mapel_mgmp);
        if ($peran == 2) {
            $this->db->query("UPDATE `users` SET `email` = '$email', `username`='$username', `nuptk`='$nuptk' WHERE `users`.`id` = $user_id");
        } elseif ($peran == 3) {
            $this->db->query("UPDATE `users` SET `email` = '$email', `username`='$username', `id_mgmp`='$mapel_mgmp' WHERE `users`.`id` = $user_id");
        } else {
            $this->db->query("UPDATE `users` SET `email` = '$email', `username`='$username' WHERE `users`.`id` = $user_id");
        }
        // update group user
        $this->db->query("UPDATE `auth_groups_users` SET `group_id`= $peran ,`user_id`= $user_id WHERE user_id = $user_id");


        session()->setFlashdata('pesan-edit-akun', 'Data akun berhasil diubah.');
        return redirect()->to('user/daftar_akun');
    }
    public function edit_akun_user()
    {
        session();
        $validation = \Config\Services::validation();
        $mapel = $this->mapelModel->find_mapel(user_id());
        $data = [
            'title' => 'Bank Soal | Manajemen Akun',
            'user'  => user(),
            'validation'    => $validation,
            'mapel' => $mapel
        ];
        return view('edit/edit_akun_user', $data);
    }
    public function simpan_edit_akun_user()
    {
        $username = $this->request->getVar('username');
        if (user()->username == $username) {
            $rules_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]';
        } else {
            $rules_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }
        // aturan validasi jika email tidak berubah
        $email = $this->request->getVar('email');
        if (user()->email == $email) {
            $rules_email = 'required|valid_email';
        } else {
            $rules_email = 'required|valid_email|is_unique[users.email]';
        }
        if (in_groups('guru')) {
            if (!$this->validate([
                'email'     => $rules_email,
                'username' =>  $rules_username,
                'user_image' => [
                    'rules' => 'max_size[user_image,2048]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Gambar yang diupload lebih besar dari 2MB',
                        'is_image' => 'File yang diupload bukan gambar',
                        'mime_in' => 'File yang diupload bukan gambar',
                    ]
                ],
            ])) {
                return redirect()->to('user/edit_akun_user')->withInput();
            }
            //ambil gambar inputan
            $user_image = $this->request->getFile('user_image');
            //mengambil nama gambar sebelumnya
            $user_image_lama = $this->request->getVar('user_image_lama');
            // apakah tidak ada gambar yang di upload
            if ($user_image->getError() == 4) {
                $nama_user_image = $user_image_lama;
            } else {
                //mengambil nama dari logo yang diinput
                $nama_user_image = $user_image->getName();
                if ($user_image_lama != 'user-3.png') {
                    // pindahkan file ke folder image
                    $user_image->move('assets/images/akun', $nama_user_image);
                    //hapus file lama
                    unlink('assets/images/akun/' . $this->request->getVar('user_image_lama'));
                }
            }
            $data = [
                'username' => $this->request->getVar('username'),
                'user_image' => $nama_user_image
            ];
        } else {
            if (!$this->validate([
                'email'     => $rules_email,
                'username' =>  $rules_username,
            ])) {
                return redirect()->to('user/edit_akun_user')->withInput();
            }
            $data = [
                'username' => $this->request->getVar('username')
            ];
        }

        $email = $this->request->getVar('email');

        if ($email != user()->email) {
            $this->UsersModel->update(user_id(), [
                'email' => $email
            ]);
        }
        $this->UsersModel->update(user_id(), $data);
        session()->setFlashdata('pesan-edit-akun', 'Data akun berhasil diubah.');
        return redirect()->to('user/edit_akun_user');
    }
    public function hapus_akun($user_id)
    {
        $this->db->query("DELETE FROM `users` WHERE `id` = $user_id");
        // $this->UsersModel->delete($user_id);

        session()->setFlashdata('pesan-hapus-akun', 'Data akun berhasil dihapus.');

        return redirect()->to('/user/daftar_akun');
    }
}