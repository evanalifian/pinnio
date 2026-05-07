function switchTab(el, tab) {
  document
    .querySelectorAll(".pin-tab")
    .forEach((t) => t.classList.remove("active"));
  el.classList.add("active");
}
function postThread() {
  const text =
    document.getElementById("composeText")?.value ||
    document.getElementById("modalComposeText")?.value;
  if (!text?.trim()) {
    showToast("Tulis sesuatu dulu!");
    return;
  }
  showToast("Thread berhasil dipost!", "success");
  closeModal("composeModal");
  document.getElementById("composeText").value = "";
}
function loadMore() {
  showToast("Memuat thread baru...");
}
function votePoll(el, pct) {
  showToast(`Kamu memilih! (${pct}%)`, "success");
}
