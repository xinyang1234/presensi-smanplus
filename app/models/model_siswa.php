<?php

class model_siswa
{
    protected $table = 'tb_siswa';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->query('SELECT * FROM tb_siswa ORDER BY tb_siswa.nama_siswa ASC ');
        return $this->db->resultSetAssoc();
    }
    public function getCountSiswa()
    {
        $this->db->query("SELECT * FROM tb_siswa");
        return $this->db->rowCounting();
    }

    public function insertSiswa($data)
    {
        $pw = password_hash($data['nis'], PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO `tb_siswa`(`nis`, `email`, `password`, `id_kelas`, `nama_siswa`, `alamat_siswa`, `notelp_siswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `foto_profil`, `isLogin`, `otp`, `otp_expired`, `deviceId`) 
        VALUES (:nis,'', '" . $pw . "', '', :nama, :alamat, :telepon, :jk, :tempat_lahir, :tgl_lahir,'','','','','')");
        $this->db->bind("nis", $data['nis']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("telepon", $data['telepon']);
        $this->db->bind("jk", $data['jk']);
        $this->db->bind("tempat_lahir", $data['tempat_lahir']);
        $this->db->bind("tgl_lahir", $data['tgl_lahir']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getSiswaById($data)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE " . $this->table . ".nis = :nis");
        $this->db->bind("nis", $data);
        return $this->db->single();
    }

    public function updateSiswa($data)
    {
        $this->db->query("UPDATE " . $this->table . " SET nis = :nis, nama_siswa = :nama, alamat_siswa = :alamat, notelp_siswa = :telepon, jenis_kelamin = :jk, tempat_lahir = :tempat_lahir, tgl_lahir = :tgl_lahir WHERE nis = :nis");
        $this->db->bind("nis", $data['get_nis']);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("alamat", $data['alamat']);
        $this->db->bind("telepon", $data['telepon']);
        $this->db->bind("jk", $data['radioDemo']);
        $this->db->bind("tempat_lahir", $data['tempat_lahir']);
        $this->db->bind("tgl_lahir", $data['tgl_lahir']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusSiswa($data)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE nis = :nis");
        $this->db->bind("nis", $data);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
