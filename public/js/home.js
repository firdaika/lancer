const menuIcon = document.getElementById('menuIcon');
    const sidebar = document.getElementById('sidebar');

    menuIcon.addEventListener('click', () => {
      menuIcon.classList.toggle('active');
      sidebar.classList.toggle('active');
    });

    // Tutup sidebar kalau klik di luar area
    document.addEventListener('click', (e) => {
      if (!sidebar.contains(e.target) && !menuIcon.contains(e.target)) {
        sidebar.classList.remove('active');
        menuIcon.classList.remove('active');
      }
    });