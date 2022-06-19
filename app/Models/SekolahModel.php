<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class SekolahModel extends Model
{
    protected $table      = 'sekolah';
    protected $primaryKey = 'npsn';
    protected $allowedFields = ['npsn', 'nama_sekolah', 'alamat', 'email', 'jumlah_guru', 'jumlah_siswa', 'logo_sekolah'];

    public function sekolah_guru($npsn = null)
    {
        $db = \Config\Database::connect();
        if ($npsn == null) {
            $builder = $db->query("SELECT sekolah.npsn, nama_sekolah, alamat, email, logo_sekolah, COUNT(nama_guru) as jumlah_guru FROM `sekolah` LEFT JOIN guru on guru.npsn = sekolah.npsn GROUP BY npsn");
        } else {
            $builder = $db->query("SELECT sekolah.npsn, nama_sekolah, alamat, email, logo_sekolah, COUNT(nama_guru) as jumlah_guru FROM `sekolah` LEFT JOIN guru on guru.npsn = sekolah.npsn WHERE sekolah.npsn = $npsn GROUP BY npsn");
        }
        return $builder;
    }
}