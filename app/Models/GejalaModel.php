<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = 'gejala';
    protected $allowedFields = ['nama_gejala'];
    protected $primaryKey = 'id_gejala';
}
