<div class="action-menu-wrap">
  <button class="btn-pin-ghost p-1" onclick="toggleDropdown('postDropdown')" id="postMenuBtn">
    <i class="bi bi-three-dots"></i>
  </button>
  <div class="dropdown-menu-pin" id="postDropdown">
    <button class="dropdown-item-pin" onclick="copyLink(); closeDropdown('postDropdown')">
      <i class="bi bi-link-45deg"></i> Salin tautan
    </button>
    <button class="dropdown-item-pin" onclick="pinPost(); closeDropdown('postDropdown')">
      <i class="bi bi-pin"></i> Sematkan di profil
    </button>
    <button class="dropdown-item-pin" onclick="editPost(); closeDropdown('postDropdown')">
      <i class="bi bi-pencil"></i> Edit thread
    </button>
    <div style="height:1px;background:var(--pin-border);margin:4px 0;"></div>
    <button class="dropdown-item-pin danger" onclick="closeDropdown('postDropdown'); openModal('deletePostModal')">
      <i class="bi bi-trash3"></i> Hapus thread
    </button>
  </div>
</div>