/* JavaScript để chuyển đổi kiểu hiển thị của trường nhập mật khẩu */
const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("iconsee1");

togglePassword.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    togglePassword.classList.remove("iconsee");
    togglePassword.classList.add("fa-eye");
  } else {
    passwordInput.type = "password";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("iconsee");
  }
});
