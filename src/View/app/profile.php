<!-- Main -->
<div class="main-content">
  <div class="d-flex">
    <div class="flex-grow-1">
      <!-- Page header -->
      <div class="page-header">
        <div class="feed-col">
          <div class="d-flex align-items-center gap-3">
            <a href="home.html" class="btn-pin-ghost p-1"><i class="bi bi-arrow-left"></i></a>
            <div>
              <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:16px;"><?= $data["user"]["name"] ? $data["user"]["name"] : $data["user"]["username"] ?></div>
              <div style="color:var(--pin-muted);font-size:12px;">328 thread</div>
            </div>
          </div>
        </div>
      </div>

      <div class="feed-col">
        <!-- Banner -->
        <div class="profile-banner">
          <div class="banner-pattern"></div>
        </div>

        <!-- Profile info -->
        <div style="padding:0 4px;">
          <div class="d-flex align-items-flex-start justify-content-between">
            <div class="profile-avatar-wrap">
              <div class="profile-avatar">🙂</div>
              <div class="online-badge"></div>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button class="btn btn-pin-outline btn-sm" onclick="openModal('editProfileModal')">
                <i class="bi bi-pencil me-1"></i>Edit Profil
              </button>
              <a href="/logout" class="btn btn-pin-outline btn-sm">
                <i class="bi bi-box-arrow-right me-1"></i>Keluar
              </a>
            </div>
          </div>

          <div style="padding:16px 0 0;">
            <div style="font-family:'Syne',sans-serif;font-weight:800;font-size:22px;"><?= $data["user"]["name"] ? $data["user"]["name"] : $data["user"]["username"] ?></div>
            <div style="color:var(--pin-muted);font-size:14px;margin-bottom:12px;">@<?= $data["user"]["username"] ?></div>
            <?php if ($data["user"]["bio"]): ?>
              <p style="font-size:14px;line-height:1.65;max-width:480px;margin-bottom:12px;"><?= $data["user"]["bio"] ?></p>
            <?php endif ?>
          </div>

          <div class="profile-stats">
            <div class="profile-stat" onclick="openModal('followersModal')">
              <span class="num">2,841</span>
              <span class="label">Pengikut</span>
            </div>
            <div class="profile-stat" onclick="openModal('followingModal')">
              <span class="num">512</span>
              <span class="label">Mengikuti</span>
            </div>
            <div class="profile-stat">
              <span class="num">328</span>
              <span class="label">Postingan</span>
            </div>
          </div>
        </div>

        <!-- Tabs -->
        <div class="pin-tabs">
          <button class="pin-tab active" onclick="switchTab(this)">Postingan</button>
          <button class="pin-tab" onclick="switchTab(this)">Media</button>
          <button class="pin-tab" onclick="switchTab(this)">Suka</button>
        </div>

        <!-- Posts -->
        <?php if (!isset($data["memes"]) || empty($data["memes"])): ?>
          <div class="d-flex flex-column align-items-center justify-content-center py-5" style="min-height:260px;">
            <div style="font-size:48px;margin-bottom:16px;">📭</div>
            <h6 style="font-family:'Syne',sans-serif;font-weight:700;color:var(--pin-white);margin-bottom:8px;">Belum ada postingan</h6>
            <p style="color:var(--pin-muted);text-align:center;margin-bottom:24px;max-width:420px;">Kamu belum memiliki postingan. Mulai dengan membuat thread baru untuk berbagi cerita atau gambar.</p>
          </div>
        <?php else: ?>
          <?php foreach ($data["memes"] as $meme): ?>
            <article class="thread-item fade-up" onclick="window.location='thread.html'" style="animation-delay:0.05s">
              <div class="d-flex gap-3">
                <div
                  style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
                  🙂</div>
                <div class="flex-grow-1">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <div><span style="font-weight:700;font-size:14px;"><?= $data["user"]["name"] ? $data["user"]["name"] : $data["user"]["username"] ?></span> <span
                        style="color:var(--pin-muted);font-size:13px;">@<?= $data["user"]["username"] ?> · <?= $meme['created_at'] ?></span></div>
                    <div class="post-menu-wrapper" style="position:relative;">
                      <button class="btn-pin-ghost p-1" onclick="event.stopPropagation(); togglePostMenu(this)" data-meme-id="<?= $meme['user_id'] ?>"><i class="bi bi-three-dots"></i></button>
                      <div class="post-menu" style="display:none; position:absolute; top:100%; right:0; background:var(--pin-card); border:1px solid var(--pin-border); border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.3); z-index:1000; min-width:160px; overflow:hidden;">
                        <button class="post-menu-item" onclick="deletePost(<?= $meme['meme_id'] ?>); event.stopPropagation();" style="width:100%; text-align:left; background:none; border:none; padding:12px 16px; color:var(--pin-white); font-size:14px; cursor:pointer; transition:background 0.15s; display:flex; align-items:center; gap:8px;" onmouseover="this.style.background='rgba(255,255,255,0.06)'" onmouseout="this.style.background='none'">
                          <i class="bi bi-trash" style="color:#ff4d6d;"></i> Hapus
                        </button>
                      </div>
                    </div>
                  </div>
                  <p style="font-size:15px;margin-bottom:12px;"><?= $meme['caption'] ?></p>
                  <?php if (isset($meme['image_url']) && !empty($meme['image_url'])): ?>
                    <div style="border-radius:12px;overflow:hidden;margin-bottom:12px;">
                      <img src="<?= $meme['image_url'] ?>" alt="Meme image" style="width:100%;height:auto;max-height:400px;object-fit:cover;display:block;" />
                    </div>
                  <?php endif ?>
                  <div class="thread-actions">
                    <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                        class="action-count"><?= $meme['likes'] ?? '0' ?></span></button>
                    <button class="thread-action-btn"><i class="bi bi-chat"></i><span
                        class="action-count"><?= $meme['comments'] ?? '0' ?></span></button>
                    <button class="thread-action-btn"><i class="bi bi-arrow-repeat"></i><span
                        class="action-count"><?= $meme['shares'] ?? '0' ?></span></button>
                    <button class="thread-action-btn"><i class="bi bi-send"></i></button>
                  </div>
                </div>
              </div>
            </article>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>

<!-- Edit Profile Modal -->
<div class="pin-modal-overlay" id="editProfileModal">
  <form action="/profile/update" method="POST" class="pin-modal">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <button onclick="closeModal('editProfileModal')" class="btn-pin-ghost p-1"><i class="bi bi-x-lg"></i></button>
      <h6 style="font-family:'Syne',sans-serif;font-weight:700;margin:0;">Edit Profil</h6>
      <button type="submit" class="btn btn-pin btn-sm">Simpan</button>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label-pin">Username</label>
      <input type="text" name="username" id="username" class="pin-input" value="<?= $data["user"]["username"] ?>">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label-pin">Nama</label>
      <input type="text" name="name" id="name" class="pin-input" value="<?= $data["user"]["name"] ?>">
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label-pin">Bio</label>
      <textarea class="pin-input" name="bio" id="bio" rows="3"><?= $data["user"]["bio"] ?></textarea>
    </div>
  </form>
</div>

<!-- Delete Post Modal -->
<div class="pin-modal-overlay" id="deletePostModal">
  <div class="pin-modal">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <button onclick="closeModal('deletePostModal')" class="btn-pin-ghost p-1"><i class="bi bi-x-lg"></i></button>
      <h6 style="font-family:'Syne',sans-serif;font-weight:700;margin:0;">Hapus Postingan</h6>
      <div></div>
    </div>
    <p>Apakah Anda yakin ingin menghapus postingan ini? Tindakan ini tidak dapat dibatalkan.</p>
    <div class="d-flex gap-2 mt-4">
      <button onclick="closeModal('deletePostModal')" class="btn btn-pin-outline btn-sm">Batal</button>
      <a href="/meme/delete?meme_id=<?= $meme['meme_id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
    </div>
  </div>
</div>