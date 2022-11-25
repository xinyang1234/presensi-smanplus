<?php

class model_kelas
{
    protected $tb_admin = 'tb_kelas';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $this->db->query('SELECT tb_kelas.id_kelas, tb_kelas.nama_kelas, COUNT(tb_siswa.nis) AS jumlah_siswa FROM tb_kelas
        LEFT JOIN tb_siswa
        ON tb_kelas.id_kelas = tb_siswa.id_kelas
        GROUP BY tb_kelas.id_kelas');
        return $this->db->resultSetAssoc();
    }
    public function insertKelas($data)
    {
        $this->db->query('INSERT INTO `tb_kelas`(`id_kelas`, `nama_kelas`) VALUES (\'\',:kelas)');
        $this->db->bind('kelas', $data['kelas']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateKelas($data)
    {
        $this->db->query('UPDATE `tb_kelas` SET `nama_kelas`= :nama_kelas WHERE tb_kelas.id_kelas = :id_kelas');
        $this->db->bind('nama_kelas', $data['kelas']);
        $this->db->bind('', $data['kelas']);
    }
}
