<?php

class model_auth_admin
{
    protected $tb_admin = 'tb_admin';
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAuth()
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $this->db->query('SELECT * FROM ' . $this->tb_admin . ' WHERE username = :username AND password = :password');
        $this->db->bind('username', $user);
        $this->db->bind('password', $pass);
        $this->db->rowCounting();
        if ($this->db->rowCounting() > 0) {
            return 'login';
        } else {
            return false;
        }
        // $this->db->resultSet();



        // if ($user == 'admin' && $pass == 'admin') {
        //     return 'login';
        // } else {
        //     return 'invalid user';
        // }
    }

    public function findUserByEmailOrUsername($email, $username)
    {
        $this->db->query('SELECT * FROM ' . $this->tb_admin . ' WHERE username = :username OR email = :email');
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function login($nameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if ($row == false) {
            return false;
        }

        $hashedPassword = $row->password;
        if ($password == $hashedPassword) {
            return $row;
        } else {
            return false;
        }
    }
}
