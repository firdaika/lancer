<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Admin</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    /* (SEMUA STYLE PERSIS DENGAN HALAMAN MATA PELAJARAN) */
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #001B50;
            color: white;
            margin: 0;
        }

        /* ------------------- SIDEBAR ------------------- */
        .sidebar {
            width: 240px;
            background-color: #052A78;
            padding: 20px 12px;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            overflow-x: hidden;
            -webkit-overflow-scrolling: touch;
            box-shadow: 2px 0 8px rgba(0,0,0,0.12);
            z-index: 100;
        }

        .sidebar img {
            width: 170px;
            margin: 8px auto 20px;
            display: block;
        }

        .sidebar a {
            display: block;
            width: 100%;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: 500;
            text-align: left;
            transition: background 0.15s, transform 0.08s;
        }

        .sidebar a + a {
            margin-top: 4px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #001B50;
            transform: translateX(4px);
        }

    .logout-btn { background:#D9534F; border:none; color:white; padding:10px 0; border-radius:8px; cursor:pointer; width:calc(100% - 50px); margin:8px 25px; font-size:15px; }

      .main-content {
            margin-left: 240px;
            padding: 30px;
            background-color: #00236F;
            min-height: 100vh;
            box-sizing: border-box;
            overflow-y: auto;
            width: calc(100% - 240px);
        }

    .header { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; }

    table { width:100%; border-collapse:collapse; border:1px solid #2856d1; }
    th, td { padding:10px; text-align:center; border-bottom:1px solid #2856d1; font-size:14px; }
    th { background:#052A78; }
    td { background:#001B50; }

    .btn-add { background:#2856D1; color:white; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; font-size:14px; }
    .btn-add:hover { background:#1f47b6; }

    .modal { display:none; position:fixed; inset:0; justify-content:center; align-items:center; backdrop-filter:blur(4px); background:rgba(0,0,0,0.55); z-index:2000; }
    .modal-content { background:#003A99; padding:25px 30px; border-radius:14px; width:360px; color:white; }

    .modal-content input { width:100%; padding:10px; margin-bottom:12px; border:none; border-radius:8px; font-size:14px; }
    #saveBtn, #cancelBtn { padding:10px 18px; border:none; border-radius:8px; color:white; cursor:pointer; }
    #saveBtn { background:#2856D1; } #cancelBtn { background:#D9534F; }

     /* === Popup Logout === */
    .popup-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 20;
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

<!-- SIDEBAR -->
<div class="sidebar">
        <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
        <a href="{{ url('/dataUser') }}" >Data User</a>
        <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
        <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
        <a href="{{ url('/dataMateri') }}">Data Materi</a>
         <a href="{{ url('/jadwalAdmin') }}" >Data Jadwal</a>
          <a href="{{ url('/dataAdmin') }}"  class="active">Data Admin</a>
          <a href="{{ url('/dataGuru') }}">Data Guru</a>
          <a href="{{ url('/dataPaket') }}" >Data Paket</a>
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>

    <button class="logout-btn" id="logoutBtn">Logout</button>
  </div>

<!-- MAIN CONTENT -->
<div class="main-content">
  <div class="header">
    <h2>Data Admin</h2>
    <button class="btn-add" id="openAdd">+ Tambah Admin</button>
  </div>

  @if(session('success'))
    <div style="background:#2ecc71; padding:10px; border-radius:6px; margin-bottom:15px; color:#052A78;">
      {{ session('success') }}
    </div>
  @endif

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($admin as $a)
      <tr>
        <td>{{ $a->id }}</td>
        <td>{{ $a->nama }}</td>
        <td>{{ $a->email }}</td>
        <td>
            @if($a->status == 'aktif')
            <span style="color:green;">Aktif</span>
            @else
            <span style="color:red;">Tidak Aktif</span>
            @endif
        </td>
        <td>
            <form action="{{ route('admin.status', $a->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button style="color:grey; cursor:pointer;" title="Ubah Status">🔁</button>
            </form>
            
          <form action="{{ route('admin.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Yakin hapus admin?')">
            @csrf
            @method('DELETE')
            <button class="action-btn delete" style="color:red; cursor:pointer;">🗑️</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- MODAL TAMBAH -->
<div id="adminModal" class="modal">
  <div class="modal-content">
    <form action="{{ route('admin.store') }}" method="POST">
      @csrf
      <h3 style="text-align:center; margin-bottom:15px;">Tambah Admin</h3>
      <input type="text" name="nama" placeholder="Nama Admin" required>
      <input type="email" name="email" placeholder="Email Admin" required>
      <input type="password" name="password" placeholder="Password" required>

      <div style="text-align:right; margin-top:15px;">
        <button type="submit" id="saveBtn">Simpan</button>
        <button type="button" id="cancelBtn">Batal</button>
      </div>
    </form>
  </div>
</div>

<!-- Popup Konfirmasi -->
  <div class="popup-overlay" id="popupOverlay">
    <div class="popup">
      <h3>Apakah Anda yakin ingin keluar?</h3>
      <button class="yes-btn" id="yesBtn">Ya</button>
      <button class="no-btn" id="noBtn">Tidak</button>
    </div>
  </div>

   <form action="{{ route('logoutAdmin') }}" id="logoutAdminForm" method="POST">
  @csrf
  </form>

<script>
const adminModal = document.getElementById("adminModal");
const openAdd = document.getElementById("openAdd");
const cancelBtn = document.getElementById("cancelBtn");

openAdd.addEventListener("click", () => adminModal.style.display = "flex");
cancelBtn.addEventListener("click", () => adminModal.style.display = "none");

</script>
<script src="{{ asset('js/popup-logout.js') }}"></script>

</body>
</html>
