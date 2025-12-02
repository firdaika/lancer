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
  document.getElementById("logoutAdminForm").submit(); // <-- logout beneran
});
