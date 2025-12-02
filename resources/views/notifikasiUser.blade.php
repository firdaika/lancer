<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifikasi</title>
<style>
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #98B9EE;
      color: white;
      min-height: 100vh;
    }

    /* ====== HEADER ====== */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 25px;
      background: #1B449C;
      position: relative;
      height: 100px;
    }

    .back {
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
    }

    .menu {
      font-size: 24px;
      cursor: pointer;
      transition: 0.3s;
      user-select: none;
    }

    .menu:hover {
      transform: scale(1.1);
    }

    /* ====== MENU DROPDOWN ====== */
    .dropdown {
      position: absolute;
      top: 60px;
      right: 20px;
      background: #1B2E91;
      width: 180px;
      border-radius: 4px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      display: none;
      flex-direction: column;
      z-index: 100;
    }

    .dropdown.active {
      display: flex;
    }

    .dropdown a {
      color: white;
      text-decoration: none;
      padding: 12px 16px;
      transition: 0.3s;
      font-size: 14px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .dropdown a:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .dropdown a:last-child {
      border-bottom: none;
    }

    /* ====== PROFILE SECTION ====== */
    .profile-section {
      text-align: center;
      padding: 40px 20px;
    }

    .profile-photo img {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      border: 3px solid white;
      object-fit: cover;
    }

    h2 {
      margin-top: 10px;
      font-size: 22px;
      font-weight: 600;
    }

    p {
      font-size: 14px;
      opacity: 0.9;
    }

    .edit-btn {
      background: none;
      border: 1px solid white;
      color: white;
      padding: 6px 14px;
      border-radius: 8px;
      margin-top: 15px;
      cursor: pointer;
      transition: 0.3s;
    }

    .edit-btn:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    /* ====== STATISTIK ====== */
    .stats-container {
      background: rgba(0, 0, 0, 0.08);
      border-radius: 12px;
      padding: 20px;
      width: 90%;
      margin: 30px auto;
      text-align: left;
      border: 1px solid rgba(0, 0, 0, 1);
    }

    .stats-container h3 {
      font-size: 14px;
      margin-bottom: 10px;
      letter-spacing: 0.5px;
    }

    .stats-grid {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 15px;
    }

    .stat-box {
      flex: 1;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      text-align: center;
      padding: 12px;
      min-width: 90px;
    }

    .stat-box i {
      font-size: 20px;
      display: block;
      margin-bottom: 5px;
    }

    .achievement {
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      padding: 10px 14px;
      width: fit-content;
    }

    .achievement i {
      font-size: 20px;
    }

    /* ====== BUBBLE NOTIFICATION STYLE ====== */
.notif-container {
  padding: 20px;
}

.notif-box {
  max-width: 80%;
  background: white;
  color: #333;
  padding: 14px 18px;
  margin: 12px 0;
  border-radius: 14px 14px 14px 4px; /* bubble shape */
  box-shadow: 0 3px 8px rgba(0,0,0,0.2);
  position: relative;
  animation: fadeIn 0.3s ease;
}

/* ekor bubble */
.notif-box::after {
  content: "";
  position: absolute;
  left: -8px;
  bottom: 12px;
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-right: 10px solid white;
  border-bottom: 10px solid transparent;
}

/* status warna */
.notif-box.berhasil {
  border-left: 5px solid #2ecc71;
}
.notif-box.gagal {
  border-left: 5px solid #e74c3c;
}
.notif-box.expired {
  border-left: 5px solid #f1c40f;
}

/* unread highlight */
.notif-box.unread {
  background: #dce7ff;
  border-left-color: #1b3bb3;
}

/* judul */
.notif-title {
  font-weight: 700;
  margin-bottom: 4px;
  font-size: 15px;
}

/* isi pesan */
.notif-content {
  font-size: 14px;
  line-height: 1.4;
}

/* waktu */
.notif-time {
  font-size: 12px;
  opacity: 0.7;
  margin-top: 6px;
  display: block;
}

.empty {
  text-align: center;
  margin-top: 20px;
  opacity: 0.7;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(8px); }
  to { opacity: 1; transform: translateY(0); }
}

</style>
</head>
<body>

  <header>
    <div class="back" onclick="window.history.back()">← Kembali</div>
    <div class="menu" onclick="toggleMenu()">☰</div>
    <div class="dropdown" id="dropdownMenu">
      <a href="/home">Home</a>
      <a href="/profile">Profil</a>  <!-- ganti sesuai route realmu jika beda -->
      <a href="/logout">Logout</a>
    </div>
  </header>

  <section class="notif-container">
      <h2>Notifikasi</h2>

      @forelse($notif as $n)
      @php
        // tentukan kelas status: berhasil / gagal / expired / unread
        $statusClass = 'normal';
        if (str_contains(strtolower($n->judul), 'berhasil')) $statusClass = 'berhasil';
        if (str_contains(strtolower($n->judul), 'gagal')) $statusClass = 'gagal';
        if (str_contains(strtolower($n->judul), 'expired') || str_contains(strtolower($n->judul), 'berakhir')) $statusClass = 'expired';
        if (!$n->read) $statusClass .= ' unread';
      @endphp

      <div class="notif-box {{ trim($statusClass) }}">
        <div class="notif-title">{{ $n->judul }}</div>
        <div class="notif-content">{{ $n->pesan }}</div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px">
          <span class="notif-time">{{ $n->created_at->diffForHumans() }}</span>
          @if(!$n->read)
            <a href="{{ route('notifikasi.baca', $n->id) }}" style="color:inherit;text-decoration:underline;font-size:13px">Tandai sebagai dibaca</a>
          @endif
        </div>
      </div>
      @empty
      <p class="empty">Belum ada notifikasi</p>
      @endforelse

  </section>

<script>
function toggleMenu() {
  document.getElementById("dropdownMenu").classList.toggle("active");
}
</script>

</body>
</html>
