<?php
class DashboardController extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'controllers/AuthController');
            exit();
        }

        $this->view('dashboard', ['user' => $_SESSION['user']]);
    }
}
