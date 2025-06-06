function previewFileName() {
  const input = document.getElementById("fileInput");
  const fileList = document.getElementById("fileList");

  if (input.files.length > 0) {
    fileList.innerHTML = `<p><strong>File terpilih:</strong> ${input.files[0].name}</p>`;
    showFileUploadSuccess(); // 🎯 Panggil fungsi dari global.js
  } else {
    fileList.innerHTML = "";
  }
}
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("complaintForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); // hentikan submit dulu

    showConfirmDialog(
      "Yakin ingin mengirim pengaduan ini?",
      function () {
        form.submit(); // submit jika user klik YA
      },
      function () {
        showInfoMessage("Pengaduan dibatalkan."); // opsional
      }
    );
  });
});
