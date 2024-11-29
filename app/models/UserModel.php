<?php
class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();  // Koneksi database
    }

    // Fungsi untuk login dan ambil role berdasarkan username
    public function login($username, $password)
    {
        $query = "
            SELECT u.id, u.username, u.password, r.role_name 
            FROM users u
            JOIN roles r ON u.role_id = r.id
            WHERE u.username = ?"; // Menggunakan parameterized query

        // Menyiapkan query
        $stmt = sqlsrv_prepare($this->db, $query, [$username]);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true)); // Debug jika query gagal
        }

        // Menjalankan query
        if (sqlsrv_execute($stmt) === false) {
            die(print_r(sqlsrv_errors(), true)); // Debug jika eksekusi gagal
        }

        // Mengambil data hasil query
        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        // Verifikasi password jika data ditemukan
        if ($user) {
            // Cek apakah password sesuai dengan yang disimpan di database
            if (password_verify($password, $user['password'])) {
                return $user; // Kembalikan data user beserta role-nya
            } else {
                return null; // Password tidak cocok
            }
        }

        return null; // Pengguna tidak ditemukan
    }
}
