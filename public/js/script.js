const flashMsg = document.getElementById("flash-message");
            
    // Animasi masuk
    setTimeout(() => {
        flashMsg.classList.remove("opacity-0", "translate-x-10");
        flashMsg.classList.add("opacity-100", "translate-x-0");
    }, 100);
    
    // Auto-hide setelah 3 detik
    setTimeout(() => {
        flashMsg.classList.add("opacity-0", "translate-x-10");
        setTimeout(() => flashMsg.remove(), 500);
    }, 3000);


    document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("successModal");

    // Pastikan modal ada di halaman
    if (!modal) return;

    // ──────────────────────────────────────────────
    // Fungsi buka modal
    // ──────────────────────────────────────────────
    window.showModal = function () {
        modal.classList.remove("hidden");
        document.body.style.overflow = "hidden"; // biar tidak scroll saat modal muncul
    };

    // ──────────────────────────────────────────────
    // Fungsi tutup modal
    // ──────────────────────────────────────────────
    window.hideModal = function () {
        modal.classList.add("hidden");
        document.body.style.overflow = ""; // kembalikan scroll
    };

    // Tombol "Batalkan" (onclick="hideModal()" di HTML kamu)
    const btnBatal = modal.querySelector("button[onclick='hideModal()']");
    if (btnBatal) {
        // tetap biarkan onclick di HTML berfungsi,
        // tapi kita tambahkan event listener juga (opsional, lebih aman)
        btnBatal.addEventListener("click", hideModal);
    }

    // Tutup modal kalau klik di luar kotak putih (backdrop)
    modal.addEventListener("click", function (e) {
        // Jika yang diklik adalah backdrop (bukan konten modal)
        if (e.target === modal) {
            hideModal();
        }
    });

    // Tutup modal dengan tombol ESC
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape" && !modal.classList.contains("hidden")) {
            hideModal();
        }
    });

});