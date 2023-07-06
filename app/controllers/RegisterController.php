<?php

class RegisterController extends Controller
{
    public function index()
    {
        if ($this->isLoggedIn()) {
            // Jika sudah, redirect ke halaman dashboard atau halaman lain yang sesuai
            header('Location: ' . BASEURL . '/home');
            exit;
        }

        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function isLoggedIn()
    {

        return isset($_SESSION['email']);
    }

    public function process()
    {
        // Cek jika form registrasi telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validasi username
            if (strlen($username) < 3) {
                Flasher::setFlash('Weak username.', 'Username should be at least 5 characters long.', 'danger');
                header('Location: ' . BASEURL . '/register');
                exit();
            }

            // Lakukan validasi keunikan username
            $usernameResult = $this->model('UserModel')->getUserByUsername($username);

            // Validasi email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Flasher::setFlash('Invalid email format.', 'Please enter a valid email address.', 'danger');
                header('Location: ' . BASEURL . '/register');
                exit();
            }

            // Lakukan validasi keunikan email
            $emailResult = $this->model('UserModel')->getUserByEmail($email);

            // Validasi panjang password
            if (strlen($password) < 5) {
                Flasher::setFlash('Weak password.', 'Password should be at least 5 characters long.', 'danger');
                header('Location: ' . BASEURL . '/register');
                exit();
            }




            if ($emailResult) {
                // Email sudah ada dalam database
                Flasher::setFlash('Email is already taken.', 'Please choose a different one.', 'danger');

                header('Location: ' . BASEURL . '/register');
                exit();
            } elseif ($usernameResult) {
                // Username sudah ada dalam database
                Flasher::setFlash('Username is already taken.', 'Please choose a different one.', 'danger');

                header('Location: ' . BASEURL . '/register');
                exit();
            } else {
                // Simpan data registrasi ke database
                $this->model('UserModel')->register($username, $email, $password);

                // Set pesan flash sukses
                Flasher::setFlash('Registration successful!', 'You can now log in.', 'success');
                header('Location: ' . BASEURL . '/login');
                exit();
            }
        }
    }
}
