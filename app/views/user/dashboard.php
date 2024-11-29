<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Welcome, User</h1>
        <p>Ini adalah dashboard pengguna. Anda dapat melihat profil Anda dan melakukan pengaturan di sini.</p>

        <a href="<?= BASE_URL ?>auth/logout" class="btn btn-danger">Logout</a>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>