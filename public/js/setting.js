function saveProfile() {
  closeModal("editProfileModal");
  showToast("Profil berhasil diperbarui!", "success");
}

function savePassword() {
  closeModal("passwordModal");
  showToast("Password berhasil diperbarui!", "success");
}

function logoutUser() {
  showToast("Berhasil logout!", "success");

  setTimeout(() => {
    window.location.href = "login.html";
  }, 1000);
}
