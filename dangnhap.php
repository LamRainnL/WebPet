<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập</title>
</head>
<body>
  <h1>Đăng nhập</h1>
  <form action="xulydangnhap.php" method="POST">
    <label for="username">Tài khoản:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" name="submit" value="Đăng nhập">
  </form>
</body>
</html>