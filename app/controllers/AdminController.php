<?php
class AdminController
{
    public function index()
    {
        session_start();

        // Validasi role
        if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASE_URL . 'auth/login');
            exit();
        }

        // Tampilkan halaman admin
        require 'app/views/admin/dashboard.php';
    }
}
