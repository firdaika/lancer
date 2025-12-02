<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Admin</title>

    <style>
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


        /* ------------------- MAIN CONTENT ------------------- */
        .main-content {
            margin-left: 240px;
            padding: 30px;
            background-color: #00236F;
            min-height: 100vh;
            box-sizing: border-box;
            overflow-y: auto;
            width: calc(100% - 240px);
        }

        header {
            background: #1B449C;
            padding: 20px 25px;
            font-size: 22px;
            font-weight: 600;
        }

        .container {
            width: 92%;
            margin: 25px auto;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 15px;
        }

        .card {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.4);
            backdrop-filter: blur(4px);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            margin-top: 6px;
            margin-bottom: 12px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: white;
            font-weight: 600;
            background: #1B2E91;
        }

        button:hover {
            background: #16307A;
        }

        .btn-delete {
            background: #C62828;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            font-size: 14px;
        }

        table th {
            background: rgba(0,0,0,0.2);
        }

        .status-read {
            color: #32D296;
            font-weight: 600;
        }

        .status-unread {
            color: #FFEB3B;
            font-weight: 600;
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
  padding: 28px 35px;
  border-radius: 10px;
  text-align: center;
  color: white;
  animation: fadeIn 0.25s ease;
}

.popup h3 {
  margin-bottom: 22px;
  font-size: 18px;
  font-weight: 600;
}

.popup-buttons {
  display: flex;
  justify-content: center;
  gap: 18px;
  margin-top: 5px;
}

.popup button {
  padding: 10px 25px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
}

/* Tombol tetap warna asli */
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

@keyframes fadeIn {
  from { transform: scale(0.9); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}


    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <a href="{{ url('/dasboardAdmin') }}" >Dashboard</a>
        <a href="{{ url('/dataUser') }}" >Data User</a>
        <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
        <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
        <a href="{{ url('/dataMateri') }}">Data Materi</a>
         <a href="{{ url('/jadwalAdmin') }}" >Data Jadwal</a>
          <a href="{{ url('/dataAdmin') }}">Data Admin</a>
          <a href="{{ url('/dataGuru') }}">Data Guru</a>
          <a href="{{ url('/dataPaket') }}" >Data Paket</a>
         <a href="{{ url('/notifikasi') }}" class="active">Notifikasi</a>

      <button id="logoutBtn" class="logout-btn">Logout</button>
  </div>

<div id="popupOverlay" class="popup-overlay">
  <div class="popup">
    <h3>Apakah anda yakin ingin keluar?</h3>

    <div class="popup-buttons">
      <button id="yesBtn" class="yes-btn">Ya</button>
      <button id="noBtn" class="no-btn">Batal</button>
    </div>

  </div>
</div>



    <header>Panel Notifikasi Admin</header>

    <div class="container">

        <!-- FORM NOTIFIKASI -->
        <div class="card">
            <div class="section-title">Buat Notifikasi Baru</div>

            <form action="{{ route('admin.notifikasi.store') }}" method="POST">
                @csrf
                <label>Pilih Tujuan</label>
                <select name="user_id" required>
                    <option value="">-- Pilih Penerima --</option>
                    <option value="all">Kirim ke SEMUA USER</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                    @endforeach
                </select>

                <label>Judul</label>
                <input type="text" name="judul" required>

                <label>Isi Notifikasi</label>
                <textarea name="pesan" rows="4" required></textarea>

                <button type="submit">Kirim Notifikasi</button>
            </form>
        </div>

        <!-- TABEL -->
        <div class="card">
            <div class="section-title">Daftar Notifikasi</div>

            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($notifikasi as $n)
                        <tr>
                            <td>{{ $n->judul }}</td>
                            <td>{{ $n->pesan }}</td>
                            <td>{{ $n->created_at->format('d/m/Y') }}</td>
                            <td>
                                @if ($n->read)
                                    <span class="status-read">Dibaca</span>
                                @else
                                    <span class="status-unread">Belum Dibaca</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.notifikasi.destroy', $n->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus notifikasi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
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


    <!-- ------------------- JS POPUP LOGOUT ------------------- -->
   <script src="{{ asset('js/popup-logout.js') }}"></script>

</body>
</html>
