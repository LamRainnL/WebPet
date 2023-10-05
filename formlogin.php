<?php
session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.getElementById("toggle-password");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      }
    }

  </script>
  <style>
    .login-form {
      max-width: 350px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 1);
    }

    .img-container {
      position: relative;
      text-align: center;
    }

    h2 {
      font-size: 25px;
      font-weight: bold;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .remember {
      display: contents;
    }

    input[type="text"],
    input[type="password"] {
      width: 94%;
      padding: 12px;
      border-radius: 15px;
      border: none;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      background-color: #f0fff0;
      background-position: calc(100% - 10px) center;
      /* 10px là kích thước icon */
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;

    }

    input[type="submit"]:hover {
      background-color: #45a049;

    }

    .login-form::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom right, #8dee95, rgba(1, 87, 155, 0.95));
      z-index: -1;
    }

    .change {
      font-style: italic;
      text-align: right;
    }

    .change a {
      color: black;
    }

    /* CSS để thiết lập vị trí của biểu tượng hiển thị/ẩn mật khẩu */
    #toggle-password {
      position: absolute;
      right: 10px;
      top: 55%;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div>
    <a href="trangchu.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>
    </a>
  </div>
  <form class="login-form" action="xulylogin.php" method="POST">
    <div class="img-container">
      <h2>Đăng nhập</h2>
    </div>
    <div style="position: relative;">
      <i class="fa fa-user-circle" aria-hidden="true"></i>
      <input type="text" id="username" name="username"
        required><!--`required` để đảm bảo rằng người dùng phải điền vào ô này trước khi đăng nhập. -->
    </div>

    <div style="position: relative;">
      <i class="fa fa-lock" aria-hidden="true"></i>
      <input type="password" id="password" name="password" required>
      <i class="far fa-eye-slash" id="toggle-password" onclick="togglePassword()"></i>
    </div>
    <div class="dangnhap" align="center">
      <input type="submit" id="submit" value="Đăng nhập" name="submit">
    </div>
    <div class="change">
      <a href="formdoimk.php"><label>Đổi mật khẩu</label></a>
    </div>
  </form>
</body>

</html>