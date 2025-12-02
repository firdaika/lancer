<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Kategori</title>
  <link rel="stylesheet" href="{{ asset('css/opsibahasa.css') }}">
</head>
<style>
/* Warna dasar */
* .body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background-color: #76a6f4;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
}

/* Navbar */
.navbar {
  background-color: #1e3a8a;
  color: white;
  width: 100%;
  height: 70px;
  display: flex;
  justify-content: space-between;
  padding: 12px 24px;
  font-weight: 600;
  box-sizing: border-box;
}

.back {
  font-weight: 600;
  font-size: 14px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 5px;
}

/* ===== SIDEBAR ===== */
.sidebar {
  position: fixed;
  top: 20px;
  right: -250px;
  width: 200px;
  height: auto;
  background: rgba(3, 34, 91, 0.95);
  backdrop-filter: blur(10px);
  border-radius: 0 0 0 10px;
  box-shadow: -4px 4px 20px rgba(0, 0, 0, 0.4);
  display: flex;
  flex-direction: column;
  transition: right 0.4s ease;
  z-index: 5;
  overflow: hidden;
}

.sidebar.active {
  right: 0;
}

.sidebar a {
  color: white;
  text-decoration: none;
  padding: 14px 25px;
  font-size: 15px;
  font-weight: 500;
  transition: background 0.3s ease, padding-left 0.3s ease;
}

.sidebar a:hover {
  background: rgba(255, 255, 255, 0.1);
  padding-left: 35px;
}

/* Judul */
.judul {
  color: #1e3a8a;
  font-size: 1.8rem;
  margin: 30px 0 20px;
  margin-left: 470px;
  margin-bottom: 50px;
  margin-top: 50px;
}

/* Container Kartu */
.container {
  display: grid;
  grid-template-columns: repeat(2, 180px);
  gap: 20px;
  justify-content: center;
}

/* Card Style */
.card {
  background-color: white;
  border-radius: 16px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  padding: 20px;
  text-align: center;
  transition: 0.2s;
  cursor: pointer;
  position: relative;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 12px rgba(0,0,0,0.15);
}

/* Tombol panah */
   /* Tombol Panah di dalam card */
.info-btn {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);

  background: transparent !important;
  border: none !important;

  width: auto;
  height: auto;
  padding: 0;

  color: #1e3a8a; /* biar panah tetap biru tua */
  font-size: 20px;
  cursor: pointer;
}

.info-btn:hover {
  color: #1d4ed8; /* efek hover panah saja */
}




/* Pastikan card bisa pakai posisi absolute */
.card {
  position: relative;
}

/* ===== POPUP BG ===== */
.popup-bg {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.55);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 999;

  animation: fadeIn 0.25s ease forwards;
}

/* ===== POPUP BOX ===== */
.popup {
  background: white;
  padding: 25px 28px;
  width: 340px;
  border-radius: 14px;

  box-shadow: 0 8px 25px rgba(0,0,0,0.35);
  text-align: center;

  transform: translateY(-20px);
  opacity: 0;
  animation: popUp 0.35s ease forwards;
}

.popup h3 {
  color: #1e3a8a;
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 12px;
}

.popup p {
  font-size: 14px;
  color: #333;
  line-height: 1.45;
  margin-bottom: 22px;
}

/* Tombol Tutup */
.close-popup {
  background: #1e3a8a;
  color: white;
  padding: 10px 22px;
  border-radius: 8px;
  cursor: pointer;
  border: none;
  font-size: 14px;
  font-weight: 600;
  transition: 0.25s ease;
}

.close-popup:hover {
  background: #244bb8;
  transform: translateY(-1px);
}

/* ===== Animations ===== */
@keyframes popUp {
  0% { transform: translateY(-15px); opacity: 0; }
  100% { transform: translateY(0); opacity: 1; }
}

@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}


.close-btn {
  background: #1e3a8a;
  color: white;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  border: none;
}

</style>

<body>

<nav class="navbar">
  <div class="back" onclick="window.history.back()"><span>&larr;</span> KEMBALI</div>
</nav>

<h1 class="judul">Pilih Maksimal 1 Kategori</h1>

<div class="container">

  <div class="card">
    <div class="icon"><img src="{{ asset('asset/italia.png') }}" alt="bahasaitalia"></div>
    <h2>Bahasa Italia</h2>
    <button class="info-btn" onclick="showPopup('italia')">➜</button>
  </div>

  <div class="card">
    <div class="icon"><img src="{{ asset('asset/india.png') }}" alt="bahasaindia"></div>
    <h2>Bahasa India</h2>
    <button class="info-btn" onclick="showPopup('india')">➜</button>
  </div>

  <div class="card">
    <div class="icon"><img src="{{ asset('asset/china.png') }}" alt="bahasamandarin"></div>
    <h2>Bahasa <br>Mandarin</h2>
    <button class="info-btn" onclick="showPopup('mandarin')">➜</button>
  </div>

  <div class="card">
    <div class="icon"><img src="{{ asset('asset/jepang.png') }}" alt="bahasajepang"></div>
    <h2>Bahasa Jepang</h2>
    <button class="info-btn" onclick="showPopup('jepang')">➜</button>
  </div>

</div>

 <form id="formOpsi" action="{{ route('pilihMapel') }}" method="POST">
    @csrf
    <input type="hidden" name="opsi" value="bahasa" id="selectedOpsi">
    <button type="submit" id="nextBtn" disabled>LANJUT</button>
</form>

<!-- ===== POPUP ===== -->
<div class="popup-bg" id="popupBg">
  <div class="popup" id="popupContent">
    <h3></h3>
    <p></p>
    <button class="close-popup" onclick="closePopup()">Tutup</button>
  </div>
</div>

<!-- Script -->
 <script>
// ========================
// DATA DESKRIPSI (FILE 1)
// ========================
const descriptions = {
  italia: "Dalam kursus bahasa Italia ini, kita akan menjelajahi kosakata dasar, percakapan umum, dan ekspresi penting sehari-hari dengan metode yang mudah dipahami dan menyenangkan. Kita akan belajar tentang sapori, cibo, bevande, trasporto, dan numeri, serta frasa-frasa seperti 'Come stai?'. Dengan mempelajari bahasa Italia, kamu akan dapat berkomunikasi dengan orang Italia, dan menikmati film, musik.",
  india: "Di kelas Bahasa India, siswa akan mempelajari dasar-dasar percakapan sehari-hari, pengenalan huruf Devanagari, kosakata penting, serta struktur kalimat sederhana yang sering digunakan dalam komunikasi.",
  mandarin: "Di kelas Bahasa Mandarin ini, siswa akan mempelajari dasar-dasar percakapan sehari-hari, pengenalan nada (tones), dan cara menulis dan membaca huruf Hanzi. Mereka juga akan berlatih kosakata dan pola kalimat sederhana, serta meningkatkan kemampuan berbicara dan mendengarkan. Dengan mempelajari bahasa Mandarin, siswa dapat meningkatkan kesempatan karir, studi, dan perjalanan ke Cina, serta menikmati film.",
  jepang: "Di kelas Bahasa Jepang ini, siswa akan mempelajari dasar-dasar percakapan sehari-hari dan pengenalan huruf Hiragana, Katakana, dan Kanji sederhana. Mereka juga akan berlatih kosakata dan pola kalimat dasar yang sering digunakan, sehingga dapat meningkatkan kemampuan berbicara dan mendengarkan."
};

// ================================
// POPUP EXPLANATION (FILE 1)
// ================================
function showPopup(langKey) {
  document.getElementById("popupBg").style.display = "flex";

  const title = langKey.charAt(0).toUpperCase() + langKey.slice(1);
  document.querySelector(".popup h3").innerText = "Penjelasan " + title;
  document.querySelector(".popup p").innerText = descriptions[langKey];
}

function closePopup() {
  document.getElementById("popupBg").style.display = "none";
}

// ================================
// LOGIKA PILIH CARD (FILE 2)
// + dipadukan dengan popup File 1
// ================================
const cards = document.querySelectorAll('.card');
const nextBtn = document.getElementById('nextBtn');
const selectedOpsi = document.getElementById('selectedOpsi');

// mapping nama mapel → key descriptions
const mapelToKey = {
  "Italia": "italia",
  "Bahasa Italia": "italia",
  "India": "india",
  "Bahasa India": "india",
  "Mandarin": "mandarin",
  "Bahasa Mandarin": "mandarin",
  "Jepang": "jepang",
  "Bahasa Jepang": "jepang"
};

cards.forEach(card => {
  card.addEventListener('click', () => {

    // 1. reset semua card
    cards.forEach(c => c.classList.remove('selected'));

    // 2. tandai card terpilih
    card.classList.add('selected');

    // 3. ambil teks mapel dari <h2>
    const mapelName = card.querySelector('h2').textContent.trim();

    // 4. isi hidden input dengan nama mapel (bukan opsi)
    selectedOpsi.value = mapelName;

    // 5. aktifkan tombol lanjut
    nextBtn.disabled = false;

    // 6. popup penjelasan
    const key = mapelToKey[mapelName];
    if (key) {
      showPopup(key);
    }
  });
});
</script>

  <script src="{{  asset('js/opsi.js') }}"></script>

</body>
</html>
