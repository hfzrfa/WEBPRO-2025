// Jalankan semua kode setelah halaman selesai dimuat
document.addEventListener("DOMContentLoaded", () => {
  // Ambil elemen-elemen dari HTML
  const btnAlert = document.getElementById("btnAlert");
  const btnUbah = document.getElementById("btnUbah");
  const teks = document.getElementById("teks");
  const form = document.getElementById("profilForm");

  // Hubungkan tombol dan form ke fungsi masing-masing
  btnAlert.addEventListener("click", tampilkanPesan);
  btnUbah.addEventListener("click", ubahTeks);
  form.addEventListener("submit", handleSubmit);
  form.addEventListener("reset", clearErrors);

  // Fungsi untuk menampilkan pesan saat tombol diklik
  function tampilkanPesan() {
    alert("Tombol berhasil diklik");
  }

  // Fungsi untuk mengubah teks pada elemen <p>
  function ubahTeks() {
    teks.textContent = "Konten telah diubah.";
  }

  // Fungsi yang dipanggil ketika form disubmit
  function handleSubmit(e) {
    const ok = validasiProfil();
    // Jika validasi gagal, cegah form dikirim ke server
    if (!ok) {
      e.preventDefault();
      return false;
    }
  }

  // Fungsi validasi form
  function validasiProfil() {
    const nama = getInput("nama");
    const email = getInput("email");
    const telepon = getInput("telepon");
    let valid = true;

    // Cek kolom nama
    if (!nama.value.trim()) {
      setError(nama, "Nama wajib diisi", "err-nama");
      valid = false;
    } else {
      clearError(nama, "err-nama");
    }

    // Cek kolom email
    if (!email.value.trim()) {
      setError(email, "Email wajib diisi", "err-email");
      valid = false;
    } else if (!isEmail(email.value)) {
      setError(email, "Format email tidak valid", "err-email");
      valid = false;
    } else {
      clearError(email, "err-email");
    }

    // Cek kolom telepon
    if (!telepon.value.trim()) {
      setError(telepon, "Nomor telepon wajib diisi", "err-telepon");
      valid = false;
    } else if (!/^[0-9+\s-]{8,}$/.test(telepon.value.trim())) {
      setError(telepon, "Nomor telepon tidak valid", "err-telepon");
      valid = false;
    } else {
      clearError(telepon, "err-telepon");
    }

    // Kembalikan nilai true/false sesuai hasil validasi
    return valid;
  }

  // Ambil elemen input berdasarkan ID
  function getInput(id) {
    return document.getElementById(id);
  }

  // Tampilkan pesan error dan ubah tampilan input jadi merah
  function setError(inputEl, msg, errId) {
    inputEl.classList.add("invalid");
    const el = document.getElementById(errId);
    el.textContent = msg;
  }

  // Hapus pesan error dan warna merah jika valid
  function clearError(inputEl, errId) {
    inputEl.classList.remove("invalid");
    const el = document.getElementById(errId);
    el.textContent = "";
  }

  // Bersihkan semua error saat form di-reset
  function clearErrors() {
    ["nama", "email", "telepon"].forEach((id) => {
      clearError(getInput(id), "err-" + id);
    });
  }

  // Validasi pola format email sederhana
  function isEmail(v) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
  }
});
