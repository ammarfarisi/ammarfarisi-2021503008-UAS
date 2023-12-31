<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_semester';
    protected $primaryKey       = 'id_semester';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_semester','tahun_ajaran','semester'];
}
