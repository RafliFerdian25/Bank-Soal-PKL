<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class MgmpModel extends Model
{
    protected $table      = 'mgmp';
    protected $primaryKey = 'id_mgmp';
    protected $allowedFields = ['id_mgmp', 'id_mapel', 'nama_mgmp'];
}