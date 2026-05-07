<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data["title"] ?></title>
  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/public/css/style.css">
  <?php if (isset($data["style"])): ?>
    <link rel="stylesheet" href="/public/css/<?= $data["style"] ?>">
  <?php endif ?>
</head>

<body>

  <body>
    <div class="app-layout">
      <!-- Sidebar -->
      <aside class="sidebar">
        <div class="sidebar-logo"><i class="bi bi-pin-angle-fill" style="color:var(--pin-yellow)"></i>
          Pin<span>Thread</span></div>
        <ul class="sidebar-nav">
          <li><a href="home.html" class="active"><span class="nav-icon"><i class="bi bi-house-fill"></i></span> Home</a>
          </li>
          <li><a href="explore.html"><span class="nav-icon"><i class="bi bi-compass"></i></span> Explore</a></li>
          <li><a href="profile.html"><span class="nav-icon"><i class="bi bi-person"></i></span> Profil</a></li>
        </ul>
        <div class="sidebar-footer">
          <button class="btn btn-pin w-100 mb-3" onclick="openModal('composeModal')">
            <i class="bi bi-pen me-2"></i>Thread Baru
          </button>
          <a href="profile.html" class="sidebar-user">
            <div
              style="width:38px;height:38px;border-radius:50%;background:var(--pin-card);border:1.5px solid var(--pin-border);display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;">
              🙂</div>
            <div class="sidebar-user-info">
              <div class="name">Anya Kartika</div>
              <div class="handle">@anya.k</div>
            </div>
            <i class="bi bi-three-dots" style="color:var(--pin-muted)"></i>
          </a>
        </div>
      </aside>