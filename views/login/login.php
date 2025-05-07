<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>
    <form action="/modules/login/login.php" method="post">
        <input type="text" name="username" placeholder="Tên đăng nhập" required><br><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
