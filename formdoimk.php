<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>
  <title>ChangePass</title>
  <style>
    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-top: 1rem;
      font-weight: bold;
    }

    input {
      width: 94%;
      padding: 12px;
      border-radius: 15px;
      border: none;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
      background-color: #f0fff0;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .formchange {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 1);
    }

    .formchange::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom right,
          #8dee95,
          rgba(1, 87, 155, 0.95));
      z-index: -1;
    }

    .back-home {
      width: 30px;
      height: 20px;
      display: inline-block;
      background-size: cover;
      background-position: center;
      background-image: url('https://cdn1.iconfinder.com/data/icons/duotone-essentials/24/chevron_backward-512.png');
    }
  </style>
</head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    //Lấy dữ liệu từ form
    $name = $_POST["name"];
    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    $renewpass = $_POST["renewpass"];
    //Kết nối
    $kn = mysqli_connect("localhost", "root", "", "datadangky") or die("Không thể kết nối!");
    //Xây dựng câu lệnh truy vấn
    $checkUsername = "SELECT * FROM thongtin WHERE username = '" . $name . "'";
    $result = mysqli_query($kn, $checkUsername);
    //Kiểm tra tên tài khoản có tồn tại trong cơ sở dữ liệu không
    if (mysqli_num_rows($result) == 0) {
      echo "<script> 
					alert('Tên tài khoản không tồn tại'); 
					window.history.back();
				  </script>";
    } else {
      $row = mysqli_fetch_array($result);
      $mkcsdl = $row['password'];
      // Kiểm tra xem mật khẩu hiện tại có đúng hay không
      if ($oldpass != $mkcsdl) {
        // Mật khẩu hiện tại không đúng
        echo "<script> 
					alert('Mật khẩu hiện tại không đúng'); 
					window.history.back();
				  </script>";
      } else {
        //Kiểm tra mật khẩu mới nhập đúng chưa
        if ($renewpass != $newpass) {
          echo "<script> 
					alert('Mật khẩu mới nhập không khớp'); 
					window.history.back();
				  </script>";
        } else {
          // Cập nhật mật khẩu mới của người dùng
          $updatepass = "UPDATE thongtin SET password = '" . $newpass . "' WHERE username = '" . $name . "'";
          if (mysqli_query($kn, $updatepass)) {
            echo "<script> 
						alert('Mật khẩu đã được update.'); 
						window.location.href = 'formlogin.php';
					</script>";
          }
        }
      }
    }


    //Đóng kết nối
    mysqli_close($kn);
  }

  ?>
  <div>
    <a href="formlogin.php"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
  </div>
  <form class="formchange" action="<?php echo ($_SERVER['PHP_SELF']); ?> " method="POST">

    <label>Tên tài khoản</label>
    <input type="text" id="name" name="name" required>

    <label for="current-password">Mật khẩu hiện tại</label>
    <input type="password" id="oldpass" name="oldpass" required>

    <label for="new-password">Mật khẩu mới</label>
    <input type="password" id="newpass" name="newpass" required>

    <label for="confirm-password">Xác nhận mật khẩu mới</label>
    <input type="password" id="renewpass" name="renewpass" required>
    <input type="submit" value="Xác nhận" name="submit">
  </form>
</body>

</html>