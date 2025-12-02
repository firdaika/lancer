<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mata Pelajaran - Langkah Cerdas</title>
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
  background-color: #001B50;
  color: white;
}

/* Sidebar */
.sidebar {
  width: 220px;
  background-color: #052A78;
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
  background-color: #001B50;
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
  width: calc(100% - 50px);
  margin: 8px 25px;
  font-size: 15px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.logout-btn:hover {
  background-color: #c9302c;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

/* Popup Logout */
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
  from {
    transform: scale(0.8);
    opacity: 0;
  }
  to {
    transform: scale(1);
    opacity: 1;
  }
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

/* Main content */
.main-content {
  flex: 1;
  padding: 40px;
  background-color: #082054;
}

h2 {
  font-size: 22px;
  margin-bottom: 40px;
}

/* Container kategori */
.kategori-container {
  display: grid;
  grid-template-columns: repeat(2, 200px);
  gap: 50px 80px;
  justify-content: center;
  background-color: #1B449C;
  padding: 60px 100px;
  border-radius: 10px;
  width: fit-content;
  margin: 0 auto;
}

.kategori-item {
  background-color: #080264ff;
  width: 200px;
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: relative;
  border-radius: 8px;
}

.kategori-item img {
  width: 70px;
  height: 70px;
  object-fit: contain;
  margin-bottom: 10px;
  background-color: white;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
}

.kategori-item h3 {
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
  cursor: pointer;
}

.kategori-item .edit,
.kategori-item .delete {
  position: absolute;
  top: 10px;
  font-size: 14px;
  cursor: pointer;
  transition: 0.3s;
}

.kategori-item .edit {
  right: 35px;
  color: #ffc107;
}

.kategori-item .delete {
  right: 10px;
  color: #f44336;
}

.kategori-item .edit:hover,
.kategori-item .delete:hover {
  transform: scale(1.2);
}

/* Responsif */
@media (max-width: 768px) {
  body {
    flex-direction: column;
  }

  .sidebar {
    flex-direction: row;
    justify-content: space-around;
    width: 100%;
    height: auto;
  }

  .main-content {
    padding: 20px;
  }

  .kategori-container {
    grid-template-columns: repeat(2, 150px);
    padding: 40px;
    gap: 40px;
  }

  .kategori-item {
    width: 150px;
    height: 150px;
  }

  .kategori-item img {
    width: 50px;
    height: 50px;
  }
}

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <img src="{{ asset('asset/logo.png') }}" alt="Langkah Cerdas">
    <a href="{{ url('/DASHBOARD') }}">Dashboard</a>
    <a href="{{ url('/DATA-SISWA') }}">Data Murid</a>
    <a href="{{ url('/DATA-GURU') }}">Data Guru</a>
    <a href="{{ url('/MATA-PELAJARAN') }}" class="active">Mata Pelajaran</a>
    <a href="{{ url('/NOTIFIKASI') }}">Notifikasi</a>
    <a href="{{ url('/PENGATURAN') }}">Pengaturan</a>
    <button id="logoutBtn" class="logout-btn">Logout</button>
  </div>

  <!-- Popup Logout -->
  <div id="popupOverlay" class="popup-overlay">
    <div class="popup">
      <h3>Apakah anda yakin ingin keluar?</h3>
      <button id="yesBtn" class="yes-btn">Ya</button>
      <button id="noBtn" class="no-btn">Batal</button>
    </div>
  </div>

  <!-- Main -->
  <div class="main-content">
    <h2>Kategori</h2>
    <div class="kategori-container">
      <div class="kategori-item">
        <img src="{{ asset('asset/iconbahasa.png') }}" alt="Bahasa">
        <h3>Bahasa</h3>
        <span class="edit">✏️</span>
        <span class="delete">🗑️</span>
      </div>

      <div class="kategori-item">
        <img src="{{ asset('asset/iconsains.png') }}" alt="Sains">
        <h3>Sains</h3>
        <span class="edit">✏️</span>
        <span class="delete">🗑️</span>
      </div>

      <div class="kategori-item">
        <img src="{{ asset('asset/iconit.png') }}" alt="IT">
        <h3>IT</h3>
        <span class="edit">✏️</span>
        <span class="delete">🗑️</span>
      </div>

      <div class="kategori-item">
        <img src="{{ asset('asset/iconsosial.png') }}" alt="Sosial">
        <h3>Sosial</h3>
        <span class="edit">✏️</span>
        <span class="delete">🗑️</span>
      </div>
    </div>
  </div>

  <script>
   
  </script>
 <script src="{{ asset('js/popup-logout.js') }}"></script>
</body>
</html>
