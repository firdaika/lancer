<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilih Kategori</title>
  <link rel="stylesheet" href="{{ asset('css/opsisains.css') }}">
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
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 12px rgba(0,0,0,0.15);
  }

  /* Ikon */
  .icon {
    background-color: #e0e7ff;
    border-radius: 50%;
    display: inline-block;
    padding: 15px;
    margin-bottom: 10px;
  }

  .icon img {
    width: 40px;
    height: 40px;
  }

  /* Nama Kategori */
  .card h2 {
    color: #1e3a8a;
    font-size: 1.1rem;
    margin: 0;
  }

  /* Saat Dipilih */
  .selected {
    border: 3px solid #1e40af;
    background-color: #bfdbfe;
  }

  /* Tombol Selanjutnya */
  button {
    background-color: #1e3a8a;
    color: white;
    font-weight: 600;
    border: none;
    padding: 12px 40px;
    border-radius: 10px;
    margin-top: 40px;
    margin-left: 550px;
    cursor: pointer;
    transition: 0.2s;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  }

  button:hover:not(:disabled) {
    background-color: #1d4ed8;
  }

  button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }




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
      <div class="icon"><img src="{{ asset('asset/matematika.png') }}" alt="Matematika"></div>
      <h2>Matematika</h2>
       <button class="info-btn" onclick="showPopup('Matematika')">➜</button>
    </div>

    <div class="card">
      <div class="icon"><img src="{{ asset('asset/iconfisika.png') }}" alt="Fisika"></div>
      <h2>Fisika</h2>
       <button class="info-btn" onclick="showPopup('Fisika')">➜</button>
    </div>

    <div class="card">
      <div class="icon"><img src="{{ asset('asset/biologi.png') }}"  alt="Biologi"></div>
      <h2>Biologi</h2>
       <button class="info-btn" onclick="showPopup('Biologi')">➜</button>
    </div>

    <div class="card">
      <div class="icon"><img src="{{ asset('asset/kimia.png') }}"  alt="Kimia"></div>
      <h2>Kimia</h2>
       <button class="info-btn" onclick="showPopup('Kimia')">➜</button>
    </div>
  </div>

 <form id="formOpsi" action="{{ route('pilihMapel') }}" method="POST">
    @csrf
    <input type="hidden" name="opsi" value="sains" id="selectedOpsi">
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

 <script>
const descriptions = {
  matematika: "Di kelas Matematika, siswa akan mempelajari aljabar, persamaan dan pertidaksamaan, trigonometri, geometri, statistika, dan peluang. Pembelajaran diarahkan agar siswa mampu memahami pola, memecahkan soal dengan berbagai metode, serta meningkatkan kemampuan berpikir logis dan analiti",
  fisika: "Di kelas Fisika, siswa akan mempelajari konsep dasar seperti gerak, gaya, energi, listrik, magnet, gelombang, dan optik. Siswa juga akan dilatih memahami rumus, analisis masalah, serta penerapan fisika dalam fenomena nyata untuk memperkuat logika dan penalaran.",
  biologi: "Di kelas Biologi, siswa akan mempelajari struktur dan fungsi makhluk hidup, sel, jaringan, sistem organ, ekosistem, keanekaragaman hayati, serta proses-proses kehidupan seperti fotosintesis dan respirasi. Fokusnya adalah memahami konsep dasar biologi dan hubungannya dengan kehidupan sehari-hari.",
  kimia: "Di kelas Kimia, siswa akan mempelajari struktur atom, ikatan kimia, tabel periodik, reaksi kimia, stoikiometri, larutan, asam-basa, serta konsep mol. Pembelajaran difokuskan pada pemahaman konsep dasar dan penerapannya dalam kehidupan sehari-hari maupun soal perhitungan."
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
 "Matematika": "matematika",
 "Fisika": "fisika",
 "Biologi": "biologi",
 "Kimia": "kimia"
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
