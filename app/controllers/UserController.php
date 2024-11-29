<?php
class UserController
{
    public function index()
    {
        session_start();

        // Validasi role
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }

        // Tampilkan halaman user
        require 'app/views/user/dashboard.php';
    }
}
