<?php
class AuthController
{
    public function index()
    {
        // Tampilkan halaman login sebagai halaman default
        include '../app/views/auth/login.php';
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            $user = $userModel->login($_POST['username'], $_POST['password']);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = $user['role_name'];  // Menyimpan role di session

                // Redirect berdasarkan role
                if ($_SESSION['role'] === 'Admin') {
                    header('Location: ' . BASE_URL . 'app/views/admin/dashboard.php');
                } elseif ($_SESSION['role'] === 'Mahasiswa') {
                    header('Location: ' . BASE_URL . 'app/views/user/dashboard');
                } else {
                    echo "Invalid role.";
                }
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            include '../app/views/auth/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'auth/login');
        exit();
    }
}
