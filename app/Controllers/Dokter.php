<?php

namespace App\Controllers;

use App\Models\DokterModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Dokter extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new DokterModel();
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

    public function create()
    {
        $model = new DokterModel();

        $getId = (int)$model->getLastId() + 1;
        
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_dokter' => $getId,
                'nama_dokter' => $json->nama_dokter
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_dokter' => $getId,
                'nama_dokter' => $input['nama_dokter'],
            ];
        }
        
        $model->insert($data);
    
        $response = [
            'status' => $this->response->getStatusCode(),
            'message' => 'Data disimpan'
        ];
        return $this->respond($response);        
    }

    public function update($id = null)
    {
        $model = new DokterModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'nama_dokter' => $json->nama_dokter
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'nama_dokter' => $input['nama_dokter'],
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => $this->response->getStatusCode(),
            'messages' => 'Data di-update'
        ];
        return $this->respond($response);
    }

    public function delete($id = null){
        $model = new DokterModel();
        $model->delete($id);
        $response = [
            'status'   => $this->response->getStatusCode(),
            'messages' => 'Data dihapus'
        ];
        return $this->respond($response);
    }
}
