<?php

class model_guru
{

    protected $table = 'tb_guru';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGuru()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSetAssoc();
    }

    public function getGurubyNuptk($data)
    {
        $this->db->query("SELECT nuptk, nama_guru, tempat_lahir, tgl_lahir, alamat_guru, notelp_guru, status_kepegawaian 
        FROM " . $this->table . " WHERE " . $this->table . ".nuptk = :nuptk");
        $this->db->bind('nuptk', $data);
        $this->db->execute();
        return $this->db->single();
    }

    public function insertDataGuru($data)
    {
        $this->db->query("INSERT INTO `tb_guru`(`nuptk`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `alamat_guru`, `notelp_guru`, `password`, `email`, `status_kepegawaian`) 
        VALUES (:nuptk, :nama, :tempat_lahir, :tgl_lahir, :alamat, :notelp, '" . password_hash($data['nuptk'], PASSWORD_BCRYPT) . "', '', :status)");
        $this->db->bind('nuptk', $data['nuptk']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('notelp', $data['notelp']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataGuru($data)
    {

        $this->db->query("UPDATE `tb_guru` 
        SET `nuptk`= :nuptk,
        `nama_guru`= :nama,
        `tempat_lahir`= :tempat_lahir,
        `tgl_lahir`= :tgl_lahir,
        `alamat_guru`= :alamat,
        `notelp_guru`= :telepon,
        `status_kepegawaian`= :status 
        WHERE tb_guru.nuptk = :nuptk");
        $this->db->bind('nuptk', $data['nuptk']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus_guru($data)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE nuptk = :nuptk");
        $this->db->bind('nuptk', $data['nuptk']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
