<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaPenyakitModel extends Model
{
    protected $table = 'gejala_penyakit';
    protected $allowedFields = ['id_gejala', 'id_penyakit'];

    public function deleteGejalaPenyakit($id){
        $this->db->query("DELETE FROM gejala_penyakit WHERE id_gejala = \"$id\"");
    }
}
