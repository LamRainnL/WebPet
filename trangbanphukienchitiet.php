<!DOCTYPE html>
<html>

<head>
	<title>L2HPetshop</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/styletrangchitiet.css" />
</head>

<body>

	<?php
	require 'head.php';
	$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối");
	// Lấy ID sản phẩm từ đường dẫn URL
	$id = $_GET['id'];

	// Truy vấn CSDL để lấy thông tin sản phẩm
	$sql = "SELECT * FROM thucan WHERE id = $id";
	mysqli_query($conn, "SET NAMES 'utf8'");
	$result = mysqli_query($conn, $sql);

	// Lấy thông tin sản phẩm
	if (mysqli_num_rows($result)) {
		$row = mysqli_fetch_array($result);
		$ma = $row['id'];
		$ten = $row['ten'];
		$thuonghieu = $row['thuonghieu'];
		$mota = $row['mota'];
		$tpdd = $row['thanhphandinhduong'];
		$hdsd = $row['huongdansd'];
		$gia = $row['gia'];
		$anh = $row['anh'];
		echo "<div class='chitiet'>
			<div class='anh'>
				<img src='$anh' alt='$ten'>
			</div>
			<div class='thongtinchung'>
				<h1 class='mota'>
				<span>$mota</span>
				</h1>
			<h5 class='thongtin'>Thông tin $ten</h5>
			<ul class='noidungthongtin'>
				<li>Thương hiệu: $thuonghieu</li>
				<li>Thành phần: $tpdd</li>
				<li>Hướng dẫn sử dụng: $hdsd</li>
				<li>Giá: $gia</li>
			</ul>
			</div>
			</div>";
	}
	mysqli_close($conn);

	?>

</body>

</html>