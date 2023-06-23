<?php

class HomeController extends Controller
{
    public function index()
    {
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
}
