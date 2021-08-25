<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Gejala extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new GejalaModel();
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
        $model = new GejalaModel();
        $data = [
            'nama_gejala' => $this->request->getVar('nama_gejala'),
            'id_penyakit' => $this->request->getVar('id_penyakit')
        ];
        $data = json_decode(file_get_contents("php://input"));
        
        $model->insert($data);
    
        $response = [
            'status' => $this->response->getStatusCode(),
            'message' => 'Data disimpan'
        ];
        return $this->respond($response);        
    }

    public function update($id = null)
    {
        $model = new GejalaModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_penyakit' => $json->id_penyakit,
                'nama_gejala' => $json->nama_gejala
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_penyakit' => $input['id_penyakit'],
                'nama_gejala' => $input['nama_gejala'],
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => $this->response->getStatusCode(),
            'message' => 'Data di-update'
        ];
        return $this->respond($response);
    }

    public function delete($id = null){
        $model = new GejalaModel();
        $model->delete($id);
        $response = [
            'status'   => $this->response->getStatusCode(),
            'message' => 'Data dihapus'
        ];
        return $this->respond($response);
    }
}
