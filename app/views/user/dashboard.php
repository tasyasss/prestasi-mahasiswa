<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?= $_SESSION['user']; ?></h1>
        <p>This is the user dashboard.</p>
        <a href="<?= BASE_URL; ?>auth/logout">Logout</a>
    </div>
    <script src="<?php echo BASE_URL; ?>public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
