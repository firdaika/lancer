<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Data Langganan - Langkah Cerdas</title>
<style>
 *{
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

/* Main Content */
.main-content {
            margin-left: 220px;
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

/* Tombol Tambah Data */
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

/* Table */
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

/* Popup Konfirmasi Hapus */
.popup-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
  opacity: 0;
  transition: all 0.3s ease;
}

.popup-overlay.active {
  opacity: 1;
}

.popup {
  background-color: #0034A1;
  padding: 30px 40px;
  border-radius: 10px;
  text-align: center;
  color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
.sidebar {
  width: 220px;
  background: #052A78;
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
  background: #001B50;
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

/* Main Content */
.main-content {
  flex: 1;
  padding: 30px;
  background: #00236F;
  overflow: auto;
  display: flex;
  flex-direction: column;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

/* Tombol Tambah Data */
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

/* Table */
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

/* Popup Konfirmasi Hapus */
.popup-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
  opacity: 0;
  transition: all 0.3s ease;
}

.popup-overlay.active {
  opacity: 1;
}

.popup {
  background-color: #0034A1;
  padding: 30px 40px;
  border-radius: 10px;
  text-align: center;
  color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
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
      background-color: #ffffffff;
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

<div class="sidebar">
    <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
        <a href="{{ url('/dataUser') }}" >Data User</a>
        <a href="{{ url('/dataFormulir') }}" >Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}" class="active" >Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
        <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
        <a href="{{ url('/dataMateri') }}">Data Materi</a>
         <a href="{{ url('/jadwalAdmin') }}">Data Jadwal</a>
           <a href="{{ url('/dataAdmin') }}">Data Admin</a>
          <a href="{{ url('/dataGuru') }}">Data Guru</a>
          <a href="{{ url('/dataPaket') }}" >Data Paket</a>
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>


<button id="logoutBtn" class="logout-btn">Logout</button>
</div>

<div class="main-content">

  <div class="header">
    <input type="text" id="searchInput" placeholder="Cari nama, email...">

  </div>

<table id="subscriptionTable">
<thead>
<tr>
<th>ID</th>
<th>Formulir ID</th>
<th>Paket</th>
<th>Tanggal Mulai</th>
<th>Tanggal Selesai</th>
<th>Status</th>
</tr>
    </thead>
        <tbody id="tableBody">
    @foreach ( $langganan as $index => $l )
        <tr>
            <td>{{ $l->id }}</td>
            <td>{{ $l->formulir_id }}</td>
            <td>{{ $l->paket }}</td>
            <td>{{ $l->tanggal_mulai }}</td>
            <td>{{ $l->tanggal_selesai }}</td>
            <td>{{ $l->status }}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>

<!-- Popup Konfirmasi Hapus -->
<div class="popup-overlay" id="deletePopup">
  <div class="popup">
    <h3>Apakah Anda yakin ingin menghapus data ini?</h3>
    <button class="yes-btn" id="confirmDelete">Ya</button>
    <button class="no-btn" id="cancelDelete">Tidak</button>
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
const tableBody = document.querySelector('#subscriptionTable tbody');
let deleteIndex = null;

function renderTable(data){
  tableBody.innerHTML='';
  data.forEach((item,index)=>{
    const row = document.createElement('tr');
    row.innerHTML=`
      <td>${item.id}</td>
      <td>${item.formulir_id}</td>
      <td>${item.paket}</td>
      <td>${item.tanggal_mulai}</td>
      <td>${item.tanggal_selesai}</td>
      <td>${item.status}</td>
    `;
    tableBody.appendChild(row);
  });
}

renderTable(subscriptions);

// DELETE DATA
const deletePopup = document.getElementById('deletePopup');
const confirmDelete = document.getElementById('confirmDelete');
const cancelDelete = document.getElementById('cancelDelete');

function deleteData(index){
  deleteIndex = index;
  deletePopup.style.display = 'flex';
  setTimeout(()=> deletePopup.classList.add('active'),10);
}

confirmDelete.addEventListener('click', ()=>{
  if(deleteIndex !== null){
    subscriptions.splice(deleteIndex,1);
    renderTable(subscriptions);
    deleteIndex = null;
  }
  deletePopup.classList.remove('active');
  setTimeout(()=> deletePopup.style.display='none',300);
});

cancelDelete.addEventListener('click', ()=>{
  deletePopup.classList.remove('active');
  setTimeout(()=> deletePopup.style.display='none',300);
});

// LOGOUT
const logoutBtn = document.getElementById("logoutBtn");
logoutBtn.addEventListener("click", ()=>{ alert("Logout"); });

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
