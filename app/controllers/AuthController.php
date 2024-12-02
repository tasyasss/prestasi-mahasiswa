<?php
// app/controllers/AuthController.php

class AuthController extends Controller
{

    public function login()
    {
        // Cek jika form login sudah disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Menggunakan model UserModel untuk cek user berdasarkan username
            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            // Validasi password dan login
            if ($user && password_verify($password, $user['password'])) {
                // Jika password cocok, simpan session dan arahkan ke dashboard
                $_SESSION['user'] = $user;
                $_SESSION['role'] = $user['role_name'];
                header("Location: " . BASE_URL . "/dashboard");
                exit;
            } else {
                // Jika username atau password salah
                $this->view('auth/login', ['error' => 'Username atau Password salah']);
            }
        } else {
            // Jika form belum disubmit, tampilkan halaman login
            $this->view('auth/login');
        }
    }

    public function logout()
    {
        // Hapus session untuk logout
        session_destroy();
        header("Location: " . BASE_URL . "/login");
        exit;
    }
}
