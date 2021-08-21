<?php 

namespace App\Models;
use CodeIgniter\Model;

class RegisterModel extends Model{
    protected $table = 'user';
    protected $allowedFields = ['nama', 'username', 'password', 'level'];
}
