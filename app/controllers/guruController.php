<?php

class guruController extends Controller
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

        $data['guru'] = $this->model('model_guru')->getAllGuru();
        $data['title'] = 'Guru';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('guru/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah_guru()
    {
        if (!isset($_POST['tambah'])) {
            header('Location: ' . base_url . 'guru');
            exit;
        }

        $row = [
            'nuptk' => $_POST['nuptk'],
            'nama' => $_POST['nama'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'alamat' => $_POST['alamat'],
            'notelp' => $_POST['telepon'],
            'status' => $_POST['status']
        ];
        if (isset($_POST['tambah'])) {
            if ($this->model('model_guru')->insertDataGuru($row) > 0) {
                Flasher::setFlash('Berhasil ditambahkan!', 'success');
                header('Location: ' . base_url . 'guru');
                exit;
            }
        }
    }
    public function get_nuptk()
    {
        echo json_encode($this->model('model_guru')->getGurubyNuptk($_POST['nuptk']));
    }

    public function ubah_guru()
    {

        if (!isset($_POST['tambah'])) {
            header('location: ' . base_url . 'guru');
            exit();
        }
        $getdata = [
            'nuptk' => $_POST['nuptk'],
            'nama' => $_POST['nama'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'tgl_lahir' => $_POST['tgl_lahir'],
            'telepon' => $_POST['telepon'],
            'status' => $_POST['status'],
            'alamat' => $_POST['alamat']
        ];

        if ($this->model('model_guru')->updateDataGuru($getdata) > 0) {
            Flasher::setFlash('Berhasil diubah!', 'success');
            header('Location: ' . base_url . 'guru');
            exit();
        }
        // header('Content-Type: application/json');
        // echo json_encode($getdata, JSON_PRETTY_PRINT);
    }

    public function hapus_guru()
    {
        if (!isset($_POST['button_hapus'])) {
            header('Location: ' . base_url . 'guru');
            exit();
        }
        $getData = [
            'nuptk' => $_POST['get-nuptk-hapus']
        ];

        // echo json_encode($getData);
        if ($this->model('model_guru')->hapus_guru($getData) > 0) {
            Flasher::setFlash('Berhasil dihapus', 'success');
            header('location: ' . base_url . 'guru');
            exit();
        } else {
            Flasher::setFlash('Gagal dihapus', 'danger');
            header('location: ' . base_url . 'guru');
            exit();
        }
    }
}
