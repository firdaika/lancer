
  // Buka popup
  function openPopup() {
    document.getElementById("popupOverlay").style.display = "flex";
  }

  // Tutup popup
  function closePopup() {
    document.getElementById("popupOverlay").style.display = "none";
  }

  // Semua tombol join diarahkan ke popup
  const joinButtons = document.querySelectorAll(".join-btn");

  joinButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      openPopup();
    });
  });

