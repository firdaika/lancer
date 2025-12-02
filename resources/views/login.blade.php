<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Langkah Cerdas</title>

  <link rel="stylesheet" href="css/signup2.css">
</head>
<body>

  <div class="login-container">

    <img src="asset/logo.png" alt="Logo" class="logo">
    <h2>Login Akun</h2><br>

     <form action="{{ route('proseslogin') }}" method="POST">
        @csrf
    <input type="text" name="nama" placeholder="Nama Lengkap">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Kata Sandi">

    <button class="login-btn" type="submit">LOGIN</button>

    </form>

    <div class="divider">atau</div>



    <p>belum punya akun? <a href="{{ url('/register') }}">Daftar</a></p>
  </div>

</body>
</html>

