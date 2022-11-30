<?php

class model_tahun_ajaran
{
    protected $table = 'tb_tahun_ajaran';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTahunAjaran()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSetAssoc();
    }
    public function getOneTahunAjaran($id_tahun_ajaran)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ' . $this->table . '.id_tahun_ajaran = :id_tahun_ajaran');
        $this->db->bind('id_tahun_ajaran', $id_tahun_ajaran);
        return $this->db->single();
    }

    public function insertTahunAjaran($data)
    {
        $this->db->query('INSERT INTO `tb_tahun_ajaran`(`id_tahun_ajaran`, `tahun_ajaran`, `isActive`) VALUES (\'\', :tahun_ajaran, :isActive)');
        $this->db->bind('tahun_ajaran', $data['new_tahun_ajaran']);
        $this->db->bind('isActive', 0);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateTahunAjaran($data)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET ' . $this->table . '.tahun_ajaran = :tahun_ajaran WHERE ' . $this->table . '.id_tahun_ajaran = :id_tahun_ajaran');
        $this->db->bind('tahun_ajaran', $data['new_tahun_ajaran']);
        $this->db->bind('id_tahun_ajaran', $data['id_tahun_ajaran']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function resetActiveTahun()
    {
        $this->db->query('UPDATE ' . $this->table . ' SET ' . $this->table . '.isActive = :actived');
        $this->db->bind('actived', 0);
        $this->db->execute();
        return true;
    }
    public function setActiveTahun($id_kelas)
    {

        $this->db->query('UPDATE ' . $this->table . ' SET ' . $this->table . '.isActive = :active WHERE ' . $this->table . '.id_tahun_ajaran = :id_tahun_ajaran');
        $this->db->bind('active', 1);
        $this->db->bind('id_tahun_ajaran', $id_kelas);
        $this->db->execute();
        return true;
    }

    public function getActivatedTahunAjaran()
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE isActive = :active");
        $this->db->bind("active", 1);
        return $this->db->single();
    }
}
