<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile - Langkah Cerdas</title>
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<style>
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #98B9EE;
      color: white;
      min-height: 100vh;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 25px;
      background: #1B449C;
      position: relative;
      height: 100px;
    }

    .back {
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
    }

    .profile-section {
      text-align: center;
      padding: 40px 20px;
    }

    .profile-photo img {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      border: 3px solid white;
      object-fit: cover;
    }

    h2 {
      margin-top: 10px;
      font-size: 22px;
      font-weight: 600;
    }

    p {
      font-size: 14px;
      opacity: 0.9;
    }

    .edit-btn {
      background: none;
      border: 1px solid white;
      color: white;
      padding: 6px 14px;
      border-radius: 8px;
      margin-top: 15px;
      cursor: pointer;
      transition: 0.3s;
    }

    .edit-btn:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .stats-container {
      background: rgba(0, 0, 0, 0.08);
      border-radius: 12px;
      padding: 20px;
      width: 90%;
      margin: 30px auto;
      text-align: left;
      border: 1px solid rgba(0, 0, 0, 1);
      color: white;
    }

    .stats-container h3 {
      font-size: 14px;
      margin-bottom: 10px;
      letter-spacing: 0.5px;
    }

    .subs-box {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255,255,255,0.2);
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .modal {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
      z-index: 200;
    }

    .modal-content {
      background: #1B449C;
      color: white;
      padding: 20px;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
    }

    .modal-content input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border-radius: 6px;
      border: none;
    }

    .modal-content button {
      padding: 10px 15px;
      margin-right: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .modal-content button:first-child {
      background: #fff;
      color: #1B449C;
    }

    .modal-content button:last-child {
      background: #b6b6b6;
      color: black;
    }
</style>
</head>
<body>

<header>
    <div class="back">
        <a href="{{ url('home') }}" style="text-decoration:none; color:white;">
            <span>&larr;</span> Kembali
        </a>
    </div>
</header>

<section class="profile-section">

    <div class="profile-photo">
        <img src="{{ $user->foto ? asset('uploads/profile/'.$user->foto) : asset('asset/backgroundblur.png') }}" alt="Foto Profil">
    </div>

    <h2>{{ $user->nama }}</h2>
    <p>{{ $user->email }}</p>

    <button class="edit-btn" id="editProfileBtn">✏ Edit Profil</button>

    <div class="stats-container">
        <h3>LANGGANAN AKTIF</h3>

        {{-- Jika belum pernah isi formulir --}}
        @if(!$user->formulir || $user->formulir->count() === 0)
            <p style="color:rgb(255, 150, 150);">Belum mengisi formulir.</p>

        {{-- Jika sudah isi formulir --}}
        @else
            @php $adaLangganan = false; @endphp

            @foreach($user->formulir as $form)
                @if($form->langganan && $form->langganan->isNotEmpty())
                    @php $adaLangganan = true; @endphp
                    @foreach($form->langganan as $lang)
                    <div class="subs-box">
                        <p>Tanggal Mulai: {{ $lang->tanggal_mulai }}</p>
                        <p>Tanggal Selesai: {{ $lang->tanggal_selesai }}</p>
                        <p>Status: {{ $lang->status }}</p>
                    </div>
                    @endforeach
                @endif
            @endforeach

            {{-- Jika formulir ada tapi tidak punya langganan --}}
            @if(!$adaLangganan)
                <p style="color:rgb(255, 150, 150);">Belum berlangganan aktif.</p>
            @endif
        @endif

    </div>

</section>

<div id="editProfileModal" class="modal">
    <div class="modal-content">
        <h3 style="margin-bottom:10px;">Edit Profil</h3>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $user->nama }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>

            <label>Foto Profil:</label>
            <input type="file" name="foto">

            <div style="text-align:right; margin-top:10px;">
                <button type="submit">Simpan</button>
                <button type="button" id="cancelBtn">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
const modal = document.getElementById("editProfileModal");
document.getElementById("editProfileBtn").onclick = () => modal.style.display = "flex";
document.getElementById("cancelBtn").onclick = () => modal.style.display = "none";
window.onclick = e => { if(e.target == modal) modal.style.display = "none"; }
</script>

</body>
</html>
