<!DOCTYPE html><html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Data Paket - Admin</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
/* ======= MODAL ======= */
.modal { display:none; position: fixed; left:0; top:0; width:100%; height:100%;
  justify-content:center; align-items:center; backdrop-filter: blur(4px);
  background: rgba(0,0,0,0.55); z-index: 2000; }
.modal-content { background:#003A99; padding:25px 30px; border-radius:14px; width:420px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.35); color:white; }
.modal-content h3 { text-align:center; margin-bottom:12px; font-size:20px; }
.modal-content input[type="text"], .modal-content input[type="number"] {
  width:100%; padding:10px 12px; border-radius:8px; border:none; margin-bottom:12px;
  font-size:14px; background:#ffffff; color:#000;
}
#saveBtn { background:#2856D1; padding:10px 18px; border-radius:8px; border:none; color:white; cursor:pointer; font-weight:bold; }
#cancelBtn { background:#D9534F; padding:10px 18px; border-radius:8px; border:none; color:white; cursor:pointer; font-weight:bold; }
/* ======= LAYOUT ======= */
* { margin:0; padding:0; box-sizing:border-box; font-family:"Poppins",sans-serif; }
body { display:flex; min-height:100vh; background-color:#001B50; color:white; }
.sidebar { width:240px; background-color:#052A78; padding:20px 12px; display:flex; flex-direction:column; position:fixed; left:0; top:0; bottom:0; overflow-y:auto; }
.sidebar a { display:block; width:100%; color:#fff; text-decoration:none; padding:12px 18px; border-radius:6px; margin-top:4px; }
.sidebar a.active { background:#001B50; }
.logout-btn { background:#D9534F; border:none; color:white; padding:10px 0; border-radius:8px; font-weight:bold; cursor:pointer; margin:8px 25px; }
.main-content { margin-left:240px; padding:30px; background-color:#00236F; min-height:100vh; width:calc(100% - 240px); }
.header { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; gap:12px; flex-wrap:wrap; }
.btn-add { background:#2856D1; color:white; border:none; padding:10px 20px; border-radius:6px; cursor:pointer; }
table { width:100%; border-collapse:collapse; border:1px solid #2856d1; margin-top:12px; }
th, td { padding:10px; text-align:center; border-bottom:1px solid #2856d1; font-size:14px; }
th { background:#052A78; }
td { background:#001B50; }
.action-btn { cursor:pointer; margin:0 6px; font-size:16px; background:transparent; border:none; color:inherit; }

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
<div class="sidebar">

    <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
  <a href="{{ url('/dataUser') }}">Data User</a>
  <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
  <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
  <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
  <a href="{{ url('/mataPelajaran') }}" >Data Mata Pelajaran</a>
  <a href="{{ url('/dataMateri') }}">Data Materi</a>
  <a href="{{ url('/jadwalAdmin') }}">Data Jadwal</a>
    <a href="{{ url('/dataAdmin') }}">Data Admin</a>
    <a href="{{ url('/dataGuru') }}">Data Guru</a>
     <a href="{{ url('/dataPaket') }}" class="active">Data Paket</a>
    <a href="{{ url('/notifikasi') }}">Notifikasi</a>

  <button id="logoutBtn" class="logout-btn">Logout</button>
</div><div class="main-content">
  <div class="header"><h2>Data Paket</h2></div>
  @if(session('success'))
    <div style="background:#2ecc71; padding:10px; border-radius:6px; margin-bottom:15px; color:#052A78;">
      {{ session('success') }}
    </div>
  @endif
  <div class="header">
    <div><input id="searchInput" type="text" placeholder="Cari paket..." /></div>
    <div><button class="btn-add" id="openAdd">+ Tambah Paket</button></div>
  </div>  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Paket</th>
        <th>Harga</th>
        <th>Admin</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      @foreach ($paket as $p)
      <tr data-id="{{ $p->id }}">
        <td>{{ $p->id }}</td>
        <td class="col-name">{{ $p->nama }}</td>
        <td>Rp {{ number_format($p->harga,0,',','.') }}</td>
        <td>{{ $p->admin }}</td>
        <td>
          <button class="action-btn edit openEdit"
                  data-id="{{ $p->id }}"
                  data-nama="{{ $p->nama }}"
                  data-harga="{{ $p->harga }}"
                  data-admin="{{ $p->admin }}">✏️</button>
          <form action="/dataPaket/{{ $p->id }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin hapus paket ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="action-btn delete">🗑️</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div><!-- MODAL --><div id="paketModal" class="modal">
  <div class="modal-content">
    <form id="paketForm" method="POST">
      @csrf
      <input type="hidden" id="methodOverride" name="_method">
      <input type="hidden" id="paketId" name="id">  <h3 id="modalTitle">Tambah Paket</h3>
  <input type="text" id="namaPaket" name="nama" placeholder="Nama Paket" required />
  <input type="number" id="hargaPaket" name="harga" placeholder="Harga (angka)" required min="0" />
  <input type="number" id="adminInput" name="admin" placeholder="ID Admin" required />

  <div style="text-align:right; margin-top:10px;">
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
const paketModal = document.getElementById("paketModal");
const openAdd = document.getElementById("openAdd");
const cancelBtn = document.getElementById("cancelBtn");
const saveBtn = document.getElementById("saveBtn");
const paketForm = document.getElementById("paketForm");

// Tambah paket
openAdd.addEventListener("click", () => {
  paketModal.style.display = "flex";
  document.getElementById("modalTitle").innerText = "Tambah Paket";
  paketForm.action = "/dataPaket";
  document.getElementById("methodOverride").value = "";
  document.getElementById("paketId").value = "";
  document.getElementById("namaPaket").value = "";
  document.getElementById("hargaPaket").value = "";
  document.getElementById("adminInput").value = "";
});

// Edit paket
document.querySelectorAll(".openEdit").forEach(btn => {
  btn.addEventListener("click", () => {
    paketModal.style.display = "flex";
    document.getElementById("modalTitle").innerText = "Edit Paket";
    const id = btn.dataset.id;
    paketForm.action = "/dataPaket/" + id; // PUT route
    document.getElementById("methodOverride").value = "PUT";
    document.getElementById("paketId").value = id;
    document.getElementById("namaPaket").value = btn.dataset.nama;
    document.getElementById("hargaPaket").value = btn.dataset.harga;
    document.getElementById("adminInput").value = btn.dataset.admin;
  });
});

// Submit form
saveBtn.addEventListener("click", () => paketForm.submit());
cancelBtn.addEventListener("click", () => paketModal.style.display = "none");
window.addEventListener("click", e => { if(e.target === paketModal) paketModal.style.display='none'; });

// Search table
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
