<?php
class model_detail_kelas
{
    protected $tb_kelas = 'tb_kelas';
    protected $tablesiswa = 'tb_siswa';
    protected $tb_ajaran = 'tb_tahun_ajaran';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getIdKelas($idKelas)
    {
        $this->db->query('SELECT * FROM tb_kelas WHERE id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $idKelas);
        return $this->db->singleAssoc();
    }

    public function getAllDetailKelas($id_kelas)
    {
        $this->db->query('SELECT tb_siswa.nis, tb_siswa.nama_siswa,tb_siswa.jenis_kelamin FROM tb_siswa
        WHERE tb_siswa.id_kelas = :id_kelas');
        $this->db->bind('id_kelas', $id_kelas);
        return $this->db->resultSetAssoc();
    }

    public function getAllSiswaTambah()
    {
        $this->db->query("SELECT * FROM tb_siswa ORDER BY tb_siswa.nama_siswa ASC");
        $this->db->execute();
        return $this->db->resultSetAssoc();
    }

    public function getAllTahunAjaran()
    {
        $this->db->query('SELECT * FROM ' . $this->tb_ajaran . ' ORDER BY tb_tahun_ajaran.tahun_ajaran DESC');
        return $this->db->resultSetAssoc();
    }

    public function insertDataSiswa($data)
    {
        $this->db->query("INSERT INTO `tb_siswa`(`nis`, `email`, `password`, `id_kelas`, `nama_siswa`, `alamat_siswa`, `notelp_siswa`, `jenis_kelamin`, `tgl_lahir`, `foto_profil`, `id_tahun_ajaran`, `tahun_masuk`, `isLogin`, `otp`, `otp_expired`, `deviceId`) 
        VALUES (:nis, '', '" . password_hash($data['dataTambahSiswa']['nis'], PASSWORD_BCRYPT) . "', :id_kelas, :nama_siswa, :alamat_siswa, :notelp_siswa, :jk,'','', :id_tahun_ajaran, :tahun_masuk,'','','','')");
        $this->db->bind('nis', $data['dataTambahSiswa']['nis']);
        $this->db->bind('id_kelas', $data['dataTambahSiswa']['id_kelas']);
        $this->db->bind('nama_siswa', $data['dataTambahSiswa']['nama']);
        $this->db->bind('alamat_siswa', $data['dataTambahSiswa']['alamat']);
        $this->db->bind('notelp_siswa', $data['dataTambahSiswa']['telepon']);
        $this->db->bind('jk', $data['dataTambahSiswa']['radio']);
        $this->db->bind('id_tahun_ajaran', $data['dataTambahSiswa']['tahun_ajaran']);
        $this->db->bind('tahun_masuk', $data['dataTambahSiswa']['tahun_masuk']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getSiswaById($data)
    {
        $this->db->query("SELECT * FROM tb_siswa WHERE tb_siswa.nis = :nis");
        $this->db->bind('nis', $data);
        return $this->db->single();
    }

    public function updateDataSiswa($data)
    {
        $queryUpdate = "UPDATE `tb_siswa` SET 
        `nis`= :nis,
        `nama_siswa`= :nama_siswa,
        `alamat_siswa`= :alamat_siswa,
        `notelp_siswa`= :notelp_siswa,
        `jenis_kelamin`= :jenis_kelamin,
        `id_tahun_ajaran`= :id_tahun_ajaran,
        `tahun_masuk`= :tahun_masuk WHERE tb_siswa.nis = ':nis'";
        $this->db->query("UPDATE `tb_siswa` SET 
        `nis`= :nis,
        `nama_siswa`= :nama_siswa,
        `alamat_siswa`= :alamat_siswa,
        `notelp_siswa`= :notelp_siswa,
        `jenis_kelamin`= :jenis_kelamin,
        `id_tahun_ajaran`= :id_tahun_ajaran,
        `tahun_masuk`= :tahun_masuk WHERE tb_siswa.nis = :nis");
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('nama_siswa', $data['nama']);
        $this->db->bind('alamat_siswa', $data['alamat']);
        $this->db->bind('notelp_siswa', $data['telepon']);
        $this->db->bind('jenis_kelamin', $data['jk']);
        $this->db->bind('id_tahun_ajaran', $data['tahun_ajaran']);
        $this->db->bind('tahun_masuk', $data['tahun_masuk']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteDataSiswa($data)
    {
        $this->db->query('DELETE FROM ' . $this->tablesiswa . ' WHERE ' . $this->tablesiswa . '.nis = :nis');
        $this->db->bind('nis', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function setSiswatoKelas($data)
    {
        $this->db->query("UPDATE " . $this->tablesiswa . " SET " . $this->tablesiswa . ".id_kelas = :id_kelas WHERE tb_siswa.nis = :nis");
        $this->db->bind("id_kelas", $data['id_kelas']);
        $this->db->bind("nis", $data['nis']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteSiswafromKelas($data)
    {
        $this->db->query("UPDATE " . $this->tablesiswa . " SET " . $this->tablesiswa . ".id_kelas = :id_kelas WHERE tb_siswa.nis = :nis");
        $this->db->bind("id_kelas", 0);
        $this->db->bind("nis", $data);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
