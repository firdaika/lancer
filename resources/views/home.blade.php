<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Langkah Cerdas</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header>
    <div class="logo">
      <img src="{{ asset('asset/logo.png') }}" alt="Logo">
    </div>

    <div class="menu-icon" id="menuIcon">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </header>

  <!-- ===== SIDEBAR ===== -->
<div class="sidebar" id="sidebar">

    {{-- Jika SUDAH LOGIN sebagai USER --}}
   @if(session('logged_in') && session('role') == 'user')
    <!-- Sidebar user -->
    <a href="{{ url('profile') }}">Profil</a>
    <a href="{{ url('notifikasiUser') }}">Notifikasi</a>
    <a href="{{ url('jadwal') }}">Jadwal Bimbel</a>
    <form action="{{ route('logout') }}" method="POST" style="margin:0;padding:0;">
        @csrf
        <button type="submit"
            style="background:none;border:none;color:white;padding:14px 15px;">Logout</button>
    </form>
@else
    <!-- Sidebar login -->
    <a href="{{ url('login') }}">Login</a>
@endif

</div>


  <!-- ===== KONTEN ===== -->
  <section class="content">
    <h1>BELAJAR DENGAN SANTAI BUKAN DIBANTAI</h1>
    <p>Temukan guru <strong>private terbaik</strong> untuk semua mata pelajaran sesuai kebutuhan kamu</p>

    <div class="subjects">
      <div class="subject" onclick="location.href='{{ url('opsiBahasa') }}'">
        <div class="subject-icon">
          <img src="{{ asset('asset/iconbahasa.png') }}" alt="Icon Bahasa">
        </div>
        <span>Bahasa</span>
      </div>

      <div class="subject" onclick="location.href='{{ url('opsisains') }}'">
        <div class="subject-icon">
          <img src="{{ asset('asset/iconsains.png') }}" alt="Icon Sains">
        </div>
        <span>Sains</span>
      </div>

      <div class="subject" onclick="location.href='{{ url('opsisosial') }}'">
        <div class="subject-icon">
          <img src="{{ asset('asset/iconsosial.png') }}" alt="Icon Sosial">
        </div>
        <span>Sosial</span>
      </div>

      <div class="subject" onclick="location.href='{{ url('opsiIt') }}'">
        <div class="subject-icon">
          <img src="{{ asset('asset/iconit.png') }}" alt="Icon IT">
        </div>
        <span>IT</span>
      </div>
    </div>
  </section>

  <!-- HERO -->
  <main>
    <section class="hero" id="top">
      <div class="hero-grid">
        <div>
          <div class="hero-title">Mulai Belajar Lebih Mudah Bersama Langkah Cerdas</div>
          <div class="hero-desc">
            Belajar jadi lebih seru dengan platform bimbingan online terpercaya. Kami punya metode pembelajaran interaktif, materi yang lengkap, dan guru-guru profesional yang siap membantu kamu meraih prestasi terbaik.
          </div>

          <!-- short intro under actions -->
          <p style="color:var(--muted); font-size:13px;">Pilih mata pelajaran yang ingin kamu pelajari dan mulai perjalanan belajarmu dengan materi yang terstruktur dan mudah dipahami.</p>
        </div>


      </div>
    </section>

    <!-- SECTION GAMBAR UTAMA -->
<section class="main-image-section">
  <div class="main-image-wrapper">
  </div>
</section>

   <section id="mapel" class="section" style="padding-top:10px;">
  <h2>Jelajahi Semua Mata Pelajaran</h2>
  <p class="lead">Pilih mata pelajaran yang ingin kamu pelajari dan mulai perjalanan belajarmu dengan materi yang terstruktur dan mudah dipahami.</p>

  <div class="mapel-grid">

    <div class="mapel-card">
      <div class="mapel-icon">📘</div>
      <div>
        <h3>Bahasa</h3>
        <p>Pelajari berbagai bahasa dunia seperti Inggris, Jepang, dan Mandarin untuk membuka wawasan dan meningkatkan kemampuan komunikasi.</p>
      </div>
    </div>

    <div class="mapel-card">
      <div class="mapel-icon">🌍</div>
      <div>
        <h3>Sosial</h3>
        <p>Mempelajari ilmu sosial seperti Ekonomi, Geografi, dan Sejarah dengan penjelasan yang mudah dipahami.</p>
      </div>
    </div>

    <div class="mapel-card">
      <div class="mapel-icon">🔬</div>
      <div>
        <h3>Sains</h3>
        <p>Mempelajari ilmu sains seperti Matematika, Fisika, Kimia, dan Biologi dengan pendekatan visual dan mudah dipahami.</p>
      </div>
    </div>

    <div class="mapel-card">
      <div class="mapel-icon">💻</div>
      <div>
        <h3>IT</h3>
        <p>Mengenal dunia digital mulai dari dasar komputer hingga pemrograman UI/UX modern.</p>
      </div>
    </div>

  </div>


</section>
<!-- materi -->
<section class="section-materi-preview" id="materi">
  <h2>Coba Lihat Materi Kami</h2>

  <div class="materi-preview-grid">

    <div class="materi-preview-card">
      <div class="materi-icon">📹</div>
      <div class="badge-video">Video</div>

      <h4>Pinyin Dan Hanzi Dasar</h4>
      <p>Mandarin</p>
      <div class="materi-meta">
        ⏱ 50 Menit
      </div>
    </div>

    <div class="materi-preview-card">
      <div class="materi-icon">📹</div>
      <div class="badge-video">Video</div>

      <h4>Pengantar Aljabar Linear</h4>
      <p>Matematika</p>
      <div class="materi-meta">
        ⏱ 35 Menit
      </div>
    </div>

    <div class="materi-preview-card">
      <div class="materi-icon">📹</div>
      <div class="badge-video">Video</div>

      <h4>Motif Ekonomi</h4>
      <p>Ekonomi</p>
      <div class="materi-meta">
        ⏱ 35 Menit
      </div>
    </div>

    <div class="materi-preview-card">
      <div class="materi-icon">📹</div>
      <div class="badge-video">Video</div>

      <h4>Tahapan Kerja UI/UX Designer</h4>
      <p>UI/UX</p>
      <div class="materi-meta">
        ⏱ 45 Menit
      </div>
    </div>

  </div>
</section>


    <!-- Kenapa Memilih -->
    <section id="fitur" class="section" style="margin-top:8px;">
      <h2>Kenapa Memilih Langkah Cerdas?</h2>
      <p class="lead">Alasan mengapa siswa memilih kami untuk belajar lebih efektif dan terstruktur.</p>
    </section>

    <!-- Kenapa Memilih - detail cards -->
    <section class="section" style="padding-top:0;">
      <div style="max-width:1100px; margin:auto;">
        <div class="why-grid">
          <div class="why-card">
            <div class="wicon">🎓</div>
            <div>
              <h4>Guru Profesional</h4>
              <p>Pengajar ahli yang berpengalaman dan terlatih, membantu pemahaman materi dengan metode yang tepat.</p>
            </div>
          </div>

          <div class="why-card">
            <div class="wicon">👥</div>
            <div>
              <h4>Kelas Interaktif</h4>
              <p>Diskusi, kuis, dan tugas interaktif untuk membuat proses belajar lebih optimal.</p>
            </div>
          </div>

          <div class="why-card">
            <div class="wicon">▶</div>
            <div>
              <h4>Video Pembelajaran</h4>
              <p>Materi tersaji dalam bentuk video sehingga mudah diulang dan dipahami kapanpun.</p>
            </div>
          </div>

          <div class="why-card">
            <div class="wicon">📝</div>
            <div>
              <h4>Latihan Soal</h4>
              <p>Soal & pembahasan untuk mempersiapkan ujian dan meningkatkan pemahaman konsep.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pendapat Mereka / Testimoni -->
    <section id="testimoni" class="section" style="padding-bottom:8px;">
      <h2>Pendapat Mereka</h2>
      <p class="lead">Ribuan siswa telah merasakan manfaat belajar di Langkah Cerdas dan meraih prestasi yang membanggakan.</p>

      <div class="testi-grid" style="margin-top:18px;">
        <div class="testi-card">
          <div class="stars">★★★★★</div>
          <p>"Langkah Cerdas membantu saya memahami matematika dengan lebih mudah. Gurunya sabar dan cara mengajarnya sangat jelas. Nilai saya meningkat drastis!"</p>
          <div class="testi-meta">
            <div class="avatar"></div>
            <div class="meta-text">
              <strong>Ahmad Faiz</strong>
              <small>Kelas 11</small>
            </div>
          </div>
        </div>

        <div class="testi-card">
          <div class="stars">★★★★★</div>
          <p>"Materinya lengkap dan video pembelajarannya menarik. Saya bisa belajar kapan saja tanpa terikat waktu. Sangat membantu persiapan ujian!"</p>
          <div class="testi-meta">
            <div class="avatar"></div>
            <div class="meta-text">
              <strong>Rosita</strong>
              <small>Kelas 12</small>
            </div>
          </div>
        </div>

        <div class="testi-card">
          <div class="stars">★★★★★</div>
          <p>"Platform yang sempurna untuk persiapan UTBK. Latihan soalnya banyak dan pembahasannya detail. Recommended!"</p>
          <div class="testi-meta">
            <div class="avatar"></div>
            <div class="meta-text">
              <strong>Hafiz</strong>
              <small>Kelas 12</small>
            </div>
          </div>
        </div>

        <div class="testi-card">
          <div class="stars">★★★★★</div>
          <p>"LangkahCerdas emang bantu banget buat belajar, apalagi pas lagi susah ngerti materi. Aku bisa belajar lebih santai dan paham materi dengan lebih baik."</p>
          <div class="testi-meta">
            <div class="avatar"></div>
            <div class="meta-text">
              <strong>Melisa</strong>
              <small>Kelas 10</small>
            </div>
          </div>
        </div>
      </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    <div class="footer-grid">
      <div class="col">
        <div style="display:flex; gap:10px; align-items:center;">
  <img
    src="{{ asset('asset/logo.png') }}"
    alt="logo"
    style="width:80px; height:80px; object-fit:contain;">

  <div>


            <div style="font-size:13px; color:var(--muted); margin-top:6px;">Platform bimbingan belajar online terpercaya <br> yang membantu siswa mencapai prestasi terbaik <br> dengan metode pembelajaran modern dan interaktif.</div>
          </div>
        </div>
      </div>



      <div class="col">
        <strong>Kontak</strong>
        <div style="margin-top:8px; color:var(--muted);">
          langkahcerdas@gmail.com<br>+62 812-3456-7890
        </div>
      </div>
    </div>
  </footer>

  <div style="text-align:center; padding:14px 10px; color:var(--muted); font-size:13px;">
    © 2025 Langkah Cerdas. All rights reserved.
  </div>
  </main>

 <script>
document.addEventListener("DOMContentLoaded", function () {
    const offset = 90; // tinggi navbar kamu ~100px

    function smoothScroll(targetY, duration = 650) {
        const startY = window.pageYOffset;
        const diff = targetY - startY;
        let start;

        function easeOut(t) {
            return 1 - Math.pow(1 - t, 3); // animasi lebih smooth
        }

        function step(timestamp) {
            if (!start) start = timestamp;
            const time = timestamp - start;
            const progress = Math.min(time / duration, 1);

            window.scrollTo(0, startY + diff * easeOut(progress));

            if (time < duration) requestAnimationFrame(step);
        }

        requestAnimationFrame(step);
    }

    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", function (e) {
            const id = this.getAttribute("href");
            if (!id || id === "#") return;

            const section = document.querySelector(id);
            if (!section) return;

            e.preventDefault();

            const targetY =
                section.getBoundingClientRect().top +
                window.pageYOffset -
                offset;

            smoothScroll(targetY);
        });
    });
});
</script>

  <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
