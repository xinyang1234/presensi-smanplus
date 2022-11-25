<?php

class About extends Controller
{
    public function index($nama = 'Fathan', $job = 'Mahasiswa')
    {
        $data['nama'] = $nama;
        $data['job'] = $job;
        $this->view('about/index', $data);
    }
    public function page()
    {
        $this->view('about/page');
    }
}
