<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>SignUp</title>
  <style>
    .dangky {
      text-align: center;
    }

    .formdangky {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 1);
    }

    .formdangky::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom right,
          #8dee95,
          rgba(1, 87, 155, 0.95));
      z-index: -1;
    }


    h1 {
      text-align: center;
      margin-top: 0;
    }

    label {
      display: block;
      margin-bottom: 5px;
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

    h1 {
      font-size: 25px;
      font-weight: bold;
    }

    #toggle-password {
      position: absolute;
      right: 10px;
      top: 40%;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
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
</head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    //LẤY DỮ LIỆU TỪ FORM
    $tendn = $_POST["name"];
    $telenumber = $_POST["telenumber"];
    $matkhau = $_POST["password"];
    $rematkhau = $_POST["confirm-password"];
    $ho = $_POST["ho"];
    $ten = $_POST["ten"];
    //1.KẾT NỐI
    $kn = mysqli_connect("localhost", "root", "", "datadangky") or die("Không kết nối được");
    //2.CHỌN CSDL
    //3.QUY ĐỊNH BẢNG MÃ KẾT NỐI CỦA MÌNH
    //4.XÂY DỰNG CÂU LỆNH TRUY VẤN
    $caulenh = "insert into thongtin (username, password, telenumber,ho,ten) value ('" . $tendn . "','" . $matkhau . "','" . $telenumber . "','" . $ho . "','" . $ten . "')";
    $caulenhcheck = "select * from thongtin where username='" . $tendn . "'";
    $result = mysqli_query($kn, $caulenhcheck);
    $row = mysqli_fetch_array($result);
    //5.THỰC HIỆN CÂU LỆNH TRUY VẤN
    if ($matkhau == $rematkhau) {
      $kqcheck = mysqli_query($kn, $caulenhcheck);
      if ($row = mysqli_fetch_array($kqcheck)) {
        echo "<script> 
				alert('Tên tài khoản đã được đăng ký! Hãy đăng ký với tên khác');
					window.history.back();
				</script>";
      } else {
        if ($kq = mysqli_query($kn, $caulenh)) {
          echo "<script>
					alert('Đăng ký thành công'); 
					window.location.href = 'formlogin.php';
				  </script>";
        } else {
          echo "<script> 
					alert('Không thành công'); 
					window.history.back();
				  </script>";
        }
      }
    } else {
      echo "<script>
			alert('Nhập mật khẩu không khớp');
			window.history.back();
		</script>";
    }
    //6.LẤY KẾT QUẢ TRẢ VỀ ĐỂ XỬ LÝ
    //8.ĐÓNG CSDL
    mysqli_close($kn);
  }
  ?>

  <div>
    <a href="trangchu.php"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
  </div>
  <form class="formdangky" action="<?php echo ($_SERVER['PHP_SELF']); ?> " method="POST">
    <div class="dangky">
      <h1>Đăng ký tài khoản</h1>
    </div>
    <label for="name"><b>Tên tài khoản</b></label>
    <input type="text" id="name" name="name" required>

    <label for="telenumber"><b>Số điện thoại</b></label>
    <input type="telenumber" id="telenumber" name="telenumber" required>

    <label for="ho"><b>Họ chữ lót</b></label>
    <input type="text" id="ho" name="ho" required>

    <label for="ten"><b>Tên</b></label>
    <input type="text" id="ten" name="ten" required>

    <label for="password"><b>Mật khẩu</b></label>
    <div style="position: relative;">
      <input type="password" id="password" name="password" required>
      <i class="far fa-eye-slash" id="toggle-password" onclick="togglePassword()"></i>
    </div>
    <label for="confirm-password"><b>Nhập lại mật khẩu</b></label>
    <input type="password" id="confirm-password" name="confirm-password" required>


    <input type="submit" value="Đăng ký" name="submit">
  </form>
</body>

</html>