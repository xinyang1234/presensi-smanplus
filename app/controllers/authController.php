<?php

class authController extends Controller
{
    public function __construct()
    {
        $this->db = new Database;
        $tb_model = $this->model('model_auth_admin');
    }

    public function index()
    {
        if (isset($_SESSION['session_login'])) {
            header('Location: ' . base_url);
        }
        $data['title'] = 'Page';
        $this->view('/auth/login', $data);
    }

    public function login()
    {
        $data['title'] = 'Page';
        $this->view('/auth/login', $data);
    }

    public function admin()
    {
        if (isset($_SESSION['session_id'])) {
            header('Location: ' . base_url . 'home');
        }
        $data['title'] = 'Admin';
        $this->view('/auth/login', $data);
    }

    public function admin_auth()
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // if (isset($_POST['submit'])) {
        //     if (empty($user)) {
        //         Flasher::setFlash('Harap isi Username', 'danger');
        //         header('Location: ' . base_url . 'auth/admin');
        //         exit;
        //     } else if (empty($pass)) {
        //         Flasher::setFlash('Harap isi Password', 'danger');
        //         header('Location: ' . base_url . 'auth/admin');
        //         exit;
        //     } else {
        //         $this->db->query('SELECT * FROM tb_admin WHERE username = :username AND password = :password');
        //         $this->db->bind('username', $user);
        //         $this->db->bind('password', $pass);
        //         $this->db->resultSet();
        //         $count = $this->db->stmt->rowCount();

        //         if ($count > 0) {
        //             // Flasher::setFlash('Berhasil Login', 'success');
        //             $tag = $this->db->stmt->execute();

        //             echo $user['username'];
        //             // header('Location: ' . base_url . 'auth/admin');
        //             // $_SESSION['session_login'] = 'sudah_login';
        //             exit;
        //         } else {
        //             Flasher::setFlash('Username atau Password salah!', 'danger');
        //             header('Location: ' . base_url . 'auth/admin');
        //             exit;
        //         }
        //     }
        // }
        $result = $this->model('model_auth_admin')->getAuth();
        if ($result) {
            // Flasher::setFlash('Berhasil Login' . $_SESSION['username'], 'success');
            // header('Location: ' . base_url . 'auth/admin');
            echo $_SESSION['username'];
        } else {
            Flasher::setFlash('Username atau Password tidak benar!', 'danger');
            header('Location: ' . base_url . 'auth/login');
        }



        // $result = $this->model('model_auth_admin')->getAuth($user, $pass);
        // if ($result == 'login') {
        //     Flasher::setFlash('Berhasil Login', 'success');
        //     header('Location: ' . base_url . 'home');
        //     $_SESSION['session_login'] = 'sudah_login';

        //     exit;
        // } else {
        //     Flasher::setFlash('Username atau Password tidak benar!', 'danger');
        //     header('Location: ' . base_url . 'auth/admin');
        //     exit;
        // }
    }

    public function login_auth()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dataa = [
            'name/email' => trim($_POST['username']),
            'password' => trim($_POST['password'])
        ];

        if (empty($dataa['name/email']) || empty($dataa['password'])) {
            Flasher::setFlash('Harap isi Username dan Password', 'danger');
            header('Location: ' . base_url . 'auth/login');
            exit();
        }

        if ($this->model('model_auth_admin')->findUserByEmailOrUsername($dataa['name/email'], $dataa['name/email'])) {
            $loggedInUser = $this->model('model_auth_admin')->login($dataa['name/email'], $dataa['password']);
            if ($loggedInUser) {
                // echo 'Berhasil Login! <br>';
                // echo 'ID Admin : ' . $loggedInUser->id;
                $_SESSION['session_id'] = $loggedInUser->id;
                $_SESSION['session_username'] = $loggedInUser->username;
                $_SESSION['session_name'] = $loggedInUser->nama_admin;
                $_SESSION['session_email'] = $loggedInUser->email;
                $_SESSION['session_login'] = 'sudah_login';
                $_SESSION['session_type'] = 'admin';
                header('Location: ' . base_url . 'home');
            } else {
                Flasher::setFlash('Username atau Password Salah', 'danger');
                header('Location: ' . base_url . 'auth/login');
                exit();
            }
        } else {
            Flasher::setFlash('Username atau Password Salah', 'danger');
            header('Location: ' . base_url . 'auth/login');
            exit();
        }
    }
    public function logout()
    {
        // if (!isset($_SESSION)) {
        //     session_start();
        // }
        session_destroy();
        Flasher::setFlash('Berhasil Logout', 'success');
        header('Location: ' . base_url . 'auth/login');
        exit;
    }
}
