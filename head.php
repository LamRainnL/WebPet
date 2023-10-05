<?php
session_start();
?>

<head>
	<link rel="stylesheet" href="/stylehead.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
		integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<div class="logo">
	<div>
		<a href="trangchu.php" style="text-decoration: none">
			<img
				src="https://scontent.fdad3-5.fna.fbcdn.net/v/t1.15752-9/340622500_788379729461959_8053774994930330416_n.png?_nc_cat=106&ccb=1-7&_nc_sid=ae9488&_nc_ohc=css7CIC_0isAX_MAla-&_nc_ht=scontent.fdad3-5.fna&oh=03_AdRhWbCiIeF2q2hdbHLrUmlFFZR3dwBEUSTLMm-TvshvfA&oe=6499BAB8" />
		</a>
	</div>
	<div class="search">
		<form class="search" action="xulysearch.php" method="GET">
			<input type="text" name="search" id="search" placeholder="">
			<button type="submit" name="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<script type="text/javascript">
		var placeholderText = "Nhập tên thú cưng bạn muốn tìm kiếm..";
		var placeholderElement = document.getElementById("search");
		var index = 0;
		setInterval(function () {
			// Lặp lại từ đầu nếu đã hiển thị tất cả ký tự
			if (index >= placeholderText.length) {
				index = 0;
			}
			// Hiển thị một ký tự mới
			placeholderElement.placeholder = placeholderText.substring(0, index + 1);
			index++;
		}, 100); // Thời gian hiển thị mỗi ký tự (đơn vị: milliseconds)
	</script>
	<?php
	//kiểm tra xem biến session đã tồn tại hay chưa
	if (isset($_SESSION["ten"])) {
		//Nếu tồn tại thì thay đổi nội dung của chỗ đăng nhập
		echo '<div class="account" id="account"> Chào,  ' . $_SESSION["ten"] . ' !<a href="logout.php" id="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></div>';
	} else {
		echo '
				<div class="account" id="account">
				<a href="formlogin.php">Đăng nhập</a>
				<a href="formdangky.php">Đăng ký</a>
				</div>';
	}
	?>

</div>

<div class="container">
	<nav>
		<ul class="menu">
			<li class="menu-item">
				<a href="trangbancho.php"><b>Mua Chó</b><i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<?php
				//Kết nối CSDL
				$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối");
				//Truy vấn để lấy danh sách sản phẩm
				$sql = "select * from cho";
				mysqli_query($conn, "SET NAMES 'utf8'");
				$result = mysqli_query($conn, $sql);
				//Hiển thị danh sách sản phẩm trong csdl lên trang web
				if (mysqli_num_rows($result)) {
					echo '<ul class="submenu">';
					while ($row = mysqli_fetch_array($result)) {
						$ma = $row['id'];
						$ten = $row['ten'];
						echo "<li><a href='trangbanchochitiet.php?id=$ma'>$ten</a></li>";
					}
					echo "</ul>";
				}
				mysqli_close($conn);
				?>
			</li>
			<li class="menu-item">
				<a href="trangbanmeo.php"><b>Mua Mèo</b><i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<?php
				//Kết nối CSDL
				$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối");
				//Truy vấn để lấy danh sách sản phẩm
				$sql = "select * from meo";
				mysqli_query($conn, "SET NAMES 'utf8'");
				$result = mysqli_query($conn, $sql);
				//Hiển thị danh sách sản phẩm trong csdl lên trang web
				if (mysqli_num_rows($result)) {
					echo '<ul class="submenu">';
					while ($row = mysqli_fetch_array($result)) {
						$ma = $row['id'];
						$ten = $row['ten'];
						echo "<li><a href='trangbanmeochitiet.php?id=$ma'>$ten</a></li>";
					}
					echo "</ul>";
				}
				mysqli_close($conn);
				?>
			</li>
			<li class="menu-item">
				<a href="trangbanthucan.php"><b>Thức ăn</b><i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<?php
				//Kết nối CSDL
				$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối");
				//Truy vấn để lấy danh sách sản phẩm
				$sql = "select * from thucan";
				mysqli_query($conn, "SET NAMES 'utf8'");
				$result = mysqli_query($conn, $sql);
				//Hiển thị danh sách sản phẩm trong csdl lên trang web
				if (mysqli_num_rows($result)) {
					echo '<ul class="submenu">';
					while ($row = mysqli_fetch_array($result)) {
						$ma = $row['id'];
						$ten = $row['ten'];
						echo "<li><a href='trangbanthucanchitiet.php?id=$ma'>$ten</a></li>";
					}
					echo "</ul>";
				}
				mysqli_close($conn);
				?>
			</li>
			<li class="menu-item">
				<a href="trangbanthuoc.php"><b>Thuốc thú y</b><i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<?php
				//Kết nối CSDL
				$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối");
				//Truy vấn để lấy danh sách sản phẩm
				$sql = "select * from thuoc";
				mysqli_query($conn, "SET NAMES 'utf8'");
				$result = mysqli_query($conn, $sql);
				//Hiển thị danh sách sản phẩm trong csdl lên trang web
				if (mysqli_num_rows($result)) {
					echo '<ul class="submenu">';
					while ($row = mysqli_fetch_array($result)) {
						$ma = $row['id'];
						$ten = $row['ten'];
						echo "<li><a href='trangbanthuocchitiet.php?id=$ma'>$ten</a></li>";
					}
					echo "</ul>";
				}
				mysqli_close($conn);
				?>
			</li>
		</ul>
	</nav>

</div>