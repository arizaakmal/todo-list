<?php

// untuk menghubungkan view dan model pada halaman home
class HomeController extends Controller
{
    public function index()
    {
        // Jika belum login, arahkan ke halaman login
        if (!$this->isLoggedIn()) {
            header('Location: ' . BASEURL . '/login');
            exit();
        }


        $data['judul'] = 'Home'; // buat title 
        $user_id = $_SESSION['user_id'];
        $data['tasks'] = $this->model('TugasModel')->getAllTask($user_id); //mengambil data tasks dari db melalui fungsi dari TugasModel
        $data['user'] = null; // Inisialisasi variabel data user

        if (isset($_SESSION['user_id'])) {
            // Jika user_id ada dalam sesi, dapatkan informasi pengguna dari database berdasarkan user_id
            $userId = $_SESSION['user_id'];
            $userModel = $this->model('UserModel');
            $data['user'] = $userModel->getUserById($userId); // mengambil data user dari user_id
        }

        // menampilkan view home
        $this->view('templates/header', $data); //menampilkan view header
        $this->view('partials/navbar', $data); //menampilkan view navbar
        $this->view('home/index', $data); //menampilkan view index
        $this->view('templates/footer'); //menampilkan view footer
    }

    private function isLoggedIn()
    {
        // Cek apakah session user_id sudah terisi
        return isset($_SESSION['user_id']);
    }

    public function hapus($id)
    {
        if ($this->model('TugasModel')->deleteTask($id)) {
            Flasher::setFlash('Task deleted successfully.', '', 'success');
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            Flasher::setFlash('Failed to delete task.', '', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }

    public function tambah()
    {
        if ($this->model('TugasModel')->addTask($_POST) > 0) {
            Flasher::setFlash('Task added successfully.', '', 'success');
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            Flasher::setFlash('Task failed to add.', '', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }

    public function update()
    {

        if ($this->model('TugasModel')->updateTask($_POST) > 0) {
            Flasher::setFlash('Task updated successfully.', '', 'success');
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            Flasher::setFlash('Task failed to update.', '', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }
}
