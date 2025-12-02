<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Jadwal - Langkah Cerdas</title>

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
    body { display: flex; height: 100vh; background-color: #001B50; color: white; }

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
      background-color: #D9534F; border: none; color: white;
      padding: 10px 0; border-radius: 8px; font-weight: bold;
      cursor: pointer; transition: 0.3s; width: calc(100% - 50px);
      margin: 8px 25px; font-size: 15px;
    }
    .logout-btn:hover { background-color: #c9302c; transform: translateY(-2px); }

     .main-content {
            margin-left: 240px;
            padding: 30px;
            background-color: #00236F;
            min-height: 100vh;
            box-sizing: border-box;
            overflow-y: auto;
            width: calc(100% - 240px);
        }
    .header { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; gap:12px; flex-wrap:wrap; }

    #searchInput {
      padding: 10px 15px; border-radius: 6px; width: 250px;
      border: 1px solid #2856D1; background-color: #fff; color: #000;
    }

    .add-btn {
      background-color: #2856D1; color: white; border: none;
      padding: 10px 20px; border-radius: 6px; font-weight: bold;
      cursor: pointer; transition: 0.3s;
    }
    .add-btn:hover { background-color: #1b46b5; }

    table { width: 100%; border-collapse: collapse; border: 1px solid #2856d1; }
    th, td { padding: 10px; text-align: center; border-bottom: 1px solid #2856d1; }
    th { background-color: #052A78; }
    td { background-color: #001B50; }

    .action-btn { cursor: pointer; margin: 0 5px; font-size: 18px; }
    .edit { color: white; }
    .delete { color: red; }

    .modal {
      display: none; position: fixed; z-index: 100;
      left:0; top:0; width:100%; height:100%;
      background-color: rgba(0,0,0,0.5); justify-content:center; align-items:center;
    }

    .modal-content {
      background-color: #052a78; padding: 20px; border-radius: 8px;
      width: 420px;
    }

    .modal-content input,
    .modal-content select {
      width:100%; padding:8px; border-radius:5px; margin-bottom:10px; border:none;
    }

    .modal-content button {
      padding:10px 15px; border:none; border-radius:5px;
      cursor:pointer; background-color:#2856d1; color:white; margin-right:10px;
    }

    .modal-content button.cancel { background-color:#999; }

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

{{-- SIDEBAR --}}
<div class="sidebar">
  <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
  <a href="{{ url('/dataUser') }}">Data User</a>
  <a href="{{ url('/dataFormulir') }}">Data Formulir</a>
  <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
  <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
  <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
  <a href="{{ url('/dataMateri') }}">Data Materi</a>
  <a href="{{ url('/jadwalAdmin') }}" class="active">Data Jadwal</a>
    <a href="{{ url('/dataAdmin') }}">Data Admin</a>
    <a href="{{ url('/dataGuru') }}">Data Guru</a>
    <a href="{{ url('/dataPaket') }}">Data Paket</a>
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>

      <button class="logout-btn" id="logoutBtn">Logout</button>
</div>


<div class="main-content">

  <div class="header">
    <div><input type="text" id="searchInput" placeholder="Cari mapel, materi, pengajar..."></div>
    <button class="add-btn" id="btnAdd">+ Tambah Jadwal</button>
  </div>

  <table id="jadwalTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Langganan</th>
        <th>Mapel</th>
        <th>Materi</th>
        <th>Kelas</th>
        <th>Pengajar</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Link GMeet</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody id="tableBody">
      @foreach ($jadwal as $j)
        <tr>
          <td>{{ $j->id }}</td>

          <td>
            {{ $j->langganan->formulir->nama ?? '-' }}
          </td>

          <td>{{ $j->materi->mapel->mapel }}</td>
          <td>{{ $j->materi->namaMateri }}</td>
          <td>{{ $j->kelas }}</td>
          <td>{{ $j->pengajar }}</td>
          <td>{{ $j->tanggal }}</td>
          <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai ?? '-' }}</td>

          <td>
            <a href="{{ $j->gmeet_link }}" style="color:#4C7CFF;">Join</a>
          </td>

          <td>
            <button class="action-btn edit"
              data-id="{{ $j->id }}"
              data-langganan="{{ $j->langganan_id }}"
              data-materi="{{ $j->materi_id }}"
              data-kelas="{{ $j->kelas }}"
              data-pengajar="{{ $j->pengajar }}"
              data-tanggal="{{ $j->tanggal }}"
              data-jam_mulai="{{ $j->jam_mulai }}"
              data-jam_selesai="{{ $j->jam_selesai }}"
              data-link="{{ $j->gmeet_link }}"
            >✏️</button>

            <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button class="action-btn delete">🗑️</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


{{-- MODAL --}}
<div class="modal" id="modal">
  <div class="modal-content">

    <h3 id="modalTitle">Tambah Jadwal</h3>

    <form id="jadwalForm" method="POST" action="{{ route('jadwal.store') }}">
      @csrf

      <input type="hidden" name="id" id="id">

      <label>Langganan</label>
      <select name="langganan_id" id="langganan_id" required>
        @foreach ($langganan as $l)
          <option value="{{ $l->id }}">
            {{ $l->paket }} - {{ $l->formulir->nama }}
          </option>
        @endforeach
      </select>

      <label>Materi</label>
      <select name="materi_id" id="materi_id" required>
        @foreach ($materi as $m)
          <option value="{{ $m->id }}">
            {{ $m->mapel->mapel }} - {{ $m->namaMateri }}
          </option>
        @endforeach
      </select>

      <label>Kelas</label>
      <input type="text" name="kelas" id="kelas" required>

      <label>Pengajar</label>
      <input type="text" name="pengajar" id="pengajar" required>

      <label>Tanggal</label>
      <input type="date" name="tanggal" id="tanggal" required>

      <label>Jam Mulai</label>
      <input type="time" name="jam_mulai" id="jam_mulai" required>

      <label>Jam Selesai</label>
      <input type="time" name="jam_selesai" id="jam_selesai">

      <label>Link GMeet</label>
      <input type="text" name="gmeet_link" id="gmeet_link">

      <button type="submit" id="btnSave">Simpan</button>
      <button type="button" class="cancel" id="btnCancel">Batal</button>

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
  const btnAdd = document.getElementById("btnAdd");
  const btnCancel = document.getElementById("btnCancel");
  const form = document.getElementById("jadwalForm");

  btnAdd.onclick = () => {
    modal.style.display = "flex";
    document.getElementById("modalTitle").innerText = "Tambah Jadwal";
    form.action = "{{ route('jadwal.store') }}";

    form.reset();
  };

  btnCancel.onclick = () => modal.style.display = "none";

  document.querySelectorAll(".edit").forEach(btn => {
    btn.onclick = () => {
      modal.style.display = "flex";

      document.getElementById("modalTitle").innerText = "Edit Jadwal";
      form.action = "/jadwalAdmin/update/" + btn.dataset.id;

      document.getElementById("langganan_id").value = btn.dataset.langganan;
      document.getElementById("materi_id").value = btn.dataset.materi;
      document.getElementById("kelas").value = btn.dataset.kelas;
      document.getElementById("pengajar").value = btn.dataset.pengajar;
      document.getElementById("tanggal").value = btn.dataset.tanggal;
      document.getElementById("jam_mulai").value = btn.dataset.jam_mulai;
      document.getElementById("jam_selesai").value = btn.dataset.jam_selesai;
      document.getElementById("gmeet_link").value = btn.dataset.link;
    };
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
