<!-- Main -->
<div class="main-content">
  <div class="d-flex" style="min-height:100vh;">
    <!-- Feed -->
    <div class="flex-grow-1">
      <div class="page-header">
        <div class="feed-col">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h5 style="font-family:'Syne',sans-serif;font-weight:800;font-size:20px;margin:0;">Home</h5>
          </div>
          <div class="pin-tabs">
            <button class="pin-tab active" onclick="switchTab(this, 'forYou')">Untuk Kamu</button>
            <button class="pin-tab" onclick="switchTab(this, 'following')">Mengikuti</button>
          </div>
        </div>
      </div>

      <div class="feed-col pt-2">
        <!-- Compose -->
        <div class="compose-box">
          <div class="d-flex gap-3 align-items-start">
            <div
              style="width:42px;height:42px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
              🙂</div>
            <div class="flex-grow-1">
              <textarea class="pin-input mb-3" placeholder="Apa yang kamu pikirkan?" rows="2"
                id="composeText"></textarea>
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex gap-1">
                  <button class="btn-pin-ghost" data-tooltip="Foto"><i class="bi bi-image"></i></button>
                  <button class="btn-pin-ghost" data-tooltip="GIF"><i class="bi bi-file-gif"></i></button>
                  <button class="btn-pin-ghost" data-tooltip="Polling"><i class="bi bi-bar-chart-line"></i></button>
                  <button class="btn-pin-ghost" data-tooltip="Lokasi"><i class="bi bi-geo-alt"></i></button>
                </div>
                <button class="btn btn-pin btn-sm" onclick="postThread()">Post</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Feed Items -->
        <div id="feedContainer">
          <!-- Post 1 -->
          <article class="thread-item fade-up" onclick="window.location='thread.html'" style="animation-delay:0.05s">
            <div class="d-flex gap-3">
              <div class="d-flex flex-column align-items-center">
                <div
                  style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
                  😊</div>
                <div class="thread-connector flex-grow-1 mt-2" style="min-height:20px;"></div>
              </div>
              <div class="flex-grow-1 pb-2">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Anya Kartika</span>
                    <span style="color:var(--pin-muted);font-size:13px;margin-left:6px;">@anya.k · 2 menit
                      lalu</span>
                  </div>
                  <button class="btn-pin-ghost p-1" onclick="event.stopPropagation()"><i
                      class="bi bi-three-dots"></i></button>
                </div>
                <p style="font-size:15px;margin-bottom:12px;">Pagi yang sempurna dengan secangkir kopi ☕ dan
                  playlist lo-fi. Produktivitas hari ini bakal on fire! 🔥</p>
                <div style="background:var(--pin-mid);border-radius:12px;overflow:hidden;margin-bottom:12px;">
                  <div
                    style="background:linear-gradient(135deg,#2a2a2a,#1a1a1a);height:160px;display:flex;align-items:center;justify-content:center;font-size:48px;">
                    ☕</div>
                </div>
                <div class="thread-actions" onclick="event.stopPropagation()">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
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

          <!-- Post 2 -->
          <article class="thread-item fade-up" onclick="window.location='thread.html'" style="animation-delay:0.1s">
            <div class="d-flex gap-3">
              <div class="d-flex flex-column align-items-center">
                <div
                  style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
                  🚀</div>
                <div class="thread-connector flex-grow-1 mt-2" style="min-height:20px;"></div>
              </div>
              <div class="flex-grow-1 pb-2">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Dito Pramono</span>
                    <span class="pin-badge ms-2" style="font-size:10px;padding:2px 8px;">Creator</span>
                    <span style="color:var(--pin-muted);font-size:13px;margin-left:6px;">@ditopram · 15 menit
                      lalu</span>
                  </div>
                  <button class="btn-pin-ghost p-1" onclick="event.stopPropagation()"><i
                      class="bi bi-three-dots"></i></button>
                </div>
                <p style="font-size:15px;margin-bottom:8px;">🧵 Thread: Kenapa desain bukan cuma soal estetika,
                  tapi tentang memecahkan masalah nyata.</p>
                <p style="font-size:15px;color:var(--pin-muted);margin-bottom:12px;">Desain yang baik tidak
                  menarik perhatian. Desain yang baik membuat penggunanya lupa mereka sedang berinteraksi dengan
                  sebuah produk...</p>
                <div class="thread-actions" onclick="event.stopPropagation()">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">89</span></button>
                  <button class="thread-action-btn"><i class="bi bi-chat"></i><span
                      class="action-count">45</span></button>
                  <button class="thread-action-btn"><i class="bi bi-arrow-repeat"></i><span
                      class="action-count">62</span></button>
                  <button class="thread-action-btn"><i class="bi bi-send"></i></button>
                </div>
              </div>
            </div>
          </article>

          <!-- Post 3 - with quote -->
          <article class="thread-item fade-up" onclick="window.location='thread.html'" style="animation-delay:0.15s">
            <div class="d-flex gap-3">
              <div
                style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
                🎨</div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Rina Sulastri</span>
                    <span style="color:var(--pin-muted);font-size:13px;margin-left:6px;">@rinasul · 1 jam
                      lalu</span>
                  </div>
                  <button class="btn-pin-ghost p-1" onclick="event.stopPropagation()"><i
                      class="bi bi-three-dots"></i></button>
                </div>
                <p style="font-size:15px;margin-bottom:10px;">Setuju banget sama pendapat ini. Baru nonton filmnya
                  semalam dan literally speechless 🎬</p>
                <!-- Quote post -->
                <div
                  style="border:1px solid var(--pin-border);border-radius:12px;padding:12px;margin-bottom:12px;background:var(--pin-mid);">
                  <div class="d-flex align-items-center gap-2 mb-1">
                    <div
                      style="width:20px;height:20px;border-radius:50%;background:var(--pin-card);display:flex;align-items:center;justify-content:center;font-size:11px;">
                      🎬</div>
                    <span style="font-weight:600;font-size:13px;">Budi K.</span>
                    <span style="color:var(--pin-muted);font-size:12px;">@budikoding</span>
                  </div>
                  <p style="font-size:13px;color:var(--pin-muted);margin:0;">Film ini adalah karya terbaik yang
                    pernah saya tonton tahun ini. Storyline-nya luar biasa.</p>
                </div>
                <div class="thread-actions" onclick="event.stopPropagation()">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">203</span></button>
                  <button class="thread-action-btn"><i class="bi bi-chat"></i><span
                      class="action-count">61</span></button>
                  <button class="thread-action-btn"><i class="bi bi-arrow-repeat"></i><span
                      class="action-count">37</span></button>
                  <button class="thread-action-btn"><i class="bi bi-send"></i></button>
                </div>
              </div>
            </div>
          </article>

          <!-- Post 4 -->
          <article class="thread-item fade-up" onclick="window.location='thread.html'" style="animation-delay:0.2s">
            <div class="d-flex gap-3">
              <div
                style="width:44px;height:44px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;">
                🧑‍💻</div>
              <div class="flex-grow-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                  <div>
                    <span style="font-weight:700;font-size:14px;">Budi Kodingan</span>
                    <span style="color:var(--pin-muted);font-size:13px;margin-left:6px;">@budikoding · 2 jam
                      lalu</span>
                  </div>
                  <button class="btn-pin-ghost p-1" onclick="event.stopPropagation()"><i
                      class="bi bi-three-dots"></i></button>
                </div>
                <p style="font-size:15px;margin-bottom:12px;">Siapa yang relate? Estimasi proyek: 2 jam. Realita:
                  2 minggu 😅 #ProgrammerLife</p>
                <!-- Poll -->
                <div style="border:1px solid var(--pin-border);border-radius:12px;overflow:hidden;margin-bottom:12px;">
                  <div style="padding:14px;border-bottom:1px solid var(--pin-border);">
                    <div style="font-size:13px;font-weight:600;margin-bottom:8px;">Seberapa sering ini terjadi
                      padamu?</div>
                    <div class="poll-option"
                      style="background:var(--pin-mid);border-radius:8px;padding:10px 14px;margin-bottom:8px;position:relative;overflow:hidden;cursor:pointer;"
                      onclick="votePoll(this, 72)">
                      <div
                        style="position:absolute;left:0;top:0;height:100%;width:72%;background:rgba(255,224,51,0.1);border-radius:8px;">
                      </div>
                      <div style="position:relative;display:flex;justify-content:space-between;font-size:13px;">
                        <span>Selalu 😭</span><span style="color:var(--pin-yellow);font-weight:700;">72%</span>
                      </div>
                    </div>
                    <div class="poll-option"
                      style="background:var(--pin-mid);border-radius:8px;padding:10px 14px;position:relative;overflow:hidden;cursor:pointer;"
                      onclick="votePoll(this, 28)">
                      <div
                        style="position:absolute;left:0;top:0;height:100%;width:28%;background:rgba(255,224,51,0.06);border-radius:8px;">
                      </div>
                      <div style="position:relative;display:flex;justify-content:space-between;font-size:13px;">
                        <span>Jarang sekali</span><span style="color:var(--pin-muted);font-weight:700;">28%</span>
                      </div>
                    </div>
                  </div>
                  <div style="padding:8px 14px;font-size:12px;color:var(--pin-muted);">1.2K suara · Berakhir dalam
                    2 hari</div>
                </div>
                <div class="thread-actions" onclick="event.stopPropagation()">
                  <button class="thread-action-btn" data-action="like"><i class="bi bi-heart"></i><span
                      class="action-count">512</span></button>
                  <button class="thread-action-btn"><i class="bi bi-chat"></i><span
                      class="action-count">98</span></button>
                  <button class="thread-action-btn"><i class="bi bi-arrow-repeat"></i><span
                      class="action-count">201</span></button>
                  <button class="thread-action-btn"><i class="bi bi-send"></i></button>
                </div>
              </div>
            </div>
          </article>
        </div>

        <!-- Load more -->
        <div class="text-center py-4">
          <button class="btn btn-pin-outline" onclick="loadMore()">Muat lebih banyak</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/public/js/home.js"></script>