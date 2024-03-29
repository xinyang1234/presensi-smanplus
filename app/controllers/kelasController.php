<?php

class kelasController extends Controller
{
    protected $kelas = 'Kelas';

    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setFlash('Silahkan Login terlebih dahulu!',  'warning');
            header('location: ' . base_url . 'auth/login');
            exit;
        }
        $this->db = new Database;
    }

    public function index()
    {
        $data['id_tahun_ajaran'] = $this->model('model_tahun_ajaran')->getActivatedTahunAjaran();
        $data['kelas'] = $this->model('model_kelas')->getAllKelas($data['id_tahun_ajaran']->id_tahun_ajaran);


        $data['title'] = $this->kelas;
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer', $data);
        unset($_SESSION['id_kelas']);
    }

    public function tambah()
    {
        $data['id_tahun_ajaran'] = $this->model('model_tahun_ajaran')->getActivatedTahunAjaran();
        $insertData = [
            'id_tahun_ajaran' => $data['id_tahun_ajaran']->id_tahun_ajaran,
            'kelas' => $_POST['kelas']
        ];
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'kelas');
            exit;
        } else if ($this->model('model_kelas')->insertKelas($insertData) > 0) {
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

    public function detail($id_kelas = "")
    {
        $url = $this->parseURL();
        // if (!isset($url[2])) {
        //     header('Location: ' . base_url . 'kelas');
        // }

        $id_kelas = $url[2];
        $_SESSION['id_kelas'] = $id_kelas;
        if (!isset($_SESSION['id_kelas'])) {
            header("Location: " . base_url . "kelas");
            exit;
        }
        $data['siswa'] = $this->model('model_detail_kelas')->getAllSiswaTambah();
        $data['kelas'] = $this->model('model_detail_kelas')->getIdKelas($id_kelas);

        if ($data['kelas']['id_kelas'] == null) {
            Flasher::setFlash('Kelas tidak ditemukan. <strong>Pilih salah satu</strong>', 'danger');
            header('Location: ' . base_url . 'kelas');
            exit;
        } else {
            // echo json_encode($this->parseURL());
            $data['title'] = 'Detail Kelas';
            $data['detail_kelas'] = $this->model('model_detail_kelas')->getAllDetailKelas($id_kelas);
            $data['tahun_ajaran'] = $this->model('model_detail_kelas')->getAllTahunAjaran();
            $this->view('templates/header', $data);
            $this->view('templates/sidebar', $data);
            $this->view('kelas/detail', $data);
            $this->view('templates/footer', $data);
        }
    }
    public function tambah_siswa()
    {
        $data['dataTambahSiswa'] = [
            'nis' => $_POST['nis'],
            'id_kelas' => $_POST['id_kelas'],
            'nama' => $_POST['nama'],
            'alamat' => $_POST['alamat'],
            'telepon' => $_POST['telepon'],
            'radio' => $_POST['radio'],
            'tahun_ajaran' => $_POST['tahun_ajaran'],
            'tahun_masuk' => $_POST['tahun_masuk'],
        ];
        if (!isset($_POST['submit'])) {
            Flasher::setFlash('Tekan tombol "+" untuk menambahkan siswa', 'warning');
            header('Location: ' . base_url . 'kelas/detail/' . $_POST['id_kelas']);
            exit;
        } else if ($this->model('model_detail_kelas')->insertDataSiswa($data) > 0) {
            Flasher::setFlash('Berhasil Ditambahkan', 'success');
            header('Location: ' . base_url . 'kelas/detail/' . $_POST['id_kelas']);
            exit;
        }
    }
    public function getUbahSiswa()
    {
        // $nis = 'E41212174';
        echo json_encode($this->model('model_detail_kelas')->getSiswaById($_POST['id_siswa']));
    }

    public function update_siswa()
    {
        // echo 'ID KELAS : ' . $_POST['id_kelas'];
        if (!isset($_POST['submit'])) {
            header('Location: ' . base_url . 'kelas');
            exit;
        } else {
            if ($this->model('model_detail_kelas')->updateDataSiswa($_POST) > 0) {
                Flasher::setFlash('Berhasil Diubah', 'success');
                header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
            }
        }
        // } else if ($this->model('model_detail_kelas')->updateDataSiswa($_POST) > 0) {
        //     Flasher::setFlash('Berhasil Diubah', 'success');
        //     header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
        //     exit;
        // }
    }

    public function delete_siswa()
    {
        if (!isset($_POST['hapus'])) {
            header('Location: ' . base_url . 'kelas');
            exit;
        }
        if (isset($_POST['hapus'])) {
            if ($this->model('model_detail_kelas')->deleteSiswafromKelas($_POST['nis']) > 0) {
                Flasher::setFlash('Berhasil dihapus', 'success');
                header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
                exit;
            }
        }
    }

    public function update_siswa_to_kelas($nis = "")
    {
        if ($nis == "") {
            header("location: " . base_url . "kelas/detail/" . $_SESSION['id_kelas']);
        }
        $url = $this->parseURL();
        $dataGet = [
            'nis' => $nis,
            'id_kelas' => $_SESSION['id_kelas']
        ];
        if ($this->model('model_detail_kelas')->setSiswatoKelas($dataGet) > 0) {
            Flasher::setFlash('Berhasil dimasukkan!', 'success');
            header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
            exit;
        } else {
            Flasher::setFlash('Gagal dimasukkan!', 'danger');
            header('Location: ' . base_url . 'kelas/detail/' . $_SESSION['id_kelas']);
            exit;
        }
    }
}
