<?php
class App
{
    protected $controller = 'AuthController'; // Default controller
    protected $method = 'index'; // Default method
    protected $params = []; // URL parameters

    public function __construct()
    {
        // Parsing URL
        $url = $this->parseUrl();

        // Set Controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Memuat Controller
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Set Method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Set Parameters
        $this->params = $url ? array_values($url) : [];

        // Eksekusi Controller dan Method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Fungsi untuk memparse URL
    public function parseUrl()
    {
        // Mengambil dan memecah URL dari parameter 'url' dalam GET
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['AuthController']; // Default controller jika URL tidak ada
    }
}
