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
        $data['tasks'] = $this->model('TugasModel')->getAllTask();
        $data['user'] = null;

        if (isset($_SESSION['email'])) {
            $data['user'] = $this->model('UserModel')->getUserByEmail($_SESSION['email']);
        }


        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    private function isLoggedIn()
    {
        // Cek apakah session email sudah terisi
        return isset($_SESSION['email']);
    }

    public function hapus($id)
    {
        var_dump($id);
        if ($this->model('TugasModel')->deleteTask($id)) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/home');
            exit();
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit();
        }
    }
}
