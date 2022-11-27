<?php

class guruController extends Controller{


    public function index()
    {
        $data['title'] = 'Guru';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer', $data);
    }
}