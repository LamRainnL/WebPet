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
			<h5 class='thongtin'>Thông tin $ten</h5>
			<ul class='noidungthongtin'>
				<li>Thương hiệu: $thuonghieu</li>
				<li>Thành phần: $tpdd</li>
				<li>Hướng dẫn sử dụng: $hdsd</li>
				<li>Giá: $gia</li>
			</ul>
			<div class='lienhe'>
				<a href='https://zalo.me/0352282425' target='_blank' class='lienhezalo'>
					<i class='fa fa-mobile' aria-hidden='true'></i></br>
					<span>Chat Zalo với L2HPetShop</span>
				</a>
				<a href='tel:0352282425' class='lienhesdt'>
					<i class='fa fa-phone' aria-hidden='true'></i></br>
					<span>Liên hệ HotLine: 035.228.2425</span>
				</a>
			</div>
			</div>
			</div>
			<div class='bonus'>
				
				<div>
				<section id='section' class='chitiet'>
					<div>
						<ul>
							<li style='text-align:justify;'>
								<span>$mota</span>
							</li></br>
							<li style='text-align:justify;'>
								<span>Khách hàng có thể trực tiếp lựa chọn mua $ten cơ sở gần nhất của L2HPetShop. Hoặc đặt mua thông qua các tính năng <strong><a href='tel:0352282425'>Hotline</a>,<a href='https://zalo.me/0352282425' target='_blank'>Zalo</a></strong> chat được tích hợp trực tiếp trên website của chúng tôi.</span>
							</li>
						</ul>
					</div>
				</section>
				</div>
				<div>
						<img src='$anh' alt='$ten'>
				</div>	
			</div>";
	}
	mysqli_close($conn);
	require 'footer.php';
	?>

</body>

</html>