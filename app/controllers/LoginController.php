<?php

class LoginController extends Controller
{
   
    public function index()
    {
        // Cek cookie
        if (isset($_COOKIE['remember_me']) && !isset($_SESSION['user_id'])) {
            $userId = $_COOKIE['remember_me'];
            
            // Validasi ID di database
            $user = $this->model('UserModel')->getUserById($userId);
            
            if ($user) {
                $_SESSION['user_id'] = $userId;
                header('Location: ' . BASEURL . '/home');
                exit;
            } else {
                // Hapus cookie jika user tidak ditemukan
                setcookie('remember_me', '', time() - 3600, '/');
            }
        }
        
    
        // Cek jika pengguna sudah login
        if ($this->isLoggedIn()) {
            // Jika sudah login, pastikan tidak redirect ke halaman login
            if (strpos($_SERVER['REQUEST_URI'], '/login') !== false) {
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }
    
        $data['judul'] = 'Login';
        // Jika belum login, tampilkan halaman login
        $this->view('templates/header', $data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function isLoggedIn()
    {

        return isset($_SESSION['user_id']);
    }



    public function process()
    {
        // Cek jika form login telah disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Koneksi ke database
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // Periksa koneksi ke database
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query untuk memeriksa kecocokan email dan password di database
            $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $query->bind_param("s", $email);
            $query->execute();
            $result = $query->get_result();

            // Periksa apakah data pengguna ditemukan
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Periksa kecocokan password dengan password di database
                if (password_verify($password, $row['password'])) {
                    // Simpan informasi pengguna ke session
                    $_SESSION['user_id'] =  $row['id'];

                    // Memeriksa apakah kotak centang "Remember Me" dicentang
                    if (isset($_POST['remember'])) {
                        // Mengatur cookie dengan nama 'remember_me' dengan nilai id pengguna
                        setcookie('remember_me', $row['id'], time() + (86400 * 30), '/'); // Cookie berlaku selama 30 hari (30 * 86400 detik)
                    } else {
                        // Menghapus cookie 'remember_me'
                        setcookie('remember_me', '', time() - 3600, '/');
                    }

                    // Redirect ke halaman setelah login berhasil
                    header('Location: ' . BASEURL . '/home');
                    exit;
                } else {
                    // Jika password tidak cocok, tampilkan pesan error
                    // echo "Password not match.";
                    Flasher::setFlash('Email or password is incorrect.', 'Please try again.', 'danger');
                    header('Location: ' . BASEURL . '/login');
                }
            } else {
                // Jika email tidak ditemukan, tampilkan pesan error
                // echo "Email not found.";
                Flasher::setFlash('Email or password is incorrect.', 'Please try again.', 'danger');
                header('Location: ' . BASEURL . '/login');
            }

            // Tutup koneksi ke database
            $conn->close();
        }
    }


    public function logout()
    {
        session_start();

        // Hapus semua data session
        session_unset();

        // Hancurkan session
        session_destroy();

        // Hapus cookie 'remember_me'
        setcookie('remember_me', '', time() - 3600, '/');


        // Redirect ke halaman login setelah logout berhasil
        header('Location: ' . BASEURL . '/login');

        exit;
    }
}
