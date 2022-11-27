<?php

class detail_kelasController extends Controller
{

    public function __construct()
    {
    }

    public function update_siswa()
    {
        // echo 'ID KELAS : dsa';
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'kelas/detail/' . $_POST['id_kelas']);
            exit;
        }
        // if ($this->model('model_detail_kelas')->updateDataSiswa($_POST) > 0) {
        //     Flasher::setFlash('Berhasil Diubah', 'success');
        //     header('Location: ' . base_url . 'kelas/detail/' . $_POST['id_kelas']);
        //     exit;
        // }
    }
}
