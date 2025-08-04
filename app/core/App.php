<?php

class App
{
    protected $controller = 'HomeController'; // Default controller
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // Pastikan session sudah dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $url = $this->parseURL();

        // Controller
        if (empty($url)) {
            $url[0] = $this->controller;
        } else {
            $controllerName = ucfirst($url[0]) . 'Controller';
            // Validasi nama controller untuk mencegah path traversal
            $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';
            if (
                preg_match('/^[a-zA-Z][a-zA-Z0-9_]*Controller$/', $controllerName) &&
                file_exists($controllerPath)
            ) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        // Pastikan controller file ada sebelum require
        $controllerPath = __DIR__ . '/../controllers/' . $this->controller . '.php';
        if (!file_exists($controllerPath)) {
            // Fallback ke default controller
            $this->controller = 'HomeController';
            $controllerPath = __DIR__ . '/../controllers/' . $this->controller . '.php';
        }

        require_once $controllerPath;
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } else if (isset($url[1])) {
            // Jika method tidak ada, fallback ke method default
            $this->method = 'index';
        }

        $this->params = $url ? array_values($url) : [];

        // Middleware redirect
        $currentUrl = $_SERVER['REQUEST_URI'];

        // Dapatkan base path dari BASEURL untuk routing yang dinamis
        $parsedBaseUrl = parse_url(BASEURL);
        $basePath = isset($parsedBaseUrl['path']) ? rtrim($parsedBaseUrl['path'], '/') : '';

        if (!isset($_SESSION['user_id'])) {
            // Jika belum login dan bukan di halaman login/register, redirect ke login
            if (!preg_match('#^' . preg_quote($basePath, '#') . '/(login|register)#', $currentUrl)) {
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        } else {
            // Jika sudah login dan mencoba akses /login atau /register, arahkan ke /home
            if (preg_match('#^' . preg_quote($basePath, '#') . '/(login|register)#', $currentUrl)) {
                header('Location: ' . BASEURL . '/home');
                exit;
            }
        }

        // Panggil method controller dengan error handling
        try {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (Exception $e) {
            // Log error dan tampilkan halaman error yang user-friendly
            error_log("App Error: " . $e->getMessage());
            // Fallback ke home jika terjadi error
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }


    // Method untuk memecah URL
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        } else {
            return [];
        }
    }
}
