const $ = (id) => document.getElementById(id);
const q = (sel) => document.querySelector(sel);

function handleFocus(el) {
  document
    .querySelectorAll(".control")
    .forEach((c) => c.classList.remove("focus"));
  el.closest(".control").classList.add("focus");
}

function setInvalid(input, errId, msg) {
  input.classList.add("invalid");
  input.closest(".control").classList.add("invalid");
  $(errId).textContent = msg;
}
function clearInvalid(input, errId) {
  input.classList.remove("invalid");
  input.closest(".control").classList.remove("invalid");
  $(errId).textContent = "";
}

function validateNama() {
  const input = $("nama");
  const val = input.value.trim();
  if (val.length === 0) {
    setInvalid(input, "err-nama", "Nama tidak boleh kosong.");
    return false;
  }
  clearInvalid(input, "err-nama");
  return true;
}

function validateEmail() {
  const input = $("email");
  const val = input.value.trim();
  if (val.length === 0) {
    setInvalid(input, "err-email", "Email wajib diisi.");
    return false;
  }
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  if (!emailRegex.test(val)) {
    setInvalid(input, "err-email", "Format email tidak valid.");
    return false;
  }
  clearInvalid(input, "err-email");
  return true;
}

function validateUsia() {
  const input = $("usia");
  const raw = input.value.trim();
  if (raw.length === 0) {
    setInvalid(input, "err-usia", "Usia wajib diisi.");
    return false;
  }
  const num = Number(raw);
  if (!Number.isFinite(num) || num < 0) {
    setInvalid(input, "err-usia", "Usia harus angka >= 0.");
    return false;
  }
  clearInvalid(input, "err-usia");
  return true;
}

function handleSubmit(e) {
  const okNama = validateNama();
  const okEmail = validateEmail();
  const okUsia = validateUsia();
  const status = $("form-status");

  if (!(okNama && okEmail && okUsia)) {
    e.preventDefault();
    status.className = "form-status fail";
    status.textContent = "Periksa lagi field yang ditandai merah.";
    if (!okNama) $("nama").focus();
    else if (!okEmail) $("email").focus();
    else $("usia").focus();
    return false;
  }

  // contoh umpan balik sukses (submit normal tetap lanjut)
  status.className = "form-status success";
  status.textContent = "Form valid. Mengirim data...";
  return true;
}

function resetStates() {
  document
    .querySelectorAll(".control")
    .forEach((c) => c.classList.remove("invalid", "focus"));
  document.querySelectorAll(".error").forEach((e) => (e.textContent = ""));
  const status = $("form-status");
  status.className = "form-status";
  status.textContent = "";
}

// Validasi realtime saat mengetik ( UX lebih halus )
["input", "change"].forEach((evt) => {
  $("nama").addEventListener(evt, validateNama);
  $("email").addEventListener(evt, validateEmail);
  $("usia").addEventListener(evt, validateUsia);
});
