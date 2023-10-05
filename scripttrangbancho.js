//Xóa phiên làm việc của Session
// Khi người dùng nhấn vào nút đăng xuất, gửi yêu cầu AJAX đến server để xóa phiên làm việc
document.getElementById("logout").addEventListener("click", function (e) {
  e.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
  if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
    window.location.href = "logout2.php";
  }
});
