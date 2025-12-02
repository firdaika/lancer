<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir dan Pembayaran</title>
  <link rel="stylesheet" href="{{ asset('css/pembayaran.css') }}">
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="back" onclick="window.history.back()"><span>&larr;</span> KEMBALI</div>
    <div class="menu">&#9776;</div>
  </header>

  <!-- FORM -->
  <div class="form-container">
    <form id="paymentForm" method="POST" action="{{ route('pembayaran.store') }}">
        @csrf

      <input type="text" id="nama" name="nama" placeholder="Nama" required>
      <input type="text" id="telpon" name="telpon" placeholder="Telpon" required>
      <input type="text" id="asalSekolah" name="asalSekolah" placeholder="Asal Sekolah" required>

      <select id="jeniskelamin" name="jenisKelamin" required>
        <option value="" disabled selected hidden>Jenis Kelamin</option>
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>

       <select id="kelas" name="kelas" required>
        <option value="" disabled selected hidden>Kelas</option>
        <option value="1">1 </option>
        <option value="2">2 </option>
        <option value="3">3 </option>
        <option value="4">4 </option>
        <option value="5">5 </option>
        <option value="6">6 </option>
        <option value="7">7 </option>
        <option value="8">8 </option>
        <option value="9">9 </option>
        <option value="10">10 </option>
        <option value="11">11 </option>
        <option value="12">12 </option>
      </select>
      <input type="hidden" name="opsi" value="{{ session('opsi') }}">

      <!-- Dropdown Langganan -->
      <select id="paket" name="paket" required>
        <option value="" disabled selected hidden>Pilihan Paket</option>
        <option value="1bulan">1 Bulan (12X Pertemuan)</option>
         <option value="3bulan">3 Bulan (36X Pertemuan)</option>
          <option value="6bulan">6 Bulan (72X Pertemuan)</option>
        <option value="1tahun">1 Tahun (144X Pertemuan)</option>
      </select>

      <input type="hidden" id="metode_pembayaran" name="metode_pembayaran">

      <label>Pilih Metode Pembayaran</label>
      <div class="payment-section">
        <div class="payment-methods" id="paymentMethods">
          <img src="{{ asset('asset/dana.png') }}" alt="DANA" data-method="DANA">
          <img src="{{ asset('asset/mandiri.png') }}" alt="Mandiri" data-method="Mandiri">
          <img src="{{ asset('asset/qris.png') }}" alt="QRIS" data-method="QRIS">
          <img src="{{ asset('asset/bri.png') }}" alt="BRI" data-method="BRI">
        </div>

        <div class="payment-details">
          <h4>Rincian Pembayaran</h4>
          <div class="row"><span>Pembimbing MAPEL</span><span id="mapelPrice">Rp.xxxxxx</span></div>
          <div class="row"><span>Admin</span><span id="adminPrice">Rp.xxxxxx</span></div>
          <hr style="margin: 8px 0;">
          <div class="row" style="font-weight: 600;"><span>TOTAL</span><span id="totalPrice">Rp.xxxxxx</span></div>
        </div>
      </div>

      <button type="button" class="pay-btn" id="payBtn">BAYAR</button>
    </form>
  </div>

  <!-- POPUP KONFIRMASI -->
  <div class="popup-overlay" id="confirmPopup">
    <div class="popup">
      <h3>Apakah data formulir sudah benar?</h3>
      <button class="btn-cancel" id="checkAgainBtn">Periksa Ulang</button>
      <button class="btn-continue" id="continueBtn">Lanjutkan Pembayaran</button>
    </div>
  </div>

  <!-- POPUP SUKSES -->
  <div class="popup-overlay" id="successPopup">
    <div class="popup">
      <h3>Pembayaran Berhasil</h3>
      <p>Terima kasih! Pembayaran kamu sudah dikonfirmasi.</p>
      <button class="btn-back" id="backHomeBtn">Kembali ke Beranda</button>
    </div>
  </div>

  <!-- POPUP GAGAL -->
  <div class="popup-overlay" id="failedPopup">
    <div class="popup">
      <h3>Pembayaran Gagal</h3>
      <p>Silakan pilih metode pembayaran terlebih dahulu.</p>
      <button class="btn-back" id="closeFailBtn">Tutup</button>
    </div>
  </div>

  <!-- POPUP FORMULIR BELUM LENGKAP -->
  <div class="popup-overlay" id="incompletePopup">
    <div class="popup">
      <h3>Formulir Belum Lengkap</h3>
      <p>Harap isi semua kolom formulir sebelum melanjutkan pembayaran.</p>
      <button class="btn-back" id="closeIncompleteBtn">Tutup</button>
    </div>
  </div>

  <!-- PASS DATA KE JS -->
  <script>
    const hargaPaket = @json($paket);
    const homeUrl = "{{ route('home') }}";
  </script>

  <script src="{{ asset('js/pembayaran.js') }}"></script>

</body>
</html>
