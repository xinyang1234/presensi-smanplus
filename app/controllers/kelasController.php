<?php

class kelasController extends Controller
{
    protected $kelas = 'Kelas';

    public function index()
    {
        $data['kelas'] = $this->model('model_kelas')->getAllKelas();

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
        } else if ($this->model('model_kelas')->insertKelas($_POST) > 0) {
            Flasher::setFlash('Berhasil Ditambahkan', 'success');
            header('Location: ' . base_url . 'kelas');
            exit;
        }
    }
    public function getUbah()
    {
        echo json_encode($this->model('model_kelas')->getDataUbahKelas($_POST['id']));
    }

    public function ubah()
    {
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'kelas');
            exit;
        } else if ($this->model('model_kelas')->ubahKelas($_POST) > 0) {
            Flasher::setFlash('Berhasil Diubah', 'success');
            header('Location: ' . base_url . 'kelas');
            exit;
        }
    }

    public function detail()
    {

        if (!isset($url[2])) {
            header('Location: ' . base_url . 'kelas');
        }
        // echo json_encode($this->parseURL());
        $data['title'] = 'Detail Kelas';
        
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/detail', $data);
        $this->view('templates/footer', $data);
    }
}
