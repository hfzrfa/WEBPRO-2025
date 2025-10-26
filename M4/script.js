// Pesan selamat datang
document.addEventListener("DOMContentLoaded", () => {
  const banner = document.getElementById("welcomeBanner");
  const closer = document.getElementById("closeWelcome");
  setTimeout(() => {
    if (banner) banner.hidden = false;
  }, 350);
  closer?.addEventListener("click", () => (banner.hidden = true));
});

// Animasi hover menu via JS (tambah/hapus class)
(function navHoverAnimation() {
  const links = document.querySelectorAll("#mainNav a");
  links.forEach((a) => {
    a.addEventListener("mouseenter", () => a.classList.add("hover-bounce"));
    a.addEventListener("mouseleave", () => a.classList.remove("hover-bounce"));
  });
})();

// Validasi form sederhana
(function formValidation() {
  const form = document.getElementById("contactForm");
  const status = document.getElementById("formStatus");
  const err = {
    nama: document.getElementById("err-nama"),
    email: document.getElementById("err-email"),
    pesan: document.getElementById("err-pesan"),
  };

  const emailOK = (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);

  form?.addEventListener("submit", (e) => {
    e.preventDefault();
    // ambil nilai
    const nama = document.getElementById("nama").value.trim();
    const email = document.getElementById("email").value.trim();
    const pesan = document.getElementById("pesan").value.trim();

    // reset error
    Object.values(err).forEach((el) => (el.textContent = ""));

    let valid = true;
    if (!nama) {
      err.nama.textContent = "Nama wajib diisi.";
      valid = false;
    }
    if (!email) {
      err.email.textContent = "Email wajib diisi.";
      valid = false;
    } else if (!emailOK(email)) {
      err.email.textContent = "Format email tidak valid.";
      valid = false;
    }
    if (!pesan) {
      err.pesan.textContent = "Pesan wajib diisi.";
      valid = false;
    }

    if (!valid) {
      status.textContent = "";
      return;
    }

    status.textContent = "Form valid. Data siap dikirim.";
    form.reset();
    setTimeout(() => (status.textContent = ""), 2500);
  });
})();
