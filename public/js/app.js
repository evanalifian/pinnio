// ============================================
// PINTHREAD — Shared JS
// ============================================

// Like toggle
document.addEventListener("click", (e) => {
  const btn = e.target.closest('.thread-action-btn[data-action="like"]');
  if (!btn) return;
  btn.classList.toggle("liked");
  const count = btn.querySelector(".action-count");
  if (count) {
    const n = parseInt(count.textContent) || 0;
    count.textContent = btn.classList.contains("liked") ? n + 1 : n - 1;
  }
});

// Follow button toggle
document.addEventListener("click", (e) => {
  const btn = e.target.closest(".follow-btn");
  if (!btn) return;
  const isFollowing = btn.dataset.following === "true";
  btn.dataset.following = !isFollowing;
  if (!isFollowing) {
    btn.textContent = "Following";
    btn.classList.remove("btn-pin");
    btn.classList.add("btn-pin-outline");
  } else {
    btn.textContent = "Follow";
    btn.classList.add("btn-pin");
    btn.classList.remove("btn-pin-outline");
  }
});

// Modal helpers
function openModal(id) {
  const el = document.getElementById(id);
  if (el) el.classList.add("open");
}
function closeModal(id) {
  const el = document.getElementById(id);
  if (el) el.classList.remove("open");
}
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("pin-modal-overlay")) {
    e.target.classList.remove("open");
  }
});

// Textarea auto-resize
document.addEventListener("input", (e) => {
  if (
    e.target.tagName === "TEXTAREA" &&
    e.target.classList.contains("pin-input")
  ) {
    e.target.style.height = "auto";
    e.target.style.height = e.target.scrollHeight + "px";
  }
});

// Fake avatar placeholder generator
function avatarUrl(seed, size = 48) {
  return `https://api.dicebear.com/7.x/thumbs/svg?seed=${seed}&size=${size}`;
}

// Simple toast
function showToast(msg, type = "default") {
  let container = document.getElementById("toast-container");
  if (!container) {
    container = document.createElement("div");
    container.id = "toast-container";
    container.style.cssText =
      "position:fixed;bottom:24px;right:24px;z-index:99999;display:flex;flex-direction:column;gap:8px;";
    document.body.appendChild(container);
  }
  const toast = document.createElement("div");

  let bg, color;
  if (type === "success") {
    bg = "var(--pin-yellow)";
    color = "var(--pin-dark)";
  } else if (type === "error") {
    bg = "#ff4d6d";
    color = "var(--pin-white)";
  } else {
    bg = "var(--pin-card)";
    color = "var(--pin-white)";
  }

  toast.style.cssText = `background:${bg};color:${color};padding:12px 20px;border-radius:12px;font-family:'DM Sans',sans-serif;font-size:14px;font-weight:500;border:1px solid var(--pin-border);animation:fadeUp .3s ease;box-shadow:0 8px 24px rgba(0,0,0,0.3);`;
  toast.textContent = msg;
  container.appendChild(toast);
  setTimeout(() => toast.remove(), 3000);
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
