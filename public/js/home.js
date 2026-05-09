function switchTab(el, tab) {
  document
    .querySelectorAll(".pin-tab")
    .forEach((t) => t.classList.remove("active"));
  el.classList.add("active");
}

function handleImageSelect(event) {
  const file = event.target.files?.[0];
  if (!file) return;

  // Validate file is an image
  if (!file.type.startsWith("image/")) {
    showToast("Pilih file gambar!", "error");
    return;
  }

  // Validate file size (max 5MB)
  const maxSize = 5 * 1024 * 1024; // 5MB
  if (file.size > maxSize) {
    showToast("Ukuran gambar terlalu besar (max 5MB)", "error");
    return;
  }

  // Read and display image
  const reader = new FileReader();
  reader.onload = (e) => {
    const previewContainer = document.getElementById("imagePreviewContainer");
    const previewImg = document.getElementById("imagePreview");
    previewImg.src = e.target.result;
    previewContainer.style.display = "block";
  };
  reader.readAsDataURL(file);
}

function clearImagePreview() {
  document.getElementById("imagePreviewContainer").style.display = "none";
  document.getElementById("imagePreview").src = "";
  document.getElementById("imageCaption").value = "";
  document.getElementById("imageInput").value = "";
}

function postThread() {
  const text = document.getElementById("modalComposeText")?.value;
  const imageInput = document.getElementById("imageInput");
  const imageCaption = document.getElementById("imageCaption")?.value;
  const hasImage = imageInput?.files?.length > 0;

  if (!text?.trim() && !hasImage) {
    showToast("Tulis sesuatu atau pilih gambar!");
    return;
  }

  // Prepare data to send to server
  const formData = new FormData();
  formData.append("text", text || "");
  if (hasImage) {
    formData.append("image", imageInput.files[0]);
    formData.append("caption", imageCaption || "");
  }

  // TODO: Send formData to server endpoint
  // Example: fetch('/api/thread/create', { method: 'POST', body: formData })

  showToast("Thread berhasil dipost!", "success");
  closeModal("composeModal");

  // Reset form
  document.getElementById("modalComposeText").value = "";
  clearImagePreview();
}

function loadMore() {
  showToast("Memuat thread baru...");
}

function votePoll(el, pct) {
  showToast(`Kamu memilih! (${pct}%)`, "success");
}
