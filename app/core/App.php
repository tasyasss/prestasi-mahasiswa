<?php
// app/core/App.php

class App
{
    protected $controller = 'AuthController'; // Default controller
    protected $method = 'login'; // Default method
    protected $params = [];

    public function __construct()
    {
        session_start();
        $url = $this->parseUrl();

        // Cek apakah ada elemen di dalam URL, jika tidak set controller dan method default
        if (!empty($url) && file_exists(__DIR__ . '/../controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]); // Pastikan nama controller dengan huruf besar pertama
            unset($url[0]);
        } else {
            $this->controller = 'AuthController'; // Default controller
        }
        require_once __DIR__ . '/../controllers/' . $this->controller . '.php';
        $controllerObj = new $this->controller();

        // Cek apakah method yang dipanggil ada di dalam controller
        if (isset($url[1]) && method_exists($controllerObj, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Set parameters jika ada
        $this->params = !empty($url) ? array_values($url) : [];

        // Eksekusi method controller dengan parameter jika ada
        call_user_func_array([$controllerObj, $this->method], $this->params);
    }

    // Fungsi untuk memparsing URL
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Menghapus karakter yang tidak diinginkan pada URL
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
