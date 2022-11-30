<?php

class mapelController extends Controller
{

    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setFlash('Silahkan Login terlebih dahulu!',  'warning');
            header('location: ' . base_url . 'auth/login');
            exit;
        }
    }

    public function index()
    {

        $data['mapel'] = $this->model('model_mapel')->getAllMapel();
        $data['title'] = 'Mata Pelajaran';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pelajaran/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah_mapel()
    {
        if (!isset($_POST['tambah_mapel'])) {
            header('Location: ' . base_url . 'mapel');
            exit();
        }

        if ($this->model('model_guru')->insertDataMapel() > 0) {
            # code...
        }
    }
}
