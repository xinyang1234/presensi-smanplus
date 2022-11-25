<?php
class model_detail_kelas
{
    protected $tb_kelas = 'tb_kelas';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDetailKelas($id_kelas)
    {
        $this->db->query('SELECT tb_siswa.nis, tb_siswa.nama_siswa,tb_siswa.jenis_kelamin, tb_siswa.tahun_masuk FROM tb_siswa
        WHERE tb_siswa.id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $id_kelas);
        return $this->db->resultSetAssoc();
    }
}
