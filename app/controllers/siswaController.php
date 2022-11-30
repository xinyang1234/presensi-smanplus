<?php

class siswaController extends Controller
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
        // $jumlahDataperHalaman = 2;
        // $jumlahData = $this->model('model_siswa')->getCountSiswa();
        // $jumlahHalaman = ceil($jumlahData / $jumlahDataperHalaman);
        // $halamanAktif = $page;
        // var_dump($halamanAktif);
        $data['data_siswa'] = $this->model('model_siswa')->getAllSiswa();
        $data['title'] = 'Siswa';
        $data['tahun_ajaran'] = $this->model('model_detail_kelas')->getAllTahunAjaran();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('siswa/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah_siswa()
    {
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'siswa');
            exit;
        }
        if (isset($_POST['submit'])) {
            $data = [
                'nis' => $_POST['nis'],
                'nama' => $_POST['nama'],
                'alamat' => $_POST['alamat'],
                'telepon' => $_POST['telepon'],
                'jk' => $_POST['jk'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
            ];
            if ($this->model('model_siswa')->insertSiswa($data) > 0) {
                Flasher::setFlash('Berhasil ditambahkan', 'success');
                header('Location: ' . base_url . 'siswa');
                exit;
            }
        }
    }

    public function getDatabyId()
    {
        echo json_encode($this->model('model_siswa')->getSiswaById($_POST['id']));
    }

    public function ubah_siswa()
    {
        if (!isset($_POST['submit'])) {
            header('location: ' . base_url . 'siswa');
            exit;
        }

        if ($this->model('model_siswa')->updateSiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil diubah!', 'success');
            header('location: ' . base_url . 'siswa');
            exit;
        }
    }

    public function hapusSiswa()
    {
        // echo $_POST['nis'];
        if (!isset($_POST['hapus'])) {
            header('location: ' . base_url . 'siswa');
            exit;
            // echo ' askldhalkd';
        }

        if (isset($_POST['hapus'])) {
            if ($this->model('model_siswa')->hapusSiswa($_POST['nis']) > 0) {
                Flasher::setFlash('Berhasil dihapus!', 'success');
                header('location: ' . base_url . 'siswa');
                exit;
            }
        }
    }
}
