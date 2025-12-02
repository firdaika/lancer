<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Siswa - Langkah Cerdas</title>

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
      margin-bottom: 25px;
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


    .modal {
      display: none;
      position: fixed;
      z-index: 100;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #052a78;
      padding: 20px;
      border-radius: 8px;
      width: 400px;
    }

    .modal-content input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: none;
    }

    .modal-content button {
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #2856d1;
      color: white;
      margin-right: 10px;
    }

    .modal-content button.cancel {
      background-color: #999;
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
  </style>
</head>

<body>

<div class="sidebar">
    <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
        <a href="{{ url('/dataUser') }}" class="active">Data User</a>
        <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
         <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
         <a href="{{ url('/dataMateri') }}">Data Materi</a>
         <a href="{{ url('/jadwalAdmin') }}">Data Jadwal</a>
           <a href="{{ url('/dataAdmin') }}">Data Admin</a>
          <a href="{{ url('/dataGuru') }}">Data Guru</a>
          <a href="{{ url('/dataPaket') }}">Data Paket</a>
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>


  <button id="logoutBtn" class="logout-btn">Logout</button>
</div>

<div class="main-content">

 <div class="header">
      <input type="text" id="searchInput" placeholder="Cari nama, email...">
   </div>

  <table id="studentTable">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Email</th>
        <th>Password</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $index => $u)
        <tr>
          <td>{{ $u->id }}</td>
          <td>{{ $u->nama }}</td>
          <td>{{ $u->ttl }}</td>
          <td>{{ $u->email }}</td>
          <td>{{ $u->password }}</td>
          <td>
            <button class="action-btn edit"
              data-id="{{ $u->id }}"
              data-nama="{{ $u->nama }}"
              data-ttl="{{ $u->ttl }}"
              data-email="{{ $u->email }}" >✏️</button>

            <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
            <button class="action-btn delete" onclick="deleteData({{ $u->id }})">🗑️</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

<!-- MODAL TAMBAH/EDIT -->
<div id="modal" class="modal">
    <div class="modal-content">
<form id="userForm"   method="POST">
    @csrf
    <input type="hidden" id="methodOverride" name="_method">

    <input type="hidden" id="userId">
    <input type="text" id="nama" name="nama" placeholder="Nama">
    <input type="date" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir">
    <input type="email" id="email" name="email" placeholder="Email">

    <div style="text-align:right;">
      <button id="saveBtn" type="button">Simpan</button>
      <button class="cancel" id="cancelBtn">Batal</button>
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
const modal = document.getElementById("modal");

document.querySelectorAll(".edit").forEach(btn => {
    btn.addEventListener("click", function() {

        modal.style.display = "flex"; // ⬅ ini yang benar

        document.getElementById("userId").value = this.dataset.id;
        document.getElementById("nama").value = this.dataset.nama;
        document.getElementById("ttl").value = this.dataset.ttl;
        document.getElementById("email").value = this.dataset.email;

        document.getElementById("methodOverride").value = "PUT";
        document.getElementById("userForm").action = "/dataUser/" + this.dataset.id;
    });
});

document.getElementById("cancelBtn").onclick = function(){
    modal.style.display = "none";
};

// SUBMIT FORM
document.getElementById("saveBtn").onclick = function () {

    document.getElementById("userForm").submit();
};

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



