<?php
session_start();
include __DIR__ . '/../../config/config.php';


// Kiểm tra nếu đã đăng nhập
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin') {
        header('Location: /views/index/admin.php');
    } else {
        header('Location: /views/index/employee.php');
    }
    exit();
}

// Xử lý đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user;

        if ($user['role'] == 'admin') {
            header('Location: /views/index/admin.php');
        } else {
            header('Location: /views/index/employee.php');
        }
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
        header('Location: /views/login/login.php?error=' . urlencode($error));
    }
    exit();
}
?>
