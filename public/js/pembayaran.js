// --- ELEMENT DOM ---
const payBtn = document.getElementById("payBtn");
const confirmPopup = document.getElementById("confirmPopup");
const successPopup = document.getElementById("successPopup");
const failedPopup = document.getElementById("failedPopup");
const incompletePopup = document.getElementById("incompletePopup");

const continueBtn = document.getElementById("continueBtn");
const checkAgainBtn = document.getElementById("checkAgainBtn");
const closeFailBtn = document.getElementById("closeFailBtn");
const closeIncompleteBtn = document.getElementById("closeIncompleteBtn");
const backHomeBtn = document.getElementById("backHomeBtn");

const paymentMethods = document.querySelectorAll("#paymentMethods img");
const metodePembayaranInput = document.getElementById("metode_pembayaran");

// --- PILIH METODE PEMBAYARAN ---
paymentMethods.forEach(img => {
    img.addEventListener("click", () => {
        paymentMethods.forEach(i => i.classList.remove("selected"));
        img.classList.add("selected");
        metodePembayaranInput.value = img.dataset.method;
    });
});

// --- VALIDASI SAAT TEKAN BAYAR ---
payBtn.addEventListener("click", () => {
    const form = document.getElementById("paymentForm");

    // cek form lengkap?
    if (!form.checkValidity()) {
        incompletePopup.style.display = "flex";
        return;
    }

    // cek metode pembayaran
    if (!metodePembayaranInput.value) {
        failedPopup.style.display = "flex";
        return;
    }

    confirmPopup.style.display = "flex";
});

// --- TUTUP POPUP ---
checkAgainBtn.onclick = () => confirmPopup.style.display = "none";
closeFailBtn.onclick = () => failedPopup.style.display = "none";
closeIncompleteBtn.onclick = () => incompletePopup.style.display = "none";

// --- LANJUTKAN PEMBAYARAN → TAMPILKAN SUKSES ---
continueBtn.onclick = () => {
    const form = document.getElementById("paymentForm");
    confirmPopup.style.display = "none";

    // KIRIM FORM BENARAN KE LARAVEL
    form.submit();
};

// --- KEMBALI KE BERANDA ---
backHomeBtn.onclick = () => {
    window.location.href = homeUrl;
};

// --- UPDATE HARGA LANGGANAN ---
document.getElementById("paket").addEventListener("change", function () {
    const type = this.value;

    const mapelPrice = document.getElementById("mapelPrice");
    const adminPrice = document.getElementById("adminPrice");
    const totalPrice = document.getElementById("totalPrice");

    if (hargaPaket[type]) {
        const harga = hargaPaket[type].harga;
        const admin = hargaPaket[type].admin;

        mapelPrice.textContent = "Rp." + harga.toLocaleString();
        adminPrice.textContent = "Rp." + admin.toLocaleString();
        totalPrice.textContent = "Rp." + (harga + admin).toLocaleString();
    }
});
