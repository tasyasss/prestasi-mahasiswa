<?php
// public/index.php
require '../config/config.php';  // Pastikan ini ditambahkan di bagian atas
require '../config/database.php';
require '../app/models/UserModel.php';
require '../app/controllers/AuthController.php';
require '../app/controllers/AdminController.php';
require '../app/controllers/UserController.php';

// Proses routing
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

switch ($page) {
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'admin':
        $controller = new AdminController();
        $controller->index();
        break;
    case 'user':
        $controller = new UserController();
        $controller->index();
        break;
    default:
        echo "404 Page Not Found";
        break;
}
