<?php
// app/models/UserModel.php

class UserModel
{
    // Fungsi untuk mencari user berdasarkan username
    public function getUserByUsername($username)
    {
        global $conn; // Menggunakan koneksi dari config/database.php

        // Query untuk mendapatkan data user berdasarkan username
        $sql = "SELECT u.username, u.password, u.role_id, r.role_name
                FROM users u
                INNER JOIN roles r ON u.role_id = r.role_id
                WHERE u.username = ?";

        $params = array($username);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        return $user ? $user : null; // Mengembalikan data user jika ditemukan, jika tidak null
    }
}
