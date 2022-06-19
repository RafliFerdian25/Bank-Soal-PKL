<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class StatusSoalModel extends Model
{
    protected $table      = 'status_soal';
    protected $primaryKey = 'id_status_soal';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_status_soal', 'nama_status_soal'];
}