<?php

class api_kelasController extends Controller
{
    public function index()
    {
        header('Content-Type: application/json');
        $row = $this->model('model_kelas')->getAllKelas();
        echo json_encode(compact('row'));
    }
}
