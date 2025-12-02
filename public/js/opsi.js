// Ambil semua card dan tombol
const cards = document.querySelectorAll('.card');
const nextBtn = document.getElementById('nextBtn');

let selectedKategori = null;

cards.forEach(card => {
  card.addEventListener('click', () => {
    // Maksimal 1 kategori
    if (!card.classList.contains('selected') && selectedKategori) {
      alert('Kamu hanya bisa memilih maksimal 1 kategori!');
      return;
    }

    // Toggle seleksi
    card.classList.toggle('selected');
    selectedKategori = card.classList.contains('selected')
      ? card.querySelector('h2').innerText
      : null;

    // Aktifkan tombol jika ada kategori
    nextBtn.disabled = !selectedKategori;
  });
});

nextBtn.addEventListener('click', () => {
  if (selectedKategori) {
    // Langsung arahkan ke PEMBAYARAN.blade.php dengan kategori
    window.location.href = `/PEMBAYARAN?kategori=${encodeURIComponent(selectedKategori)}`;
  }
});
