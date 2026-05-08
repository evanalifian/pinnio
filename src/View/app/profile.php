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
        <article class="thread-item fade-up">
          <div class="d-flex gap-3">
            <div
              style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
              🙂</div>
            <div class="flex-grow-1">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <div><span style="font-weight:700;font-size:14px;">Anya Kartika</span> <span
                    style="color:var(--pin-muted);font-size:13px;">@anya.k · 2m</span></div>
                <button class="btn-pin-ghost p-1"><i class="bi bi-three-dots"></i></button>
              </div>
              <p style="font-size:15px;margin-bottom:12px;">Pagi yang sempurna dengan secangkir kopi ☕ dan playlist
                lo-fi. Produktivitas hari ini bakal on fire! 🔥</p>
              <div class="thread-actions">
                <button class="thread-action-btn liked" data-action="like"><i class="bi bi-heart-fill"></i><span
                    class="action-count">142</span></button>
                <button class="thread-action-btn"><i class="bi bi-chat"></i><span
                    class="action-count">28</span></button>
                <button class="thread-action-btn"><i class="bi bi-arrow-repeat"></i><span
                    class="action-count">14</span></button>
                <button class="thread-action-btn"><i class="bi bi-send"></i></button>
              </div>
            </div>
          </div>
        </article>

        <article class="thread-item fade-up" style="animation-delay:0.1s">
          <div class="d-flex gap-3">
            <div
              style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
              🙂</div>
            <div class="flex-grow-1">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <div><span style="font-weight:700;font-size:14px;">Anya Kartika</span> <span
                    style="color:var(--pin-muted);font-size:13px;">@anya.k · 1h</span></div>
                <button class="btn-pin-ghost p-1"><i class="bi bi-three-dots"></i></button>
              </div>
              <p style="font-size:15px;margin-bottom:12px;">🧵 5 hal yang saya pelajari dari 1 tahun freelance sebagai
                UI/UX Designer:<br><br>1. Rate kamu bukan hanya soal skill, tapi juga nilai yang kamu bawa ke
                klien<br><br>2. Komunikasi > desain sempurna<br><br>3. ...</p>
              <a href="thread.html" style="color:var(--pin-yellow);font-size:13px;">Baca selengkapnya →</a>
              <div class="thread-actions mt-2">
                <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                    class="action-count">891</span></button>
                <button class="thread-action-btn"><i class="bi bi-chat"></i><span
                    class="action-count">124</span></button>
                <button class="thread-action-btn"><i class="bi bi-arrow-repeat"></i><span
                    class="action-count">302</span></button>
                <button class="thread-action-btn"><i class="bi bi-send"></i></button>
              </div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>

<!-- Edit Profile Modal -->
<div class="pin-modal-overlay" id="editProfileModal">
  <div class="pin-modal">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <button onclick="closeModal('editProfileModal')" class="btn-pin-ghost p-1"><i class="bi bi-x-lg"></i></button>
      <h6 style="font-family:'Syne',sans-serif;font-weight:700;margin:0;">Edit Profil</h6>
      <button class="btn btn-pin btn-sm" onclick="saveProfile()">Simpan</button>
    </div>
    <div class="mb-3">
      <label class="form-label-pin">Nama</label>
      <input type="text" class="pin-input" value="Anya Kartika">
    </div>
    <div class="mb-3">
      <label class="form-label-pin">Bio</label>
      <textarea class="pin-input" rows="3">UI/UX Designer & Coffee Enthusiast ☕</textarea>
    </div>
    <div class="mb-3">
      <label class="form-label-pin">Website</label>
      <input type="url" class="pin-input" value="anyakartika.design">
    </div>
    <div>
      <label class="form-label-pin">Lokasi</label>
      <input type="text" class="pin-input" value="Jakarta, Indonesia">
    </div>
  </div>
</div>