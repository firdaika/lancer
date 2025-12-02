<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background-color: #A9C7F6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    /* ===== HEADER ===== */
    header {
      width: 100%;
      background-color: #1A237E;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 20px;
      position: relative;
    }

    header .back {
      display: flex;
      align-items: center;
      gap: 8px;
      font-weight: 500;
      cursor: pointer;
    }

    header .title {
      font-weight: 600;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
    }

    /* ===== CONTENT ===== */
    .content {
      width: 100%;
      text-align: center;
      margin-top: 60px;
      padding: 0 20px;
    }

    /* ===== LIST WRAPPER ===== */
    .jadwal-list {
      width: 100%;
      max-width: 470px;
      margin: 20px auto;
    }

    /* ===== CARD JADWAL MODERN ===== */
    .jadwal-card {
      background: #ffffff;
      border-radius: 14px;
      padding: 18px 18px 20px;
      margin-bottom: 16px;
      box-shadow: 0 5px 14px rgba(0,0,0,0.15);
      border-left: 6px solid #1A237E;
      animation: fadeIn 0.25s ease-in-out;
      position: relative;
    }

    .jadwal-card::before {
      content: "📅";
      position: absolute;
      right: 15px;
      top: 15px;
      font-size: 20px;
      opacity: 0.8;
    }

    .jadwal-card strong {
      font-size: 14px;
      color: #1A237E;
      display: block;
      margin-bottom: 6px;
    }

    .jadwal-card div {
      margin: 3px 0;
      font-size: 13px;
      color: #333;
    }

    /* ===== JOIN BUTTON ===== */
    .join-btn {
      background: #1A237E;
      color: white !important;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
      font-size: 13px;
      transition: 0.2s;
    }

    .join-btn:hover {
      background: #283593;
    }

    /* ===== ANIMATION ===== */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>

</head>
<body>

<header>
  <div class="back" onclick="window.history.back()">
    <span>&larr;</span> KEMBALI
  </div>
  <div class="title">JADWAL</div>
</header>

<div class="content">
  @if(isset($pesan))
    <h2>{{ $pesan }}</h2>
  @elseif(count($jadwal) === 0)
    <h2>Belum ada jadwal atau langgananmu sudah habis.</h2>
  @else
    <h2>JADWAL KELAS</h2>
    <div class="jadwal-list">
      @foreach($jadwal as $j)
        <div class="jadwal-card">
          <strong>{{ $j->kelas }} — {{ $j->materi->mapel->mapel }} - {{ $j->materi->namaMateri }}</strong> <br>
          {{ \Carbon\Carbon::parse($j->tanggal)->translatedFormat('l, d F Y') }} <br>
          Jam: {{ $j->jam_mulai }} - {{ $j->jam_selesai ?? '-' }} <br>
          Pengajar: {{ $j->pengajar }} <br>

          @if($j->gmeet_link)
          <a href="{{ $j->gmeet_link }}" class="join-btn" target="_blank">Join GMeet</a>
          @endif
        </div>
      @endforeach
    </div>
  @endif
</div>

<script>
  // Jika ada dropdown/menu tambahan nanti
  const menuBtn = document.getElementById("menuBtn");
  const dropdown = document.getElementById("dropdownMenu");
  if(menuBtn){
    menuBtn.addEventListener("click", () => {
      dropdown.style.display = dropdown.style.display === "flex" ? "none" : "flex";
    });
    window.addEventListener("click", (e) => {
      if (!menuBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = "none";
      }
    });
  }
</script>

</body>
</html>
