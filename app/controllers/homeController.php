<?php

class homeController extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setFlash('Harap Login terlebih dahulu', 'danger');
            header('location: ' . base_url . 'auth/login');
            exit;
        }
    }

    /**
     * 
     * @return void
     *
     * method yang mengarahkan ke halaman home
     * apabila session tidak ada maka akan di redirect ke halaman login
     *
     */
    public function index()
    {
        $data['title'] = 'Dashboard';
        // $hadir = count(DetailPresensi::where('status_kehadiran','=','hadir')->get());
        // $izin = count(DetailPresensi::where('status_kehadiran', '=', 'izin')->get());
        // $sakit = count(DetailPresensi::where('status_kehadiran', '=', 'sakit')->get());
        // $alpha = count(Siswa::join('tb_detail_presensi', 'tb_siswa.nis', '=', 'tb_detail_presensi.nis')->get());
        // $data['presensi'] = array($hadir, $izin, $sakit, $alpha);
        // $data['informasi'] = InformasiAkademik::all();
        // $data['informasi'] = $data['informasi']->sortByDesc('created_at');
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('beranda', $data);
        $this->view('templates/footer');
    }
}
