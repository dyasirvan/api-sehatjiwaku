<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Register extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $model = new RegisterModel();
        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'level' => $this->request->getVar('level'),
        ];
        $data = json_decode(file_get_contents("php://input"));

        $model->insert($data);
        $response = [
            'status'   => 201,
            'messages' => 'Data berhasil disimpan',
            'data'     => []
        ];
        return $this->respond($response);
    }
}
