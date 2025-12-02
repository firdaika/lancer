    const studentTable = document.querySelector('#studentTable tbody');
    const searchInput = document.getElementById('searchInput');

    function renderTable(data) {
      studentTable.innerHTML = '';
      data.forEach((siswa) => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${siswa.id}</td>
          <td>${siswa.userId}</td>
          <td>${siswa.nama}</td>
          <td>${siswa.telepon}</td>
          <td>${siswa.sekolah}</td>
          <td>${siswa.jk}</td>
          <td>${siswa.kelas}</td>
          <td>${siswa.opsi}</td>
          <td>${siswa.paket}</td>
        `;
        studentTable.appendChild(row);
      });
    }

    searchInput.addEventListener('input', () => {
      const q = searchInput.value.toLowerCase();
      const filtered = students.filter(s =>
        s.nama.toLowerCase().includes(q) ||
        s.id.toString().includes(q) ||
        s.userId.toLowerCase().includes(q) ||
        s.kelas.toLowerCase().includes(q)
      );
      renderTable(filtered);
    });

    renderTable(students);

    const logoutBtn = document.getElementById("logoutBtn");
const popupOverlay = document.getElementById("popupOverlay");
const yesBtn = document.getElementById("yesBtn");
const noBtn = document.getElementById("noBtn");

logoutBtn.addEventListener("click", () => {
  popupOverlay.style.display = "flex";
  setTimeout(() => popupOverlay.classList.add("active"), 10);
});

noBtn.addEventListener("click", () => {
  popupOverlay.classList.remove("active");
  setTimeout(() => popupOverlay.style.display = "none", 300);
});

yesBtn.addEventListener("click", () => {
  // langsung diarahkan ke LANDING-PAGE.blade.php
  window.location.href = "/landingpage";
});
