<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_santri';
    protected $primaryKey       = 'id_santri';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_santri','nis','nama_santri', 'alamat', 'asrama', 'tahun_mondok'];
}