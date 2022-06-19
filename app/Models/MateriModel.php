<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class MateriModel extends Model
{
    protected $table      = 'materi';
    protected $primaryKey = 'id_materi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_materi', 'id_mapel', 'nama_materi', 'semester'];

    //mencari jumlah bab pada mapel tertentu
    public function jumlah_materi($id_mapel)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('materi');
        $builder->select();
        $builder->where('id_mapel', $id_mapel);
        return $builder->countAllResults();
    }
    //mencari semua materi sesuai mapel tertentu
    public function find_materi($id_mapel, $semester = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('materi');
        $builder->select();
        $builder->where('id_mapel', $id_mapel);
        if ($semester != null) {
            $builder->where('semester', $semester);
        }
        $query = $builder->get()->getResultArray();
        return $query;
    }
}