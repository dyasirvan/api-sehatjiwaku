<?php 

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model{
    protected $table = 'user';

    public function cekUsername($user)
    {
        $builder = $this->db->table('user');
        $builder->select("*");
        $builder->where('username', $user);
        
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }
}
