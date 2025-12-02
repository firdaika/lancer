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

    /* HEADER */
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

    header .menu {
      font-size: 26px;
      cursor: pointer;
    }

    /* DROPDOWN MENU */
    .dropdown {
      position: absolute;
      top: 60px;
      right: 20px;
      background-color: #1A237E;
      border-radius: 10px;
      overflow: hidden;
      display: none;
      flex-direction: column;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      z-index: 10;
    }

    .dropdown a {
      color: white;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: 500;
      transition: background 0.3s;
    }

    .dropdown a:hover {
      background-color: #2c3ab5;
    }

    /* MAIN CONTENT */
    .content {
      width: 100%;
      text-align: center;
      margin-top: 60px;
      padding: 0 20px;
    }

    .content img {
      width: 180px;
      margin-bottom: 20px;
    }

    .content h2 {
      color: #1A237E;
      font-weight: 600;
      font-size: 15px;
      margin-bottom: 6px;
      letter-spacing: 0.5px;
    }

    .content p {
      color: #3b3b3b;
      font-size: 13px;
      margin-bottom: 20px;
    }

    .content button {
      background-color: #1A237E;
      color: white;
      border: none;
      padding: 10px 30px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .content button:hover {
      background-color: #2c3ab5;
    }

    /* CARD JADWAL */
    .jadwal-list {
      width: 100%;
      max-width: 450px;
      margin: 20px auto;
    }

    .jadwal-card {
      background: white;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      text-align: left;
      font-size: 13px;
    }

    .join-btn {
      background:#1A237E;
      color:white;
      padding:8px 12px;
      border-radius:6px;
      text-decoration:none;
      display:inline-block;
      margin-top:8px;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header>
    <div class="back" onclick="window.history.back()">
      <span>&larr;</span> KEMBALI
    </div>
    <div class="title">JADWAL</div>
    <div class="menu" id="menuBtn">&#9776;</div>

    <!-- DROPDOWN -->
    <div class="dropdown" id="dropdownMenu">
      <a href="#">Profil</a>
      <a href="#">Notifikasi</a>
      <a href="#">Jadwal</a>
      <a href="#">Logout</a>
    </div>
  </header>


  <!-- MAIN CONTENT -->
  <div class="content">

    {{-- Jika belum ada jadwal --}}
    @if($jadwal->count() === 0)
        <img src="{{ asset('asset/belum-ada-jadwal.png') }}" alt="Belum Ada Jadwal">
        <h2>BELUM ADA JADWAL</h2>
        <p>Pilih Mapel agar jadwal muncul</p>
        <button>Pilih Mapel</button>

    {{-- Jika ada jadwal --}}
    @else
        <h2>JADWAL KELAS</h2>

        <div class="jadwal-list">
            @foreach($jadwal as $j)
                <div class="jadwal-card">
                  <strong>{{ $j->materi->mapel->mapel }}</strong> — {{ $j->materi->namaMateri }} <br>
                  {{ \Carbon\Carbon::parse($j->tanggal)->translatedFormat('l, d F Y') }} <br>
                  Jam: {{ $j->jam_mulai }} - {{ $j->jam_selesai }} <br>
                  Pengajar: {{ $j->pengajar }} <br>

                  <a href="{{ $j->link }}" class="join-btn">Join GMeet</a>
                </div>
            @endforeach
        </div>
    @endif

  </div>

  <script>
    const menuBtn = document.getElementById("menuBtn");
    const dropdown = document.getElementById("dropdownMenu");

    menuBtn.addEventListener("click", () => {
      dropdown.style.display = dropdown.style.display === "flex" ? "none" : "flex";
    });

    window.addEventListener("click", (e) => {
      if (!menuBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = "none";
      }
    });
  </script>

</body>
</html>