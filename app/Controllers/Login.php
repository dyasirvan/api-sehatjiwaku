<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Login extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $model = new LoginModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'];
        $userData = $model->cekUsername($username);
        if ($userData == NULL) {
            $response = [
                'status'   => 400,
                'messages' => "Data tidak ditemukan",
                'data' => []
            ];
            return $this->respond($response);
        } else {
            // if (password_verify($data['password'], $userData['password'])) {
            if ($data['password'] == $userData['password']) {
                $data = array([
                    'id_user' => $userData['id_user'],
                    'nama' => $userData['nama'],
                    'username' => $userData['username'],
                    'level' => $userData['level']
                ]);
                $response = [
                    'status'   => 200,
                    'messages' => "Berhasil login",
                    'data' => $data
                ];
                return $this->respond($response);
            } else {
                $response = [
                    'status'   => 400,
                    'messages' => "Password salah",
                    'data' => []
                ];
                return $this->respond($response);
            }
        }
    }
}
