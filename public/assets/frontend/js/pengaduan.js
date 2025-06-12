document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("complaintForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    showConfirmDialog(
      "Yakin ingin mengirim pengaduan ini?",
      function () {
        console.log("User klik YA, akan submit...");
        const loader = document.getElementById("globalLoader");
        if (loader) loader.style.display = "flex";

        // Pastikan pakai cara ini untuk menghindari konflik:
        HTMLFormElement.prototype.submit.call(form);
      },
      function () {
        console.log("User klik Batal");
        showInfoMessage("Pengaduan dibatalkan.");
      }
    );
  });
});
