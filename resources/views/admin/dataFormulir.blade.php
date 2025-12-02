<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Siswa - Langkah Cerdas</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/formulir.css') }}">
  <style>

  </style>
</head>
<body>

  <div class="sidebar">
         <a href="{{ url('/dasboardAdmin') }}">Dashboard</a>
        <a href="{{ url('/dataUser') }}" >Data User</a>
        <a href="{{ url('/dataFormulir') }}" class="active">Data Formulir</a>
        <a href="{{ url('/dataLangganan') }}">Data Langganan</a>
        <a href="{{ url('/dataPembayaran') }}">Data Pembayaran</a>
        <a href="{{ url('/mataPelajaran') }}">Data Mata Pelajaran</a>
        <a href="{{ url('/dataMateri') }}">Data Materi</a>
         <a href="{{ url('/jadwalAdmin') }}">Data Jadwal</a>
           <a href="{{ url('/dataAdmin') }}">Data Admin</a>
          <a href="{{ url('/dataGuru') }}">Data Guru</a>
          <a href="{{ url('/dataPaket') }}" >Data Paket</a>
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>

    <button class="logout-btn" id="logoutBtn">Logout</button>
  </div>

  <div class="main-content">

    <div class="header">
      <input type="text" id="searchInput" placeholder="Cari nama, email...">
   </div>

    <table id="studentTable">
      <thead>

        <tr>
          <th>ID</th>
          <th>User ID</th>
          <th>Nama</th>
          <th>Telepon</th>
          <th>Asal Sekolah</th>
          <th>Jenis Kelamin</th>
          <th>Kelas</th>
          <th>Opsi</th>
          <th>Paket</th>
        </tr>
         </thead>
        <tbody id="tableBody">
            @foreach ( $formulir as $index => $f )
                <tr>
                    <td>{{ $f->id }}</td>
                    <td>{{ $f->user_id }}</td>
                    <td>{{ $f->nama }}</td>
                    <td>{{ $f->telpon }}</td>
                    <td>{{ $f->asalSekolah }}</td>
                    <td>{{ $f->jenisKelamin }}</td>
                    <td>{{ $f->kelas }}</td>
                    <td>{{ $f->opsi }}</td>
                    <td>{{ $f->paket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>

  <!-- Popup Logout -->
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
<script src="{{ asset('js/formulir.js') }}"></script>
</body>
</html>









