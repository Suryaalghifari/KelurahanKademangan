function toggleMobileMenu() {
  const mobileNav = document.getElementById("mobileNav");
  mobileNav.classList.toggle("active");
}

// Close mobile menu when clicking outside
document.addEventListener("click", function (event) {
  const mobileNav = document.getElementById("mobileNav");
  const mobileBtn = document.querySelector(".mobile-menu-btn");

  if (!mobileNav.contains(event.target) && !mobileBtn.contains(event.target)) {
    mobileNav.classList.remove("active");
  }
});

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
    // Close mobile menu after clicking
    document.getElementById("mobileNav").classList.remove("active");
  });
});

//js Pengaduan
