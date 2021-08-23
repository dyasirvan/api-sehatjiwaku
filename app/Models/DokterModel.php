<?php 

namespace App\Models;
use CodeIgniter\Model;

class DokterModel extends Model{
    protected $table = 'dokter';
    protected $allowedFields = ['id_dokter', 'nama_dokter'];
    protected $primaryKey = 'id_dokter';

    public function getLastId()
    {
        $query = $this->db->query("SELECT MAX(`id_dokter`) AS 'id' FROM `dokter`");

        $row = $query->getRow();

        return $row->id;
        
    }
}



