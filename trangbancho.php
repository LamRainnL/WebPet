<!DOCTYPE html>
<html>

<head>
	<title>L2HPetShop</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/styletrangbancho.css" />
	<script src="/scripttrangbancho.js" defer></script>
</head>

<body>
	<?php
	require 'head.php';
	?>
	<h2>Danh sách sản phẩm</h2>
	<div class="cart-container">
		<?php
		//Kết nối CSDL
		$conn = mysqli_connect("localhost", "root", "", "animal") or die("Không thể kết nối");

		//Truy vấn để lấy danh sách sản phẩm
		$sql = "select * from cho";
		mysqli_query($conn, "SET NAMES 'utf8'");
		$result = mysqli_query($conn, $sql);

		//Hiển thị danh sách sản phẩm trong csdl lên trang web
		if (mysqli_num_rows($result)) {
			echo "<ul class='danhsachcho'>";
			while ($row = mysqli_fetch_array($result)) {
				$ma = $row['id'];
				$ten = $row['ten'];
				$anh = $row['anh'];
				echo "<li class='cho'>
		<a href='trangbanchochitiet.php?id=$ma'>
		<img src='$anh'alt='$ten'/>
        <h3>$ten</h3></a>
      </li>";
			}
			echo "</ul>";
		} else {
			echo "Không có sản phẩm nào!";
		}
		mysqli_close($conn);
		require 'footer.php';
		?>
</body>

</html>