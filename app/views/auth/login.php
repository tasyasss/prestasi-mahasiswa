<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">
</head>
<style>

</style>

<body>
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <h5 class="card-title text-center mb-5">Login</h5>
            <form id="loginForm" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <!-- Tempat untuk menampilkan pesan error atau sukses -->
            <div id="loginMessage"></div>

            <!-- Tambahkan jQuery -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah form submit tradisional

                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    url: '<?= BASE_URL ?>app/controllers/AuthController.php', // URL untuk memproses login
                    type: 'POST',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(response) {
                        // Jika login berhasil, arahkan berdasarkan role
                        if (response === 'admin') {
                            window.location.href = '<?= BASE_URL ?>app/views/admin/dashboard';
                        } else if (response === 'mahasiswa') {
                            window.location.href = '<?= BASE_URL ?>app/views/user/dashboard';
                        } else {
                            $('#loginMessage').html('<div class="alert alert-danger">Invalid username or password.</div>');
                        }
                    },
                    error: function() {
                        $('#loginMessage').html('<div class="alert alert-danger">Error occurred while processing your request.</div>');
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>