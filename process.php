<?php
if (isset($_GET['search'])) {
	//Lấy dữ liệu từ form 
	$keyword = $_GET['search'];

	//kết nối csdl
	$conn = mysqli_connect("localhost", "root", "", "kiemtra") or die("Không thể kết nối!");

	//Xây dựng câu lệnh truy vấn
	$sql = "select * from tbthongtin where quequan like'%$keyword%'";
	mysqli_query($conn, "SET NAMES 'utf8'");
	$result = mysqli_query($conn, $sql);

	//Kết quả 
	$row = mysqli_fetch_array($result);
	$hoten = $row['hoten'];
	$nn = $row['nghenghiep'];
	$gt = $row['gioitinh'];
	$quequan = $row['quequan'];
	$ngoaingu = $row['ngoaingu'];
	$ttthem = $row['thongtininthem'];
	echo "<table border='1' align='center'>
	 <tr>
		<td align='center'>$hoten</td>
		<td align='center'>$nn</td>
		<td align='center'>$gt</td>
		<td align='center'>$quequan</td>
		<td align='center'>$ngoaingu</td>
		<td align='center'>$ttthem</td>
	 </tr>";
	mysqli_close($conn);
}
?>