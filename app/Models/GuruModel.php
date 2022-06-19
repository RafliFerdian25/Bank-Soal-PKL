<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class GuruModel extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'nuptk';
    protected $allowedFields = ['nuptk', 'nip', 'npsn', 'nama_guru', 'id_mapel'];

    //mencari data guru keseluruhan
    public function semua_guru()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('guru');
        $builder->select('nuptk,nip,nama_guru, nama_sekolah as sekolah_induk, nama_mapel as mata_pelajaran');
        $builder->join('sekolah', 'sekolah.npsn = guru.npsn');
        $builder->join('mapel', 'mapel.id_mapel = guru.id_mapel');
        $query = $builder->get();
        return $query;
    }
    public function semua_guru_tanpa_sekolah()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('guru');
        $builder->select('nuptk,nip,nama_guru,  nama_mapel as mata_pelajaran');
        // $builder->join('sekolah', 'sekolah.npsn = guru.npsn');
        $builder->join('mapel', 'mapel.id_mapel = guru.id_mapel');
        $builder->where('npsn', null);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    // mengambil data guru dari sekolah tertentu
    public function guru_sekolah($npsn)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('guru');
        $builder->select('nuptk,nip,nama_guru,nama_mapel as mata_pelajaran');
        $builder->join('mapel', 'mapel.id_mapel = guru.id_mapel');
        $builder->where('npsn', $npsn);
        $query = $builder->get();
        return $query;
    }
    public function guru_belum_akun()
    {
        $db = \Config\Database::connect();
        $builder = $db->query("SELECT * FROM `guru` WHERE guru.nuptk NOT IN (SELECT nuptk FROM users where nuptk IS NOT NULL)");
        return $builder;
    }
    // jumlah guru berdasarkan mapel
    public function jumlah_guru_mapel($id_mapel)
    {
        $builder = $this->db->table('guru');
        $builder->select();
        $builder->where('id_mapel', $id_mapel);
        $query = $builder->countAllResults();
        return $query;
    }
    public function find_like_guru($nuptk)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('guru');
        $builder->select();
        $builder->like('nuptk', $nuptk);
        return $builder->get()->getResultArray();
    }
}