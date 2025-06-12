document.addEventListener("DOMContentLoaded", function () {
  const fileInput = document.getElementById("formulir_skck");

  fileInput.addEventListener("change", function () {
    if (fileInput.files.length > 0) {
      showFileUploadSuccess(); // ✅ Panggil fungsi dari global.js
    }
  });
});
