<?php

class model_kelas
{
    protected $tb_kelas = 'tb_kelas';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas($data)
    {
        $this->db->query('SELECT tb_kelas.id_kelas, tb_kelas.nama_kelas, COUNT(tb_siswa.nis) AS jumlah_siswa FROM tb_kelas
        LEFT JOIN tb_siswa
        ON tb_kelas.id_kelas = tb_siswa.id_kelas
        WHERE tb_kelas.id_tahun_ajaran = :id_tahun_ajaran
        GROUP BY tb_kelas.id_kelas');
        $this->db->bind('id_tahun_ajaran', $data);
        return $this->db->resultSetAssoc();
    }
    public function insertKelas($data)
    {
        $this->db->query('INSERT INTO `tb_kelas`(`id_kelas`, `nama_kelas`, `id_tahun_ajaran`) VALUES (\'\',:kelas, :id_tahun_ajaran)');
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('id_tahun_ajaran', $data['id_tahun_ajaran']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateKelas($data)
    {
        $this->db->query('UPDATE `tb_kelas` SET `nama_kelas`= :nama_kelas WHERE tb_kelas.id_kelas = :id_kelas');
        $this->db->bind('nama_kelas', $data['kelas']);
        $this->db->bind('', $data['kelas']);
    }

    public function ubahKelas($data)
    {
        $this->db->query('UPDATE tb_kelas SET nama_kelas = :nama_kelas WHERE id_kelas = :id_kelas');
        $this->db->bind('nama_kelas', $data['kelas']);
        $this->db->bind('id_kelas', $data['id_kelas']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataUbahKelas($data)
    {
        $this->db->query('SELECT * FROM ' . $this->tb_kelas . ' WHERE id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $data);
        return $this->db->single();
    }
}
