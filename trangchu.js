// Lấy ra các phần tử ảnh trên trang
const slideImages = document.querySelectorAll(".slide-image");

// Vị trí của ảnh hiện tại
let currentImage = 0;

// Thực hiện chuyển đổi hình ảnh
function changeImage() {
  // Ẩn tất cả các ảnh
  slideImages.forEach((image) => {
    image.classList.remove("active");
  });

  // Hiển thị ảnh tiếp theo và điều chỉnh vị trí hiện tại
  slideImages[currentImage].classList.add("active");
  currentImage = (currentImage + 1) % slideImages.length;

  // Thực hiện chuyển đổi ảnh sau 3 giây
  setTimeout(changeImage, 4000);
}

// Bắt đầu chuyển đổi ảnh đầu tiên
changeImage();
//DROPDOWN
const items = document.querySelectorAll(".menu-item");

items.forEach((item) => {
  const submenu = item.querySelector(".submenu");

  item.addEventListener("mouseenter", () => {
    submenu.style.display = "block";
  });

  item.addEventListener("mouseleave", () => {
    submenu.style.display = "none";
  });
});
//Xóa phiên làm việc của Session
// Khi người dùng nhấn vào nút đăng xuất, gửi yêu cầu AJAX đến server để xóa phiên làm việc
document.getElementById("logout").addEventListener("click", function (e) {
  e.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
  if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
    window.location.href = "logout.php";
  }
});
