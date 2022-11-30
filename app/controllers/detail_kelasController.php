<?php

class detail_kelasController extends Controller
{

    public function __construct()
    {
        
    }

    public function index()
    {
        header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
        exit;
    }

    public function update_siswa()
    {
        // echo 'ID KELAS : dsa';
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'kelas/detail/' . $_POST['id_kelas']);
            exit;
        }
    }

    public function setSiswatoKelas()
    {
        $url = $this->parseURL();
        if (!isset($url[2])) {
            header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
            exit;
        }
        if ($nis = "") {
            header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
            exit;
        }
        $data['id_tahun_ajaran'] = $this->model('model_tahun_ajaran')->getActivatedTahunAjaran();
        $data = [
            'nis' => $url[2],
            'id_kelas' => $_SESSION['id_kelas']
        ];

        $update = [

        ];

        // if ($this->model('model_detail_kelas')->setSiswatoKelas()) {
        //     # code...
        // }
        // echo json_encode($data['id_tahun_ajaran'], JSON_PRETTY_PRINT);
    }
    public function update_siswa_to_kelas($nis = "")
    {
        
    }
}
