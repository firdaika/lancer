<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Langkah Cerdas</title>
  <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
</head>
<body>
  <!-- HERO -->
  <section class="hero">
    <div class="hero-left">
      <h3>BELAJAR DENGAN SANTAI BUKAN DIBANTAI</h3>
      <p class="hero-text">
        Langkah Cerdas, karena setiap langkah kecil<br>
        bisa bawa kamu ke masa depan besar
      </p>
      <a href="{{ url('/home') }}" class="btn-utama">Temukan sekarang</a>
    </div>

    <div class="hero-right">
      <img src="{{ asset('asset/manusia.png') }}" alt="Siswa" />
      <img src="{{ asset('asset/logo.png') }}" alt="Langkah Cerdas Logo" class="logo-atas"/>
    </div>
  </section>

  <!-- LANCER ITU APA -->
  <section class="about">
    <div class="about-text">
      <h2>LANCER ITU APA SIH?</h2>
      <p>
        Lancer adalah aplikasi bimbingan belajar online yang membantu pelajar untuk belajar secara praktis,
        efisien, dan fleksibel. Melalui aplikasi ini, pelajar dapat berlangganan eksplorasi ilmu untuk mengikuti
        pembelajaran secara online hanya dari rumah dengan menggunakan smartphone dan perangkat lainnya.
      </p>
    </div>

    <div class="about-images">
      <div class="about-image-main">
        <img src="{{ asset('asset/ika.png') }}" alt="Ika Lancer" />
      </div>

      <div class="about-image-small small-right">
        <img src="{{ asset('asset/ica-sindy.png') }}" alt="Ica Sindy Lancer" />
      </div>

      <div class="about-image-small small-bottom">
        <img src="{{ asset('asset/ber3.png') }}" alt="Ber3 Lancer" />
      </div>
    </div>
  </section>

  <!-- TENTANG KAMI -->
  <section class="tentang">
    <h2>TENTANG KAMI</h2>
    <div class="card-container">
      <div class="card">
        <div class="card-icon">
          <img src="{{ asset('asset/tandatanya.png') }}" alt="Mengapa Lancer">
        </div>
        <h3>Mengapa Lancer</h3>
        <p>Lancer menjadi tempat terbaik bagi pelajar untuk memahami konsep belajar dengan UNBK atau BAH-P!</p>
      </div>

      <div class="card">
        <div class="card-icon">
          <img src="{{ asset('asset/logoschool.png') }}" alt="Lancer Program">
        </div>
        <h3>Lancer</h3>
        <p>Memberikan 2 kategori pembelajaran dengan 14 program unggulan.</p>
      </div>

      <div class="card">
        <div class="card-icon">
          <img src="{{ asset('asset/topiwisuda.png') }}" alt="Belajar di Lancer">
        </div>
        <h3>Belajar di Lancer</h3>
        <p>Lancer menyajikan metode belajar interaktif berbasis digital!</p>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="footer-left">
      <img src="{{ asset('asset/logo.png') }}" alt="Langkah Cerdas Logo" />
      <p>
        Langkah Cerdas adalah platform pembelajaran online yang membantu siswa belajar di mana saja
        dan kapan saja dengan cara yang efektif dan menyenangkan.
      </p>
    </div>

    <div class="footer-column">
      <h4>KONTAK KAMI</h4>
      <a href="mailto:langkahcerdas@gmail.com">langkahcerdas@gmail.com</a>
    </div>

    <div class="footer-column">
      <h4>IKUTI KAMI</h4>
      <a href="#">
        <img src="{{ asset('asset/instagram.png') }}" alt="Instagram" class="social-icon" /> Instagram
      </a>
      <a href="#">
        <img src="{{ asset('asset/facebook.png') }}" alt="Facebook" class="social-icon" /> Facebook
      </a>
    </div>

    <div class="footer-column">
      <h4>LOKASI</h4>
      <p>Kp. Jampang, Desa Wanaherang, Kec. Gunung Putri, Jl. Letdanatsir, Rt 01 Rw 03, Bogor.</p>
    </div>
  </footer>
</body>
</html>
