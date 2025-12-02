<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Langkah Cerdas</title>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
          <a href="{{ url('/dasboardAdmin') }}" class="active">Dashboard</a>
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
         <a href="{{ url('/notifikasi') }}">Notifikasi</a>

    <button class="logout-btn" id="logoutBtn">Logout</button>
  </div>

 <!-- Main -->
<div class="main-content">

    <!-- Bagian header -->
    <div class="header">
      <div class="info-cards">
        <div class="card">
          <i>👨‍🎓</i>
          <p>Data berlangganan</p>
          <h3>{{ $muridAktif }}</h3>
        </div>
        <div class="card">
          <i>👨‍🏫</i>
          <p>Guru</p>
          <h3>{{ $guru }}</h3>
        </div>
      </div>
    </div>

    <!-- Chart dipisahkan dari header -->
    <h2>Pendapatan</h2>
    <div class="chart-container">
        <canvas id="incomeChart"></canvas>
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
  new Chart(document.getElementById('incomeChart'), {
    type: 'line',
    data: {
      labels: @json($labels),
      datasets: [{
        label: 'Total Pemasukan (Rp)',
        data: @json($pendapatan),
        borderColor: '#4F46E5',
        backgroundColor: 'rgba(79, 70, 229, 0.2)',
        borderWidth: 3,
        tension: 0.4,
        fill: true,
        pointRadius: 5,
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


     <script src="{{ asset('js/dasboardAdmin.js') }}"></script>
      <script src="{{ asset('js/popup-logout.js') }}"></script>


</body>
</html>
