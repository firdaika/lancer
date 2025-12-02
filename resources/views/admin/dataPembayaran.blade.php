<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Data Pembayaran - Langkah Cerdas</title>

<style>
/* --- CSS ASLI KAMU TIDAK DIUBAH SAMA SEKALI --- */
* {
  margin: 0;
  padding: 0;
  box-sizing:
  border-box;
  font-family: "Poppins", sans-serif;
}
body {
    display:flex;
    min-height:100vh;
    background-color:#001B50; color:white;
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
  background:#D9534F;
  border:none;
  color:white;
  padding:10px 0;
  border-radius:8px;
  font-weight:bold;
  cursor:pointer;
  text-align:center;
  width:calc(100% - 50px);
  margin:8px 25px;
  font-size:15px;
  box-shadow:0 2px 6px rgba(0,0,0,0.2);
  transition:all 0.3s;
}
.logout-btn:hover {
  background:#c9302c;
  transform:translateY(-2px);
  box-shadow:0 4px 8px rgba(0,0,0,0.3);
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
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:15px;
}
.btn-add {
  background:#2856D1;
  color:white;
  border:none;
  padding:10px 20px;
  border-radius:6px;
  cursor:pointer;
  font-size:14px;
  transition:0.3s;
}
.btn-add:hover {
    background:#1f47b6;
     }
table {
  width:100%;
  border-collapse:collapse;
  border:1px solid #2856d1;
}
th, td {
  padding:10px; \
  text-align:center;
  border-bottom:1px solid #2856d1;
  font-size:14px;
}
th {
    background:#052A78;
    }
td {
    background:#001B50;
    }
.action-btn {
    cursor:pointer;
    margin:0 5px;
    font-size:16px;
}
.edit {
    color:white;
}
.delete {
    color:red;
}
.popup-overlay {
  display:none;
  position:fixed; inset:0;
  background-color:rgba(0,0,0,0.5);
  justify-content:center;
  align-items:center;
  z-index:1000;
  opacity:0;
  transition:all 0.3s ease;
}
.popup-overlay.active {
    opacity:1;
}
.popup {
  background-color:#0034A1;
  padding:30px 40px;
  border-radius:10px;
  text-align:center;
  color:white;
  box-shadow:0 0 10px rgba(0,0,0,0.3);
}
.popup h3 {
    margin-bottom:20px; }
.popup button {
  margin:10px;
  padding:10px 20px;
  border:none;
  border-radius:5px;
  cursor:pointer;
  font-weight:bold;
}
.popup .yes-btn {
    background:#D9534F;
    color:white;
}
.popup .no-btn {
    background:#2856D1;
    color:white;
}
.popup .yes-btn:hover {
    background:#c9302c;
    }
.popup .no-btn:hover {
    background:#1d47b1;
    }

/* --- CSS BARU UNTUK SEARCH BAR (AMAN & TIDAK GANGGU) --- */
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
        <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}" class="active">Data Pembayaran</a>
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
  <h2>Data Pembayaran</h2>

  <!-- SEARCH BAR BARU -->
  <input type="text" id="searchInput" class="search-box" placeholder="Cari data...">
</div>

<table id="subscriptionTable">
<thead>
<tr>
  <th>ID</th>
  <th>User ID</th>
  <th>Formulir</th>
  <th>Metode Pembayaran</th>
  <th>Total</th>
  <th>Status</th>
</tr>
</thead>
<tbody>
    @foreach ($pembayaran as $index => $p )
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->user_id }}</td>
            <td>{{ $p->formulir_id }}</td>
            <td>{{ $p->metode_pembayaran }}</td>
            <td>{{ $p->total }}</td>
            <td>
                <form
                action="{{route('admin.dataPembayaran.updateStatus',$p->id)}}" method="POST">
            @csrf
            <select name="status"
            onchange="this.form.submit()">
            <option value="pending" {{ $p->status == 'pending' ? 'selected' : '' }}>pending</option>
            <option value="berhasil" {{ $p->status == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
            <option value="gagal" {{ $p->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
            </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
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

function renderTable(data){
  tableBody.innerHTML='';
  data.forEach((item)=>{
    const row = document.createElement('tr');
    row.innerHTML=`
      <td>${item.id}</td>
      <td>${item.user_id}</td>
      <td>${item.formulir}</td>
      <td>${item.metode}</td>
      <td>${item.total}</td>
      <td>${item.status}</td>
    `;
    tableBody.appendChild(row);
  });
}

renderTable(subscriptions);

// SEARCH REALTIME
document.getElementById("searchInput").addEventListener("keyup", function(){
  const q = this.value.toLowerCase();
  const filtered = subscriptions.filter(item =>
    item.id.toString().includes(q) ||
    item.user_id.toLowerCase().includes(q) ||
    item.formulir.toLowerCase().includes(q) ||
    item.metode.toLowerCase().includes(q) ||
    item.total.toLowerCase().includes(q) ||
    item.status.toLowerCase().includes(q)
  );
  renderTable(filtered);
});

</script>
<script src="{{ asset('js/popup-logout.js') }}"></script>

</body>
</html>
