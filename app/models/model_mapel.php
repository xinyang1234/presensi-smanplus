<?php
class model_mapel
{

    protected $db;
    protected $table = 'tb_mapel';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMapel()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSetAssoc();
    }

    public function insertDataMapel($data)
    {
        $this->db->query("INSERT INTO `tb_mapel`(`id_mapel`, `nama_mapel`) VALUES ('', :nama_mapel)");
        $this->db->bind('nama_mapel', $data['mapel']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
