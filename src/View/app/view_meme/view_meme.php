<!-- Main -->
<div class="main-content">
  <div class="d-flex" style="min-height:100vh;">

    <!-- Thread Detail Feed -->
    <div class="flex-grow-1">
      <!-- Page Header -->
      <div class="page-header">
        <div class="feed-col">
          <div class="d-flex align-items-center gap-3">
            <a href="home.html" class="btn-pin-ghost p-1"><i class="bi bi-arrow-left"></i></a>
            <h5 style="font-family:'Syne',sans-serif;font-weight:800;font-size:18px;margin:0;">Thread</h5>
          </div>
        </div>
      </div>

      <div class="feed-col pt-3 pb-5">

        <!-- ===== ORIGINAL POST ===== -->
        <div style="padding: 0 0 4px;">
          <!-- Author row -->
          <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-3">
              <div
                style="width:48px;height:48px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:24px;flex-shrink:0;">
                ☕</div>
              <div>
                <div style="font-weight:700;font-size:15px;">
                  <?= $data["meme"]["name"] ? $data["meme"]["name"] : $data["meme"]["username"] ?>
                </div>
                <div style="color:var(--pin-muted);font-size:13px;">@<?= $data["meme"]["username"] ?></div>
              </div>
            </div>
            <!-- Dropdown menu for own post -->
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
                <button class="dropdown-item-pin danger"
                  onclick="closeDropdown('postDropdown'); openModal('deletePostModal')">
                  <i class="bi bi-trash3"></i> Hapus thread
                </button>
              </div>
            </div>
          </div>

          <!-- Post content -->
          <p class="original-post-content"><?= $data["meme"]["caption"] ?></p>

          <!-- Image -->
          <?php if (isset($data["meme"]["image_url"])): ?>
            <div class="post-image-wrap">
              <img src="<?= $data["meme"]['image_url'] ?>" alt="Meme image"
                style="width:100%;height:auto;max-height:400px;object-fit:cover;display:block;" />
            </div>
          <?php endif ?>

          <!-- Timestamp -->
          <div class="post-meta-row">
            <span>07.24 · 9 Mei 2026</span>
            <span class="ms-2">· <strong style="color:var(--pin-white);">PinThread Web</strong></span>
          </div>

          <!-- Stats row -->
          <div class="post-stats my-3 pb-3" style="border-bottom:1px solid var(--pin-border);">
            <div class="post-stat">
              <span>142</span> <small>Suka</small>
            </div>
            <div class="post-stat">
              <span>28</span> <small>Komentar</small>
            </div>
            <div class="post-stat">
              <span>14</span> <small>Repost</small>
            </div>
            <div class="post-stat">
              <span>6</span> <small>Disimpan</small>
            </div>
          </div>

          <!-- Actions row -->
          <div class="thread-actions pb-3" style="border-bottom:1px solid var(--pin-border);">
            <button class="thread-action-btn" data-action="like" style="font-size:20px; padding:8px 14px;">
              <i class="bi bi-heart"></i>
            </button>
            <button class="thread-action-btn" style="font-size:20px; padding:8px 14px;" onclick="focusCommentBox()">
              <i class="bi bi-chat"></i>
            </button>
            <button class="thread-action-btn" style="font-size:20px; padding:8px 14px;">
              <i class="bi bi-arrow-repeat"></i>
            </button>
            <button class="thread-action-btn" style="font-size:20px; padding:8px 14px;">
              <i class="bi bi-send"></i>
            </button>
            <button class="thread-action-btn ms-auto" style="font-size:20px; padding:8px 14px;">
              <i class="bi bi-bookmark"></i>
            </button>
          </div>
        </div>

        <!-- ===== ADD COMMENT ===== -->
        <div class="comment-compose" id="commentSection">
          <div class="d-flex gap-3 align-items-start">
            <div
              style="width:40px;height:40px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;">
              🙂</div>
            <div class="flex-grow-1">
              <textarea class="pin-input mb-2" placeholder="Tulis komentar kamu..." rows="2"
                id="commentInput"></textarea>
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex gap-1">
                  <button class="btn-pin-ghost" data-tooltip="Foto"><i class="bi bi-image"></i></button>
                  <button class="btn-pin-ghost" data-tooltip="GIF"><i class="bi bi-file-gif"></i></button>
                  <button class="btn-pin-ghost" data-tooltip="Emoji"><i class="bi bi-emoji-smile"></i></button>
                </div>
                <button class="btn btn-pin btn-sm" onclick="submitComment()">Kirim</button>
              </div>
            </div>
          </div>
        </div>

        <!-- ===== COMMENTS LIST ===== -->
        <div id="commentsContainer">

          <!-- Comment 1 -->
          <div class="comment-item fade-up" style="animation-delay:0.05s">
            <div class="d-flex gap-3">
              <div class="d-flex flex-column align-items-center">
                <div
                  style="width:40px;height:40px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
                  🚀</div>
                <div class="comment-thread-line flex-grow-1 mt-2" style="min-height:16px;"></div>
              </div>
              <div class="flex-grow-1 pb-2">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Dito Pramono</span>
                    <span style="color:var(--pin-muted);font-size:12px;margin-left:6px;">@ditopram · 5 menit lalu</span>
                  </div>
                  <div class="action-menu-wrap">
                    <button class="btn-pin-ghost p-1" onclick="toggleDropdown('commentDrop1')">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <div class="dropdown-menu-pin" id="commentDrop1">
                      <button class="dropdown-item-pin" onclick="copyLink(); closeDropdown('commentDrop1')">
                        <i class="bi bi-link-45deg"></i> Salin tautan
                      </button>
                      <button class="dropdown-item-pin"
                        onclick="replyTo('Dito Pramono'); closeDropdown('commentDrop1')">
                        <i class="bi bi-reply"></i> Balas
                      </button>
                      <div style="height:1px;background:var(--pin-border);margin:4px 0;"></div>
                      <button class="dropdown-item-pin danger"
                        onclick="closeDropdown('commentDrop1'); openModal('deleteCommentModal')">
                        <i class="bi bi-trash3"></i> Hapus komentar
                      </button>
                    </div>
                  </div>
                </div>
                <p style="font-size:14px;margin-bottom:10px;">Wah bener banget! Gue juga selalu mulai hari dengan lo-fi,
                  bikin otak langsung masuk mode fokus 🎧</p>
                <div class="thread-actions">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">24</span></button>
                  <button class="thread-action-btn" onclick="replyTo('Dito Pramono')"><i class="bi bi-chat"></i><span
                      class="action-count">2</span></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Comment 1 — Reply -->
          <div class="comment-item fade-up" style="animation-delay:0.1s; padding-left:56px;">
            <div class="d-flex gap-3">
              <div
                style="width:36px;height:36px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:17px;flex-shrink:0;">
                🙂</div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:13px;">Anya Kartika</span>
                    <span class="ms-1" style="font-size:11px;color:var(--pin-yellow);font-weight:600;">Kamu</span>
                    <span style="color:var(--pin-muted);font-size:12px;margin-left:6px;">· 3 menit lalu</span>
                  </div>
                  <div class="action-menu-wrap">
                    <button class="btn-pin-ghost p-1" onclick="toggleDropdown('commentDrop1r')">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <div class="dropdown-menu-pin" id="commentDrop1r">
                      <button class="dropdown-item-pin" onclick="copyLink(); closeDropdown('commentDrop1r')">
                        <i class="bi bi-link-45deg"></i> Salin tautan
                      </button>
                      <div style="height:1px;background:var(--pin-border);margin:4px 0;"></div>
                      <button class="dropdown-item-pin danger"
                        onclick="closeDropdown('commentDrop1r'); openModal('deleteCommentModal')">
                        <i class="bi bi-trash3"></i> Hapus komentar
                      </button>
                    </div>
                  </div>
                </div>
                <div class="reply-to-badge"><i class="bi bi-reply-fill"></i> Membalas @ditopram</div>
                <p style="font-size:13px;margin-bottom:8px;">Iya! Playlistnya udah gue set dari malem, jadi langsung
                  play pas bangun. Highly recommend ✨</p>
                <div class="thread-actions">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">8</span></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Comment 2 -->
          <div class="comment-item fade-up" style="animation-delay:0.12s">
            <div class="d-flex gap-3">
              <div
                style="width:40px;height:40px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
                🎨</div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Rina Sulastri</span>
                    <span style="color:var(--pin-muted);font-size:12px;margin-left:6px;">@rinasul · 12 menit lalu</span>
                  </div>
                  <div class="action-menu-wrap">
                    <button class="btn-pin-ghost p-1" onclick="toggleDropdown('commentDrop2')">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <div class="dropdown-menu-pin" id="commentDrop2">
                      <button class="dropdown-item-pin" onclick="copyLink(); closeDropdown('commentDrop2')">
                        <i class="bi bi-link-45deg"></i> Salin tautan
                      </button>
                      <button class="dropdown-item-pin"
                        onclick="replyTo('Rina Sulastri'); closeDropdown('commentDrop2')">
                        <i class="bi bi-reply"></i> Balas
                      </button>
                      <button class="dropdown-item-pin danger"
                        onclick="closeDropdown('commentDrop2'); showToast('Laporkan komentar', 'default')">
                        <i class="bi bi-flag"></i> Laporkan
                      </button>
                    </div>
                  </div>
                </div>
                <p style="font-size:14px;margin-bottom:10px;">Aesthetic banget! Kopi pagi + lo-fi itu ritual wajib kalau
                  mau masuk flow state 🌅</p>
                <div class="thread-actions">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">17</span></button>
                  <button class="thread-action-btn" onclick="replyTo('Rina Sulastri')"><i class="bi bi-chat"></i><span
                      class="action-count">1</span></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Comment 3 -->
          <div class="comment-item fade-up" style="animation-delay:0.16s">
            <div class="d-flex gap-3">
              <div
                style="width:40px;height:40px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
                🧑‍💻</div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Budi Kodingan</span>
                    <span style="color:var(--pin-muted);font-size:12px;margin-left:6px;">@budikoding · 20 menit
                      lalu</span>
                  </div>
                  <div class="action-menu-wrap">
                    <button class="btn-pin-ghost p-1" onclick="toggleDropdown('commentDrop3')">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <div class="dropdown-menu-pin" id="commentDrop3">
                      <button class="dropdown-item-pin" onclick="copyLink(); closeDropdown('commentDrop3')">
                        <i class="bi bi-link-45deg"></i> Salin tautan
                      </button>
                      <button class="dropdown-item-pin"
                        onclick="replyTo('Budi Kodingan'); closeDropdown('commentDrop3')">
                        <i class="bi bi-reply"></i> Balas
                      </button>
                      <button class="dropdown-item-pin danger"
                        onclick="closeDropdown('commentDrop3'); showToast('Laporkan komentar', 'default')">
                        <i class="bi bi-flag"></i> Laporkan
                      </button>
                    </div>
                  </div>
                </div>
                <p style="font-size:14px;margin-bottom:10px;">Saya lebih ke ngoding sambil dengerin rain sounds sih 😂
                  Tapi lo-fi juga works! Asalkan jangan dengerin podcast, ntar malah kepikiran isi podcast-nya</p>
                <div class="thread-actions">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">31</span></button>
                  <button class="thread-action-btn" onclick="replyTo('Budi Kodingan')"><i class="bi bi-chat"></i><span
                      class="action-count">4</span></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Comment 4 -->
          <div class="comment-item fade-up" style="animation-delay:0.2s">
            <div class="d-flex gap-3">
              <div
                style="width:40px;height:40px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
                🎙️</div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Lena Podcast</span>
                    <span style="color:var(--pin-muted);font-size:12px;margin-left:6px;">@lenapodcast · 35 menit
                      lalu</span>
                  </div>
                  <div class="action-menu-wrap">
                    <button class="btn-pin-ghost p-1" onclick="toggleDropdown('commentDrop4')">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <div class="dropdown-menu-pin" id="commentDrop4">
                      <button class="dropdown-item-pin" onclick="copyLink(); closeDropdown('commentDrop4')">
                        <i class="bi bi-link-45deg"></i> Salin tautan
                      </button>
                      <button class="dropdown-item-pin"
                        onclick="replyTo('Lena Podcast'); closeDropdown('commentDrop4')">
                        <i class="bi bi-reply"></i> Balas
                      </button>
                      <button class="dropdown-item-pin danger"
                        onclick="closeDropdown('commentDrop4'); showToast('Laporkan komentar', 'default')">
                        <i class="bi bi-flag"></i> Laporkan
                      </button>
                    </div>
                  </div>
                </div>
                <p style="font-size:14px;margin-bottom:10px;">Kopi pagi tapi gue baru bisa mulai produktif jam 11 siang
                  😭 Morning person mana morning person</p>
                <div class="thread-actions">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">52</span></button>
                  <button class="thread-action-btn" onclick="replyTo('Lena Podcast')"><i class="bi bi-chat"></i><span
                      class="action-count">7</span></button>
                </div>
              </div>
            </div>
          </div>

        </div><!-- end commentsContainer -->

        <!-- Load more comments -->
        <div class="text-center py-4">
          <button class="btn btn-pin-outline" onclick="loadMoreComments()">Muat lebih banyak komentar</button>
        </div>

      </div><!-- end feed-col -->
    </div><!-- end flex-grow-1 -->
  </div>
</div>