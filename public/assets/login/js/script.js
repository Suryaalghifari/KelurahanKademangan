document.addEventListener("DOMContentLoaded", function () {
  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");
  const eyeIcon = document.getElementById("eyeIcon");

  if (togglePassword && passwordInput) {
    togglePassword.addEventListener("click", function () {
      const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);

      // Optional: Ganti icon jika ingin efek on/off
      // if (type === "text") {
      //   eyeIcon.innerHTML = '<path d="..."/>'; // icon "eye open"
      // } else {
      //   eyeIcon.innerHTML = '<path d="..."/>'; // icon "eye closed"
      // }
    });
  }
});
