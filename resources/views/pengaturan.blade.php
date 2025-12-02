<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pengaturan - Langkah Cerdas</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      background-color: #001b50;
      color: white;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #052a78;
      padding: 20px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .sidebar img {
      width: 200px;
      margin-bottom: 40px;
    }

    .sidebar a {
      width: 100%;
      color: white;
      text-decoration: none;
      padding: 15px 25px;
      display: block;
      transition: 0.3s;
      font-weight: 500;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #001b50;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      background-color: #00236f;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Box pengaturan */
    .settings-box {
      background-color: #153d9e;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 50px 100px;
      padding: 60px 100px;
      border-radius: 10px;
    }

    .setting-item {
      text-align: center;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .setting-item:hover {
      transform: scale(1.05);
    }

    .setting-item img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 15px;
      display: inline-block;
    }

    .setting-item p {
      font-size: 16px;
      font-weight: 500;
    }

    /* Tampilan profil */
    .profile-box {
      display: none;
      background-color: #00236f;
      width: 100%;
      height: 100%;
      padding: 60px 120px;
    }

    .profile-box h2 {
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .profile-box h3 {
      font-size: 15px;
      font-weight: 400;
      margin-bottom: 25px;
      text-align: right;
      padding-right: 80px;
    }

    .profile-box input {
      width: 80%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #3253b8;
      border-radius: 4px;
      background-color: transparent;
      color: white;
      font-size: 15px;
      display: block;
    }

    .button-row {
      width: 80%;
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .button-row button {
      width: 48%;
      padding: 10px 0;
      background-color: #3253b8;
      border: 1px solid #3253b8;
      border-radius: 4px;
      color: white;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
      font-weight: 500;
    }

    .button-row button:hover {
      background-color: transparent;
      color: white;
      border: 1px solid #3253b8;
    }

    /* keamanan */
    .security-box {
      display: none;
      background-color: #00236f;
      width: 100%;
      height: 100%;
      padding: 60px 80px;
    }

    .security-box h2 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .security-form {
      border: 1px solid #3253b8;
      padding: 50px 60px;
      width: 100%;
      height: 80%;
    }

    .security-form h3 {
      font-size: 17px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .security-form input {
      width: 100%;
      padding: 15px;
      margin: 15px 0;
      border: 1px solid #3253b8;
      border-radius: 4px;
      background-color: transparent;
      color: white;
      font-size: 15px;
      display: block;
    }

    .security-form .button-row {
      display: flex;
      justify-content: flex-end;
      gap: 15px;
      margin-top: 25px;
    }

    /* TENTANG BOX */
    .about-box {
      display: none;
      width: 100%;
      height: 100%;
      background-color: #00236f;
      padding: 60px 120px;
    }

    .about-box h2 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .about-box p {
      font-size: 16px;
      line-height: 1.6;
    }

    .about-content {
      background-color: #153d9e;
      border-radius: 10px;
      padding: 40px 60px;
    }

    .about-section {
      margin-bottom: 40px;
    }

    .about-section h3 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .about-section ul {
      list-style: none;
      padding-left: 0;
    }

    .about-section ul li {
      margin-bottom: 8px;
      font-size: 15px;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }
      .sidebar {
        flex-direction: row;
        justify-content: space-around;
        width: 100%;
      }
      .profile-box, .security-box, .about-box {
        padding: 30px;
      }
    }

        
.logout-btn {
  background-color: #D9534F;
  border: none;
  color: white;
  padding: 10px 0;
  border-radius: 8px; 
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  text-align: center;
  width: calc(100% - 50px); /* sejajar*/
  margin: 8px 25px; 
  font-size: 15px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.logout-btn:hover {
  background-color: #c9302c;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.3);
}

 .popup-overlay {
      display: none;
      position: fixed;
      inset: 0;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 200;
    }

    .popup {
      background-color: #0034A1;
      padding: 30px 40px;
      border-radius: 10px;
      text-align: center;
      color: white;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
      from { transform: scale(0.8); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    .popup h3 {
      margin-bottom: 20px;
    }

    .popup button {
      margin: 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .popup .yes-btn {
      background-color: #D9534F;
      color: white;
    }

    .popup .no-btn {
      background-color: #2856D1;
      color: white;
    }

    .popup .yes-btn:hover {
      background-color: #c9302c;
    }

    .popup .no-btn:hover {
      background-color: #1d47b1;
    }

  </style>
</head>
<body>
  <div class="sidebar">
    <img src="{{ asset('asset/logo.png') }}" alt="Langkah Cerdas" />
    <a href="{{ url('/DASHBOARD') }}">Dashboard</a>
    <a href="{{ url('/DATA-SISWA') }}">Data Murid</a>
    <a href="{{ url('/DATA-GURU') }}">Data Guru</a>
    <a href="{{ url('/MATA-PELAJARAN') }}">Mata Pelajaran</a>
     <a href="{{ url('/NOTIFIKASI') }}">Notifikasi</a>
    <a href="{{ url('/PENGATURAN') }}" class="active">Pengaturan</a>
     <button id="logoutBtn" class="logout-btn">Logout</button>
  </div>

  <div id="popupOverlay" class="popup-overlay">
    <div class="popup">
      <h3>Apakah anda yakin ingin keluar?</h3>
      <button id="yesBtn" class="yes-btn">Ya</button>
      <button id="noBtn" class="no-btn">Batal</button>
    </div>
  </div>

  <!-- Main -->
  <div class="main-content">
    <!-- Tampilan awal -->
    <div class="settings-box" id="settingsBox">
      <div class="setting-item" onclick="showProfile()">
        <img src="{{ asset('asset/profile.png') }}" alt="Profil" />
        <p>Profil</p>
      </div>
      <div class="setting-item">
        <img src="{{ asset('asset/notifikasi.png') }}" alt="Notifikasi" />
        <p>Notifikasi</p>
      </div>
      <div class="setting-item" onclick="showSecurity()">
        <img src="{{ asset('asset/keamanan.png') }}" alt="Keamanan" />
        <p>Keamanan</p>
      </div>
      <div class="setting-item" onclick="showAbout()">
        <img src="{{ asset('asset/tentang.png') }}" alt="Tentang Web App" />
        <p>Tentang WEB</p>
      </div>
    </div>

    <!-- Tampilan profil -->
    <div class="profile-box" id="profileBox">
      <h2>Profile</h2>
      <h3>Informasi Akun</h3>
      <input type="text" placeholder="Nama" />
      <input type="email" placeholder="gmail" />
      <input type="password" placeholder="password" />
      
      <div class="button-row">
        <button onclick="backToSettings()">Kembali</button>
        <button>Simpan Perubahan</button>
      </div>
    </div>

    <!-- Tampilan keamanan -->
    <div class="security-box" id="securityBox">
      <h2>Keamanan</h2>
      <div class="security-form">
        <h3>Autentikasi & Login</h3>
        <input type="password" placeholder="Kata sandi lama">
        <input type="password" placeholder="Kata sandi baru">
        <input type="password" placeholder="Konfirm Kata Sandi">

        <div class="button-row">
          <button onclick="backToSettings()">Kembali</button>
          <button>Ubah</button>
        </div>
      </div>
    </div>

    <!-- Tampilan Tentang WEB -->
    <div class="about-box" id="aboutBox">
      <div class="about-content">
        <h2>Tentang WEB APP</h2>
        <p>Versi 1.0.0<br>Tanggal Rilis: xxxxx</p>

        <div class="about-section">
          <h3>Deskripsi Singkat</h3>
          <p>
            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX<br>
            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
          </p>
        </div>

        <div class="about-section">
          <h3>Fitur Utama</h3>
          <ul>
            <li>Dashboard statistik keuangan</li>
            <li>Manajemen data murid & guru</li>
          </ul>
        </div>

        <p style="text-align:right;">Tim Pengembang<br>Kelompok 1</p>

       
      </div>
    </div>
  </div>

  <script src ="{{ asset('js/pengaturan.js') }}"></script>
  <script src ="{{ asset('js/popup-logout.js') }}" ></script>
</body>
</html>
