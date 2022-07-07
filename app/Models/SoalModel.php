<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class SoalModel extends Model
{
    protected $table      = 'soal';
    protected $primaryKey = 'id_soal';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_soal', 'soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'jawaban', 'soal_img', 'alasan_jawaban', 'tgl_input', 'nuptk', 'id_materi', 'alasan_jawaban_img', 'id_status_soal'];

    //mencari semua materi sesuai mapel tertentu
    public function find_soal($id_materi, $semester = null)
    {
        $builder = $this->db->table('soal');
        $builder->select(' nama_materi, soal.id_materi as id_materi,id_soal, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban,alasan_jawaban, soal_img, alasan_jawaban_img, semester, nuptk, tgl_input, nama_status_soal');
        $builder->join('materi', 'soal.id_materi = materi.id_materi');
        $builder->join('status_soal', 'status_soal.id_status_soal = soal.id_status_soal');
        $builder->where('soal.id_materi', $id_materi);
        if ($semester != null) {
            $builder->where('materi.semester', $semester);
        }
        $builder->orderBy('tgl_input', 'DESC');
        $query = $builder->get();
        return $query;
    }
    public function find_soal_guru($id_materi, $nuptk, $semester = null)
    {
        $builder = $this->db->table('soal');
        $builder->select(' nama_materi, soal.id_materi as id_materi,id_soal, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban, soal_img, alasan_jawaban_img,alasan_jawaban, semester, nuptk, tgl_input, nama_status_soal');
        $builder->join('materi', 'soal.id_materi = materi.id_materi');
        $builder->join('status_soal', 'status_soal.id_status_soal = soal.id_status_soal');
        $where = "soal.id_materi = $id_materi AND soal.nuptk = $nuptk";
        $builder->where($where);
        if ($semester != null) {
            $builder->where('materi.semester', $semester);
        }
        $builder->orderBy('tgl_input', 'DESC');
        $query = $builder->get();
        return $query;
    }
    //mencari semua materi sesuai mapel tertentu
    public function find_detail_soal($id_soal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('soal');
        $builder->select('nama_materi, soal.id_materi as id_materi,id_soal, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban, soal_img, alasan_jawaban_img,alasan_jawaban, nuptk, mapel.id_mapel, nama_mapel, tgl_input,soal.id_status_soal, nama_status_soal');
        $builder->join('materi', 'soal.id_materi = materi.id_materi');
        $builder->join('mapel', 'mapel.id_mapel = materi.id_mapel');
        $builder->join('status_soal', 'status_soal.id_status_soal = soal.id_status_soal');

        $builder->where('soal.id_soal', $id_soal);
        $query = $builder->get()->getFirstRow('array');
        return $query;
    }
    public function find_like_soal($soal)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('soal');
        $builder->select();
        $builder->like('soal', $soal);
        return $builder->get()->getResultArray();
    }
    // jumlah soal berdasarkan mapel
    public function jumlah_soal_mapel($id_mapel)
    {
        $builder = $this->db->table('soal');
        $builder->select();
        $builder->join('materi', 'soal.id_materi = materi.id_materi');
        $builder->where('materi.id_mapel', $id_mapel);
        $query = $builder->countAllResults();
        return $query;
    }
    // jumlah soal berdasarkan materi
    public function jumlah_soal_materi($id_materi)
    {
        $builder = $this->db->table('soal');
        $builder->select();
        // $builder->join('materi', 'soal.id_materi = materi.id_materi');
        $builder->where('id_materi', $id_materi);
        $query = $builder->countAllResults();
        return $query;
    }

    public function acak_soal($id_materi, $jumlah_soal)
    {
        $query = $this->db->query("SELECT * FROM `soal` WHERE `id_materi` = $id_materi AND `id_status_soal` = 2 ORDER BY RAND() LIMIT $jumlah_soal");
        return $query->getResultArray();
    }
}