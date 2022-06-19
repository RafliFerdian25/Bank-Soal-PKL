<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class MapelModel extends Model
{
    protected $table      = 'mapel';
    protected $primaryKey = 'id_mapel';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_mapel', 'nama_mapel'];

    public function find_mapel($id_user)
    {
        $builder = $this->db->table('users');
        $builder->select('users.nuptk, guru.id_mapel');
        $builder->join('guru', 'guru.nuptk = users.nuptk');
        $builder->join('mapel', 'mapel.id_mapel = guru.id_mapel');
        $builder->where('users.id', $id_user);
        $mapel = $builder->get()->getFirstRow('array');
        return $mapel;
    }
    public function mapel_mgmp($id_mgmp)
    {
        $builder = $this->db->table('mapel');
        $builder->select();
        $builder->join('mgmp', 'mgmp.id_mgmp = mapel.id_mapel');
        $builder->where('id_mgmp', $id_mgmp);
        $mapel = $builder->get()->getFirstRow('array');
        return $mapel;
    }
}