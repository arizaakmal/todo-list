<?php

class RegisterController extends Controller
{
    public function index()
    {
        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function process()
    {
        // Cek jika form registrasi telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Lakukan validasi keunikan email di sini
            $result = $this->model('UserModel')->getUserByEmail($email);

            if ($result) {
                // Email sudah ada dalam database
                Flasher::setFlash('Email is already taken.', 'Please choose a different one.', 'danger');

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
