<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Materi - Admin</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<style>

/* ============================================
   RESET
============================================ */
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

/* ============================================
   SIDEBAR
============================================ */
.sidebar {
  width: 240px;
  background-color: #052A78;
  padding: 20px 12px;
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 0; left: 0; bottom: 0;
  overflow-y: auto;
  box-shadow: 2px 0 8px rgba(0,0,0,0.12);
  z-index: 100;
}

.sidebar img {
  width: 170px;
  margin: 8px auto 20px;
}

.sidebar a {
  display: block;
  padding: 12px 18px;
  border-radius: 6px;
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: 0.15s;
}

.sidebar a + a { margin-top: 4px; }

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
  width: calc(100% - 50px);
  margin: 8px 25px;
  font-size: 15px;
  transition: 0.3s;
}

.logout-btn:hover {
  background-color: #c9302c;
  transform: translateY(-2px);
}

/* ============================================
   MAIN CONTENT
============================================ */
.main-content {
  margin-left: 240px;
  padding: 30px;
  background-color: #00236F;
  min-height: 100vh;
  width: calc(100% - 240px);
}

h2 {
  margin-bottom: 20px;
}

.topbar {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

#searchInput {
  padding: 10px;
  border-radius: 6px;
  border: none;
  width: 250px;
}

.btn-add {
  background: #2856D1;
  padding: 10px 20px;
  border-radius: 6px;
  border: none;
  color: white;
  cursor: pointer;
  font-weight:600;
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
/* ============================================
   MODAL (100% MATCH DATA MAPEL)
============================================ */
.modal {
  display: none;
  position: fixed;
  inset: 0;
  justify-content: center;
  align-items: center;
  backdrop-filter: blur(4px);
  background: rgba(0,0,0,0.55);
  animation: fadeIn 0.15s ease;
  z-index: 2000;
}

@keyframes fadeIn {
  from { opacity:0; }
  to { opacity:1; }
}

.modal-content {
  background:#003A99;
  padding:25px 30px;
  border-radius:14px;
  width:360px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.35);
  color:white;
  animation: slideDown 0.22s ease;
}

@keyframes slideDown {
  from { opacity:0; transform: translateY(-18px); }
  to   { opacity:1; transform: translateY(0); }
}

.modal-content h3 {
  text-align:center;
  margin-bottom:15px;
  font-size:20px;
}

.modal-content input {
  width:100%;
  padding:10px 12px;
  border-radius:8px;
  border:none;
  margin-bottom:12px;
  font-size:14px;
  background:white;
  color:black;
}

.btn-save {
  background:#2856D1;
  padding:10px 18px;
  border-radius:8px;
  border:none;
  color:white;
  cursor:pointer;
  font-weight:bold;
  width:100%;
}

#cancelBtn {
  background:#D9534F;
  padding:10px 18px;
  border-radius:8px;
  border:none;
  color:white;
  margin-top:8px;
  width:100%;
}

/* ============================================
   POPUP LOGOUT
============================================ */
.popup-overlay {
  display: none;
  position: fixed;
  inset:0;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

.popup {
  background-color: #0034A1;
  padding: 30px 40px;
  border-radius: 10px;
  text-align: center;
  color: white;
  animation: fadeIn 0.3s ease;
}

.popup button {
  margin: 10px;
  padding: 10px 20px;
  border-radius: 5px;
  font-weight:bold;
  border:none;
  cursor:pointer;
}

.yes-btn { background:#D9534F; }
.no-btn { background:#2856D1; }

</style>
</head>

<body>

<!-- ============================================
     SIDEBAR
============================================ -->
<div class="sidebar">
  <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
        <a href="{{ url('/dataUser') }}" >Data User</a>
        <a href="{{ url('/dataFormulir') }}" >Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}"  >Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
        <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
        <a href="{{ url('/dataMateri') }}" class="active" >Data Materi</a>
         <a href="{{ url('/jadwalAdmin') }}">Data Jadwal</a>
           <a href="{{ url('/dataAdmin') }}">Data Admin</a>
          <a href="{{ url('/dataGuru') }}">Data Guru</a>
          <a href="{{ url('/dataPaket') }}" >Data Paket</a>
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>

  <button class="logout-btn" id="logoutBtn">Logout</button>
</div>


<!-- ============================================
     MAIN CONTENT
============================================ -->
<div class="main-content">

  <h2>Data Materi</h2>

  <div class="topbar">
    <input type="text" id="searchInput" placeholder="Cari materi...">
    <button id="btnAdd" class="btn-add">+ Tambah Materi</button>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Mapel</th>
        <th>Nama Materi</th>
        <th>Kelas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      @foreach ($materi as $m)
      <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->mapel_id }}</td>
        <td>{{ $m->namaMateri }}</td>
        <td>{{ $m->kelas }}</td>
        <td>
          <button class="btn-edit" onclick='editMateri(@json($m))'>✏️</button>

          <form action="{{ route('materi.destroy', $m->id) }}" method="POST" style="display:inline;">
            @csrf
            @method("DELETE")
            <button class="btn-delete" onclick="return confirm('Yakin hapus?')">🗑️</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>


<!-- ============================================
     MODAL
============================================ -->
<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close" style="float:right; cursor:pointer; font-size:22px;">&times;</span>

    <h3 id="modalTitle">Tambah Materi</h3>

    <form id="materiForm" action="{{ route('materi.store') }}" method="POST">
      @csrf

      <input type="hidden" name="id" id="id">

      <label>Nama Materi</label>
      <input type="text" name="namaMateri" id="namaMateri" required>

      <label>Kelas</label>
      <input type="number" name="kelas" id="kelas" required>

      <label>Mapel ID</label>
      <input type="number" name="mapel_id" id="mapel_id" required>

      <button type="submit" class="btn-save">Simpan</button>
      <button type="button" id="cancelBtn">Batal</button>
    </form>
  </div>
</div>


<!-- ============================================
     POPUP LOGOUT
============================================ -->
<div class="popup-overlay" id="popupOverlay">
  <div class="popup">
    <h3>Apakah Anda yakin ingin keluar?</h3>
    <button class="yes-btn" id="yesBtn">Ya</button>
    <button class="no-btn" id="noBtn">Tidak</button>
  </div>
</div>

<form id="logoutAdminForm" action="{{ route('logoutAdmin') }}" method="POST">
  @csrf
</form>


<!-- ============================================
     SCRIPT
============================================ -->
<script>
const modal = document.getElementById("modal");
const form = document.getElementById("materiForm");
const closeBtn = document.querySelector(".close");

document.getElementById("btnAdd").onclick = () => {
  form.reset();

  // Hapus method PUT jika ada
  const _method = form.querySelector("input[name='_method']");
  if (_method) _method.remove();

  form.action = "/dataMateri";
  document.getElementById("modalTitle").innerText = "Tambah Materi";

  modal.style.display = "flex";
};

closeBtn.onclick = () => modal.style.display = "none";
document.getElementById("cancelBtn").onclick = () => modal.style.display = "none";

function editMateri(data) {
  modal.style.display = "flex";

  document.getElementById("modalTitle").innerText = "Edit Materi";

  document.getElementById("id").value = data.id;
  document.getElementById("namaMateri").value = data.namaMateri;
  document.getElementById("kelas").value = data.kelas;
  document.getElementById("mapel_id").value = data.mapel_id;

  form.action = "/dataMateri/" + data.id;

  const method = document.createElement("input");
  method.type = "hidden";
  method.name = "_method";
  method.value = "PUT";
  form.appendChild(method);
}

window.onclick = (e) => {
  if (e.target === modal) modal.style.display = "none";
};

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
