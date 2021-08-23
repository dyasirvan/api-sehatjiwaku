<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Penyakit extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new PenyakitModel();
        $data = $model->findAll();
        if($data != null){
            $response = [
                'status' => $this->response->getStatusCode(),
                'message' => 'Data ditemukan',
                'data' => $data
            ];
            return $this->respond($response);
        }else{
            $response = [
                'status' => $this->response->getStatusCode(),
                'message' => 'Data masih kosong',
                'data' => $data
            ];
            return $this->respond($response);
        }
        
    }
}
