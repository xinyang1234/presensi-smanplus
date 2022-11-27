<?php

class tahun_ajaranController extends Controller
{

    public function index()
    {
        $data['tahun_ajaran'] = $this->model('model_tahun_ajaran')->getAllTahunAjaran();
        // echo json_encode($data['tahun_ajaran']);
        $data['title'] = 'Tahun Ajaran';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('tahun_ajaran/index', $data);
        $this->view('templates/footer', $data);
    }


    public function setActive()
    {
        if (!isset($_POST['submit_active'])) {
            header('Location: ' . base_url . 'tahun_ajaran');
            exit;
        }

        $this->model('model_tahun_ajaran')->resetActiveTahun();
        $this->model('model_tahun_ajaran')->setActiveTahun($_POST['id_tahun']);
        Flasher::setFlash('Berhasil diaktifkan!', 'success');
        header('Location: ' . base_url . 'tahun_ajaran');
        exit;


        // if (!isset($url[2])) {
        //     header('Location: ' . base_url . 'tahun_ajaran');
        // }


        // $data['tahun_ajaran'] = $this->model('model_tahun_ajaran')->getOneTahunAjaran($url[2]);
        //     if ($this->model('model_tahun_ajaran')->setActiveTahun($data['tahun_ajaran']->id_tahun_ajaran) == true) {
        //         Flasher::setFlash('Berhasil diaktifkan!', 'success');
        //         header('Location: ' . base_url . 'tahun_ajaran');
        //         exit;
        //     }

        // if (!isset($url[2])) {
        //     header('Location: ' . base_url . 'tahun_ajaran');
        // }

        // if ($this->model('model_tahun_ajaran')->resetActiveTahun() == true) {
        //     $this->model('model_tahun_ajaran')->setActiveTahun($url[2]);
        //     Flasher::setFlash('Berhasil Diaktifkan!', 'success');
        //     header('Location: ' . base_url . 'tahun_ajaran');
        //     exit;
        // }
    }
}
