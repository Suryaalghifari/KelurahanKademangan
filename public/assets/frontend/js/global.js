// Notifikasi SweetAlert untuk file berhasil diunggah
function showFileUploadSuccess() {
  Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "File berhasil diunggah!",
    timer: 2000,
    showConfirmButton: false,
  });
}

// Notifikasi umum sukses
function showSuccessMessage(message) {
  Swal.fire({
    icon: "success",
    title: "Sukses!",
    text: message,
    timer: 2500,
    showConfirmButton: false,
  });
}

// Notifikasi umum error
function showErrorMessage(message) {
  Swal.fire({
    icon: "error",
    title: "Gagal!",
    text: message,
    timer: 2500,
    showConfirmButton: false,
  });
}
function showWarningMessage(message) {
  Swal.fire({
    icon: "warning",
    title: "Peringatan!",
    text: message,
    timer: 2500,
    showConfirmButton: false,
  });
}
function showInfoMessage(message) {
  Swal.fire({
    icon: "info",
    title: "Informasi",
    text: message,
    timer: 2500,
    showConfirmButton: false,
  });
}
function showConfirmDialog(message, confirmCallback, cancelCallback = null) {
  Swal.fire({
    title: "Konfirmasi",
    text: message,
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      if (typeof confirmCallback === "function") {
        confirmCallback();
      }
    } else {
      if (typeof cancelCallback === "function") {
        cancelCallback();
      }
    }
  });
}
window.addEventListener("load", function () {
  const loader = document.getElementById("globalLoader");
  if (loader) {
    loader.style.opacity = "0";
    setTimeout(() => (loader.style.display = "none"), 300);
  }
});

document.querySelectorAll("a").forEach((link) => {
  link.addEventListener("click", function (e) {
    const href = link.getAttribute("href");
    if (
      href &&
      !href.startsWith("#") &&
      !href.startsWith("javascript:") &&
      !link.hasAttribute("target")
    ) {
      const loader = document.getElementById("globalLoader");
      if (loader) loader.style.display = "flex";
    }
  });
});
