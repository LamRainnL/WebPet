<head>
	<link rel="stylesheet" href="/styletrangchitiet.css" />

</head>

<body>
	<?php
	require 'head.php';
	if (isset($_GET['search'])) {
		//Lấy dữ liệu từ form 
		$keyword = $_GET['search'];

		//kết nối csdl
		$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối!");

		//Xây dựng câu lệnh truy vấn
		$sqlcho = "select * from cho where ten like'%$keyword%'";
		$sqlmeo = "select * from meo where ten like'%$keyword%'";
		$sqlfood = "select * from thucan where ten like'%$keyword%'";
		$sqlthuoc = "select * from thuoc where ten like'%$keyword%'";
		mysqli_query($conn, "SET NAMES 'utf8'");
		$resultcho = mysqli_query($conn, $sqlcho);
		$resultmeo = mysqli_query($conn, $sqlmeo);
		$resultfood = mysqli_query($conn, $sqlfood);
		$resultthuoc = mysqli_query($conn, $sqlthuoc);

		//Kết quả 
		if (mysqli_num_rows($resultcho) > 0) {
			// Xử lý dữ liệu ở đây
			$row = mysqli_fetch_array($resultcho);
			$ma = $row['id'];
			$ten = $row['ten'];
			$giong = $row['giong'];
			$tuoi = $row['tuoi'];
			$gt = $row['gioitinh'];
			$mausac = $row['mausac'];
			$tl = $row['trongluong'];
			$chieucao = $row['chieucao'];
			$ttsk = $row['tinhtrangsuckhoe'];
			$tiemphong = $row['tiemphong'];
			$gia = $row['gia'];
			$mota = $row['mota'];
			$anh = $row['anh'];
			echo "<div class='chitiet'>
			<div class='anh'>
				<img src='$anh' alt='$ten'>
			</div>
			<div class='thongtinchung'>
			<h5 class='thongtin'>Thông tin $ten</h5>
			<ul class='noidungthongtin'>
				<li>Giống: $giong</li>
				<li>Tuổi: $tuoi</li>
				<li>Giới tính: $gt</li>
				<li>Màu sắc: $mausac</li>
				<li>Trọng lượng: $tl</li>	
				<li>Chiều cao: $chieucao</li>
				<li>Tình trạng sức khỏe: $ttsk</li>
				<li>Tình trạng tiêm phòng: $tiemphong</li>
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
		} else if (mysqli_num_rows($resultmeo) > 0) {
			// Xử lý dữ liệu ở đây
			$row = mysqli_fetch_array($resultmeo);
			$ma = $row['id'];
			$ten = $row['ten'];
			$giong = $row['giong'];
			$tuoi = $row['tuoi'];
			$gt = $row['gioitinh'];
			$mausac = $row['mausac'];
			$tl = $row['trongluong'];
			$chieucao = $row['chieucao'];
			$ttsk = $row['tinhtrangsuckhoe'];
			$tiemphong = $row['tiemphong'];
			$gia = $row['gia'];
			$mota = $row['mota'];
			$anh = $row['anh'];
			echo "<div class='chitiet'>
			<div class='anh'>
				<img src='$anh' alt='$ten'>
			</div>
			<div class='thongtinchung'>
			<h5 class='thongtin'>Thông tin $ten</h5>
			<ul class='noidungthongtin'>
				<li>Giống: $giong</li>
				<li>Tuổi: $tuoi</li>
				<li>Giới tính: $gt</li>
				<li>Màu sắc: $mausac</li>
				<li>Trọng lượng: $tl</li>	
				<li>Chiều cao: $chieucao</li>
				<li>Tình trạng sức khỏe: $ttsk</li>
				<li>Tình trạng tiêm phòng: $tiemphong</li>
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
		} else if (mysqli_num_rows($resultfood) > 0) {
			// Xử lý dữ liệu ở đây
			$row = mysqli_fetch_array($resultfood);
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
		} else if (mysqli_num_rows($resultthuoc) > 0) {
			$row = mysqli_fetch_array($resultthuoc);
			$ma = $row['id'];
			$ten = $row['ten'];
			$thuonghieu = $row['thuonghieu'];
			$mota = $row['mota'];
			$gia = $row['gia'];
			$congdung = $row['congdung'];
			$hdsd = $row['cachsd'];
			$anh = $row['anh'];
			echo "<div class='chitiet'>
			<div class='anh'>
				<img src='$anh' alt='$ten'>
			</div>
			<div class='thongtinchung'>
			<h5 class='thongtin'>Thông tin $ten</h5>
			<ul class='noidungthongtin'>
				<li>Thương hiệu: $thuonghieu</li>
				<li>Công dụng: $congdung</li>
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
		} else {
			// Khi không có kết quả trả về
			echo "Không tìm thấy kết quả nào!";
		}
	}
	mysqli_close($conn);
	require 'footer.php';
	?>
</body>