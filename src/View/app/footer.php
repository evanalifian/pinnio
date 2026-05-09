</div>

<!-- Compose Modal -->
<div class="pin-modal-overlay" id="composeModal">
  <div class="pin-modal">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <button onclick="closeModal('composeModal')" class="btn-pin-ghost p-1"><i class="bi bi-x-lg"></i></button>
      <h6 style="font-family:'Syne',sans-serif;font-weight:700;margin:0;">Thread Baru</h6>
      <button class="btn btn-pin btn-sm" onclick="postThread()">Post</button>
    </div>
    <div class="d-flex gap-3">
      <div
        style="width:42px;height:42px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
        🙂</div>
      <div class="flex-grow-1">
        <div style="font-weight:600;font-size:14px;margin-bottom:8px;">anya.k</div>
        <textarea class="pin-input" placeholder="Apa yang kamu pikirkan?" rows="4" id="modalComposeText"></textarea>
        <div class="d-flex gap-2 mt-3">
          <button class="btn-pin-ghost"><i class="bi bi-image"></i></button>
          <button class="btn-pin-ghost"><i class="bi bi-file-gif"></i></button>
          <button class="btn-pin-ghost"><i class="bi bi-geo-alt"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="public/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/app.js"></script>
<?php if (isset($data["script"])): ?>
  <?php foreach ($data["script"] as $script): ?>
    <script src="/public/js/<?= $script ?>"></script>
  <?php endforeach ?>
<?php endif ?>
</body>

</html>