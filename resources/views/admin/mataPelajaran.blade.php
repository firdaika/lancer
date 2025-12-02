<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mata Pelajaran - Admin</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<style>

/* ===============================
   POPUP BARU (DESAIN LEBIH BAGUS)
   =============================== */

.modal {
  display:none;
  position: fixed;
  left:0;
  top:0;
  width:100%;
  height:100%;
  justify-content:center;
  align-items:center;
  backdrop-filter: blur(4px);
  background: rgba(0,0,0,0.55);
  animation: fadeIn 0.2s ease-in-out;
  z-index: 2000;
}

@keyframes fadeIn {
  from { opacity:0; }
  to   { opacity:1; }
}

.modal-content {
  background:#003A99;
  padding:25px 30px;
  border-radius:14px;
  width:360px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.35);
  color:white;
  transform: translateY(-15px);
  animation: slideDown 0.25s ease forwards;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-25px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.modal-content h3 {
  text-align:center;
  margin-bottom:15px;
  font-size:20px;
}

.modal-content input[type="text"],
.modal-content input[type="file"] {
  width:100%;
  padding:10px 12px;
  border-radius:8px;
  border:none;
  margin-bottom:12px;
  font-size:14px;
  background:#ffffff;
  color:#000;
}

#saveBtn {
  background:#2856D1;
  padding:10px 18px;
  border-radius:8px;
  border:none;
  color:white;
  cursor:pointer;
  font-weight:bold;
  transition:0.2s;
}

#saveBtn:hover {
  background:#1e47b7;
}

#cancelBtn {
  background:#D9534F;
  padding:10px 18px;
  border-radius:8px;
  border:none;
  color:white;
  cursor:pointer;
  font-weight:bold;
  transition:0.2s;
}

#cancelBtn:hover {
  background:#c9302c;
}

/* ===============================
   KODE ASLI WEBSITE (TIDAK DIUBAH)
   =============================== */
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
}

/* Sidebar */
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
  background: #D9534F;
  border: none;
  color: white;
  padding: 10px 0;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
  text-align: center;
  width: calc(100% - 50px);
  margin: 8px 25px;
  font-size: 15px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
  transition: all 0.3s;
}

.logout-btn:hover {
  background: #c9302c;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

 .main-content {
            margin-left: 240px;
            padding: 30px;
            background-color: #00236F;
            min-height: 100vh;
            box-sizing: border-box;
            overflow-y: auto;
            width: calc(100% - 240px);
        }

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.btn-add {
  background: #2856D1;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
  transition: 0.3s;
}

.btn-add:hover {
  background: #1f47b6;
}

table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #2856d1;
}

th,
td {
  padding: 10px;
  text-align: center;
  border-bottom: 1px solid #2856d1;
  font-size: 14px;
}

th {
  background: #052A78;
}

td {
  background: #001B50;
}

.action-btn {
  cursor: pointer;
  margin: 0 5px;
  font-size: 16px;
}

.edit {
  color: white;
}

.delete {
  color: red;
}

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

#searchInput {
  padding: 10px 15px;
  border-radius: 6px;
  width: 250px;
  border: 1px solid #2856D1;
  background-color: #ffffff;
  color: #000;
  outline: none;
  transition: 0.2s;
}

#searchInput:focus {
  border-color: #000000ff;
  box-shadow: 0 0 5px #4C7CFF;
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
  <a href="{{ url('/dataUser') }}">Data User</a>
  <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
  <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
  <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
  <a href="{{ url('/mataPelajaran') }}" class="active">Data Mata Pelajaran</a>
  <a href="{{ url('/dataMateri') }}">Data Materi</a>
  <a href="{{ url('/jadwalAdmin') }}">Data Jadwal</a>
    <a href="{{ url('/dataAdmin') }}">Data Admin</a>
    <a href="{{ url('/dataGuru') }}">Data Guru</a>
    <a href="{{ url('/dataPaket') }}">Data Paket</a>
    <a href="{{ url('/notifikasi') }}">Notifikasi</a>


 <button id="logoutBtn" class="logout-btn">Logout</button>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

  <div class="header">
    <h2>Data Mata Pelajaran</h2>
  </div>

  @if(session('success'))
    <div style="background:#2ecc71; padding:10px; border-radius:6px; margin-bottom:15px; color:#052A78;">
      {{ session('success') }}
    </div>
  @endif

  <div class="header">
    <input id="searchInput" type="text" placeholder="Cari mapel...">
    <button class="btn-add" id="openAdd">+ Tambah Mapel</button>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Icon</th>
        <th>Nama Mapel</th>
        <th>Kategori</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody id="tableBody">
      @foreach ($mapel as $m)
        <tr data-id="{{ $m->id }}">
          <td>{{ $m->id }}</td>

          <td>
            <img class="icon"
                 src="{{ $m->icon ? asset('storage/' . $m->icon) : asset('asset/default.png') }}">
          </td>

          <td class="col-name">{{ $m->mapel }}</td>
          <td class="col-opsi">{{ $m->opsi ?? '-' }}</td>

          <td>
            <button class="action-btn edit openEdit"
                    data-id="{{ $m->id }}"
                    data-nama="{{ $m->mapel }}"
                    data-opsi="{{ $m->opsi }}">
              ✏️
            </button>

            <form action="{{ route('mapel.destroy', $m->id) }}"
                  method="POST"
                  style="display:inline"
                  onsubmit="return confirm('Yakin ingin hapus?')">

              @csrf
              @method('DELETE')

              <button type="submit" class="action-btn delete">🗑</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

<!-- POPUP TAMBAH & EDIT -->
<div id="mapelModal" class="modal">
  <div class="modal-content">

    <form id="mapelForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" id="methodOverride" name="_method">
      <input type="hidden" id="mapelId" name="id">

      <h3 id="modalTitle">Tambah Mapel</h3>

      <input type="text" id="namaMapel" name="mapel" placeholder="Nama Mapel" required>
      <input type="text" id="opsi" name="opsi" placeholder="Kategori">
      <input type="file" id="icon" name="icon">

      <div style="text-align:right; margin-top:15px;">
        <button type="button" id="saveBtn">Simpan</button>
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
const mapelModal = document.getElementById("mapelModal");
const openAdd = document.getElementById("openAdd");
const cancelBtn = document.getElementById("cancelBtn");
const saveBtn = document.getElementById("saveBtn");

// OPEN TAMBAH
openAdd.addEventListener("click", () => {
    mapelModal.style.display = "flex";
    document.getElementById("modalTitle").innerText = "Tambah Mapel";

    document.getElementById("mapelForm").action = "{{ route('mapel.store') }}";
    document.getElementById("methodOverride").value = "";
    document.getElementById("mapelId").value = "";

    document.getElementById("namaMapel").value = "";
    document.getElementById("opsi").value = "";
    document.getElementById("icon").value = "";
});

// OPEN EDIT
document.querySelectorAll(".openEdit").forEach(btn => {
    btn.addEventListener("click", () => {

        mapelModal.style.display = "flex";
        document.getElementById("modalTitle").innerText = "Edit Mapel";

        const id = btn.dataset.id;

        document.getElementById("mapelForm").action = "/mataPelajaran/" + id;
        document.getElementById("methodOverride").value = "PUT";
        document.getElementById("mapelId").value = id;

        document.getElementById("namaMapel").value = btn.dataset.nama;
        document.getElementById("opsi").value = btn.dataset.opsi;
    });
});

// CANCEL
cancelBtn.addEventListener("click", () => {
    mapelModal.style.display = "none";
});

// SUBMIT
saveBtn.addEventListener("click", () => {
    document.getElementById("mapelForm").submit();
});

const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('tableBody');
searchInput.addEventListener('input', () => {
  const q = searchInput.value.toLowerCase().trim();
  Array.from(tableBody.querySelectorAll('tr')).forEach(tr => {
    const name = tr.querySelector('.col-name')?.innerText.toLowerCase() || '';
    const admin = tr.cells[3]?.innerText.toLowerCase() || '';
    tr.style.display = (name.includes(q) || admin.includes(q)) ? '' : 'none';
  });
});

</script>

<script src="{{ asset('js/popup-logout.js') }}"></script>

</body>
</html>
