<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<?php
	if (isset($_REQUEST['btnTim'])) {
		//Gán hàm addslashes để chống lại sql injection
		$search = addslashes($_GET['txttim']);

		//Nếu search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã submit
		if (empty($search)) {
			echo "
				<script>
					alert('Bạn chưa nhập thông tin cần tìm. Vui lòng nhập để tìm kiếm');
					windown.history.back();
				</script>
			";

		} else {
			//Dùng câu lệnh like trong sql và sử dụng toán tử % của PHP để tìm kiếm dữ liệu
			$query = "select * from tbthongtin where quequan like '%$search%'";
			//Kết nối CSDL
			$conn = mysqli_connect("localhost", "root", "", "kiemtra") or die("Không kết nối được");

			//Thực thi câu lệnh truy vấn
			$sql = mysqli_query($conn, $query);

			//Đếm số dòng trả về trong sql
			$num = mysqli_num_rows($sql);

			//Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
			if ($num > 0 && $search != "") {
				//Dùng $num để đếm số dòng trả về
				echo "$num kết quả trả về với từ khóa <b>$search</b>";

				//Vòng lặp while & mysqli_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array
				echo '<table border="1">';
				while ($row = mysqli_fetch_assoc($sql)) {
					echo '<tr>';
					echo "<td>{$row['hoten']}</td>";
					echo "<td>{$row['nghenghiep']}</td>";
					echo "<td>{$row['gioitinh']}</td>";
					echo "<td>{$row['quequan']}</td>";
					echo "<td>{$row['ngoaingu']}</td>";
					echo "<td>{$row['thongtinthem']}</td>";
					echo '</tr>';
				}
				echo '</table>';
			} else {
				echo "Không tìm thấy kết quả";
			}
		}
	}
	?>
	<div align="center">
		<form action="timkiem.php" method="GET">
			<table>
				<tr>
					<td>Nhập quê quán</td>
					<td><input type="text" name="txttim"></td>
					<td><input type="submit" name="btnTim" value="Tìm kiếm"></td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>