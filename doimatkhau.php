<html>

<head>
	<meta charset="utf-8">
	<title>Đổi mật khẩu</title>
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			margin: 0;
		}

		.container {
			width: 300px;
			height: 300px;
			margin: 50px auto;
			padding: 10px;
			background-color: rgb(245, 247, 247);
			border-radius: 5px;
			box-shadow: 0 0 5px black;
			box-sizing: border-box;
		}

		h3 {
			text-align: center;
			font-size: 20px;
		}

		input[type="password"],
		input[type="text"] {
			width: 90%;
			margin: 5px;
			padding: 5px;
			border: 1px solid rgb(5, 5, 5);
			box-sizing: border-box;
			border-radius: 5px;
		}

		input[type="submit"] {
			margin: 15px 90px;
			padding: 7px;
			background-color: rgb(4, 136, 218);
			border-color: rgb(228, 228, 243);
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: green;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_POST['changepassword'])) {
		//Lấy dữ liệu từ form
		$tendn = $_POST['tendangnhap'];
		$matkhau = $_POST['oldpassword'];
		$newmk = $_POST['newpassword'];
		$renewmk = $_POST['renewpassword'];
		//1. Kết nối dữ liệu
		$kn = mysqli_connect("localhost", "root", "", "khachhang") or die("Không kết nối được");
		//2. Chọn CSDL
	
		//3. Quy định bảng mã kết nối
	
		//4. Xây dựng câu lệnh truy vấn
		$updatepassword = "update thongtinkh set password='" . $newmk . "' where username='" . $tendn . "' and password='" . $matkhau . "'";
		$caulenhkt = "select * from thongtinkh where username='" . $tendn . "' and password='" . $matkhau . "'";
		//5. Thực hiện câu lệnh truy vấn
		$kqkt = mysqli_query($kn, $caulenhkt);
		if ($dong = mysqli_fetch_array($kqkt)) {
			// kiểm tra mật khẩu mới
			if ($newmk == $renewmk) {
				$kqkt2 = mysqli_query($kn, $updatepassword);
				if ($kqkt2) {
					echo "<script>
					alert('Đổi mật khẩu thành công!');
					windown.history.back();
					</script>";
				}
			} else {
				echo "<script>
					alert('Mật khẩu không khớp. Vui lòng nhập lại!');
					windown.history.back();
				</script>";
			}
		} else {
			echo "<script>
					alert('Tên đăng nhập hoặc mật khẩu cũ không chính xác. Vui lòng nhập lại!');
					windown.history.back();
				</script>";
		}


		//6. Xử lý kết quả trả về
		//7. Dọn dẹp
		//8. Đóng CSDL
		mysqli_close($kn);
	}
	?>
	<div class="container">
		<h3>Đổi mật khẩu</h3>
		<form action="<?php echo ($_SERVER['PHP_SELF']); ?>" method="POST">
			<input type="text" name="tendangnhap" placeholder="Tên đăng nhập" />
			<input type="password" name="oldpassword" placeholder="Nhập mật khẩu cũ" />
			<input type="password" name="newpassword" placeholder="Nhập mật khẩu mới" />
			<input type="password" name="renewpassword" placeholder="Nhập lại mật khẩu mới" />
			<input type="submit" name="changepassword" value="Đổi mật khẩu" />
		</form>
	</div>
</body>

</html>