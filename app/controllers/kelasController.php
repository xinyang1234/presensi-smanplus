<?php

class kelasController extends Controller
{
    protected $kelas = 'Kelas';

    public function index()
    {
        $data['siswa'] = $this->model('model_kelas')->getAllKelas();

        $data['title'] = $this->kelas;
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah()
    {
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'kelas');
            exit;
        }else if ($this->model('model_kelas')->insertKelas($_POST) > 0) {
            Flasher::setFlash('Berhasil Ditambahkan', 'success');
            header('Location: ' . base_url . 'kelas');
            exit;
        }
    }
}
