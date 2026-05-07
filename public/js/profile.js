function switchTab(el) {
  document
    .querySelectorAll(".pin-tab")
    .forEach((t) => t.classList.remove("active"));
  el.classList.add("active");
}
function saveProfile() {
  closeModal("editProfileModal");
  showToast("Profil berhasil diperbarui!", "success");
}
