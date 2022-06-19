<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class CetakModel extends Model
{
    protected $table      = 'soal_cetak';
    protected $primaryKey = 'id_soal_cetak';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_soal_cetak', 'soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'jawaban', 'soal_img', 'alasan_jawaban', 'tgl_input', 'id', 'id_materi', 'alasan_jawaban_img', 'id_status_soal'];

    //mencari semua materi sesuai mapel tertentu
    public function find_soal_cetak($user_id)
    {
        $builder = $this->db->table('soal_cetak');
        $builder->select('id_materi,id_soal_cetak, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban,alasan_jawaban, soal_img, alasan_jawaban_img,  id, tgl_input, nama_status_soal');
        // $builder->join('materi', 'soal.id_materi = materi.id_materi');
        $builder->join('status_soal', 'status_soal.id_status_soal = soal_cetak.id_status_soal');
        $builder->where('soal_cetak.id', $user_id);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}