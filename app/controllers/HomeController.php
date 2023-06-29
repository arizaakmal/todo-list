<?php

class HomeController extends Controller
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            // Jika belum login, arahkan ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit();
        }

        $data['judul'] = 'Home';
        $user_id = $_SESSION['user_id'];
        $data['tasks'] = $this->model('TugasModel')->getAllTask($user_id);
        $data['user'] = null; // Inisialisasi variabel user

        if (isset($_SESSION['user_id'])) {
            // Jika user_id ada dalam sesi, dapatkan informasi pengguna dari database berdasarkan user_id
            $userId = $_SESSION['user_id'];
            $userModel = $this->model('UserModel');
            $data['user'] = $userModel->getUserById($userId); // Ganti getUserById dengan metode yang sesuai pada model Anda
        }





        $this->view('templates/header', $data);
        $this->view('partials/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    private function isLoggedIn()
    {
        // Cek apakah session user_id sudah terisi
        return isset($_SESSION['user_id']);
    }

    public function hapus($id)
    {
        var_dump($id);
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
