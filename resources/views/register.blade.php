
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Langkah Cerdas</title>
  <link rel="stylesheet" href="/css/signup.css">
</head>
<body>
  <div class="signup-container">
    <form action="{{ route('register') }}" method="POST">
         @csrf
    <img src="asset/logo.png" alt="Logo" class="logo">
    <h2>Buat Akun Baru</h2>

    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="text" name="ttl" placeholder="Tanggal Lahir (yy/bb/dd)" required>
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Kata Sandi" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi">

    <button class="register-btn" type="submit" >Daftar</button>
    </form>

    <div class="divider">atau</div>



    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
  </div>
</body>
</html>
