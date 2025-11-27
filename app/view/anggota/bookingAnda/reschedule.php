<?php
?>

<main class="container mx-auto px-6 py-8">
    <div class="mx-5">
        <nav class="mb-6 text-sm text-dark-overlay/60 flex items-center">
            <a href="/Dashboard" class="text-[#1E68FB] hover:text-blue-700">Bookingan Anda</a>
            <span class="mx-2">
                <img src="/icon/arrow.svg" alt="arrowRight" class="inline w-4 h-4">
            </span>
            <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Reschedule</span>
        </nav>

        <h2 class="text-3xl font-bold text-[#1A1A1A] mb-6">Reschedule</h2>

        <div class="flex flex-col gap-8 lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="order-2 lg:order-none lg:col-span-2">
                <div class="bg-[#FBFCFF] rounded-2xl shadow-lg p-6 md:p-8">

                    <form id="bookingForm" action="/Booking/handleBooking" method="POST">
                        <input type="hidden" name="id_room" value="<?= $detailRuangan['id_room'] ?>">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    Tanggal Pinjam <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="date" id="tanggalPinjam" name="tanggalPinjam" required
                                    class="w-full p-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-sm">
                            </div>
                            <div class="flex items-end">
                                <div class="w-full">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                        Total Jam
                                    </label>
                                    <div id="totalTime" class="inline-flex items-center py-2 text-gray-800 font-bold rounded-full text-xl">
                                        0 Jam 0 Menit
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    Jam Mulai <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="jamMulai" name="jamMulai" disabled required class="w-full p-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none text-sm">
                                    <option value="" disabled selected hidden>Pilih jam mulai</option>
                                </select>
                            </div>
                            <div class="relative">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    Jam Selesai <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="jamSelesai" name="jamSelesai" disabled required class="w-full p-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none text-sm">
                                    <option value="" disabled selected hidden>Pilih jam selesai</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-4 flex items-center">
                                Daftar Anggota <span class="text-red-500 ml-1">*</span>
                                <span class="ml-2 text-xs text-gray-500 font-normal">(Minimal <?=  $detailRuangan['min_capacity']?> orang)</span>
                            </label>
                            <div id="membersContainer" class="space-y-4">
                                <div class="member-card p-4 bg-[#1E68FB10] rounded-xl border border-blue-200">
                                    <div class="flex items-center mb-2">
                                        <span class="inline-flex items-center justify-center w-7 h-7 bg-[#1E68FB] text-white rounded-full text-xs font-bold">1</span>
                                        <span class="ml-2 font-medium text-sm text-[#1E68FB]">Penanggung Jawab</span>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <input type="text" maxlength="10" max="10" placeholder="<?= $user['nomor_induk'] ?>" name="nim[]" value="<?= $user['nomor_induk'] ?>" readonly
                                            class="nim-input w-full px-4 py-2.5 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                        <input type="text" placeholder="<?= $user['username'] ?>" name="nama[]" readonly
                                            class="nama-input w-full px-4 py-2.5 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                    </div>
                                </div>
                                <?php for ($i= 0; $i < $detailRuangan['min_capacity'] - 1 ; $i++) :?>
                                <div class="member-card p-4 bg-gray-50 rounded-xl border border-gray-300">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <span class="inline-flex items-center justify-center w-7 h-7 bg-gray-600 text-white rounded-full text-xs font-bold"><?= $i + 2?></span>
                                            <span class="ml-2 font-medium text-sm text-gray-800">Anggota</span>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <input type="text" maxlength="10" placeholder="NIM/NIP Anggota *" name="nim[]" required
                                            class="nim-input w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                        <input type="text" placeholder="Nama Lengkap Anggota" name="nama[]" readonly
                                            class="nama-input w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                    </div>
                                </div>
                                <?php endfor ?>
                            </div>
                            <button type="button" id="addMember" onclick="addMember()"
                                    class="rounded-md mt-4 flex items-center bg-[#1E68FB10] text-[#1E68FB] hover:text-blue-700 hover:bg-blue-200 hover:cursor-pointer text-sm font-medium transition px-4 py-1">
                                Tambah Anggota
                                <img src="/icon/plusBlue.svg" alt="tambah Anggota" class="w-4 h-4 ml-3">
                            </button>
                        </div>

                        <div id="errorMessage" class="hidden mb-6 p-4 bg-red-50 border border-red-300 text-red-700 rounded-xl flex items-start text-sm">
                            <i class="fas fa-exclamation-triangle mt-0.5 mr-2"></i>
                            <span></span>
                        </div>

                        <button type="submit"
                                class="w-full py-3 hover:cursor-pointer bg-[#38C55C] text-white font-bold rounded-xl hover:bg-emerald-600 transition shadow-sm text-base">
                            Booking Ruangan Ini
                        </button>
                    </form>
                </div>
            </div>

            <div class="order-1 lg:order-none lg:col-span-1 space-y-6 lg:sticky">
        
                <!-- KARTU RUANGAN (TIDAK STICKY) -->
                <div class="bg-[#FBFCFF] rounded-2xl shadow-lg overflow-hidden">
                    <?php 
                        // Ambil URL gambar dari array PHP
                        $imageUrl = "/img/" . $detailRuangan['img_room'];
                    ?>

                    <div class="h-56 relative overflow-hidden bg-gray-200" 
                        style="background-image: url('<?= htmlspecialchars($imageUrl) ?>'); 
                                background-size: cover; 
                                background-position: center;">
                        <!-- Overlay Rating (mirip gambar) -->
                        <div class="absolute bottom-2 left-2 flex items-center gap-3 px-5 py-1
                                        bg-[#171E2950]
                                        rounded-lg border border-gray-100 
                                        animate-in fade-in slide-in-from-bottom duration-500">
                            
                            <!-- Bintang -->
                            <div class="flex items-center gap-1">
                                <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                                </svg>
                                <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                                </svg>
                                <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                                </svg>
                                <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                                </svg>
                                <svg class="w-7 h-7 text-gray-300 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                                </svg>
                            </div>

                            <!-- Teks rating -->
                            <div class="text-white">
                                <span class="text-xl font-bold">4/5</span>
                                <span class="text-sm font-medium text-white ml-2">(67 Respon)</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="font-bold text-2xl text-gray-800 mb-4"><?= $detailRuangan['room_name'] ?></h3>
                        <div class="space-y-3 text-sm text-gray-600 mb-6">
                            <p class="flex items-center">
                                <img src="/icon/location.svg" alt="Lantai" class="w-5 h-5 mr-3">
                                lantai <?= $detailRuangan['floor'] ?>
                            </p>
                            <p class="flex items-center">
                                <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-5 h-5 mr-3">
                                <?= $detailRuangan['min_capacity'] . ' - ' . $detailRuangan['max_capacity'] ?> orang
                            </p>
                        </div>
                        <details class="text-gray-600">
                            <summary class="text-base font-semibold cursor-pointer text-[#171E2980] hover:text-gray-400 flex items-center">
                                Deskripsi Ruangan
                                <img src="/icon/arrowDown.svg" alt="Deskripsi" class="w-4 h-4 ml-3">
                            </summary>
                            <p class="mt-3 text-sm leading-relaxed text-justify">
                                <?=  $detailRuangan['description'] ?>
                            </p>
                        </details>
                    </div>
                </div>

                <!-- KARTU TATA TERTIB (STICKY) -->
                <details class="lg:top-6 bg-white rounded-lg shadow-sm border border-gray-200 p-4 z-10">
                    <summary class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img src="/icon/law.svg" alt="TATA TERTIB" class="w-5 h-5 mr-3">
                            <span class="text-lg font-semibold text-[#1A1A1A]">Tata Tertib</span>
                        </div>
                        <img src="/icon/arrowDown.svg" alt="Deskripsi" class="w-4 h-4 ml-3">
                    </summary>
                    <p class="mt-3 text-sm leading-relaxed text-justify">
                        <?=  $detailRuangan['description'] ?>
                    </p>
                </details>


            </div>
        </div>
    </div>
</main>

<!-- **************************************************
INI POP UP KONFIRMASI
******************************************************* -->
<div id="confirmModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 w-full max-w-sm mx-4 text-center">
        <div class="mb-4">
            <i class="fas fa-calendar-check text-green-500 text-5xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Konfirmasi Booking</h3>
        <p class="text-sm text-gray-600 mb-6">Data anggota akan tersimpan untuk selamanya dan tidak bisa diubah.</p>
        <div class="grid grid-cols-2 gap-3">
            <button type="button"
                    class="px-6 py-2 bg-white text-[#171E29] rounded-lg border font-semibold hover:bg-gray-300 transition hover:cursor-pointer text-sm">
                Batalkan
            </button>
            <button type="button" 
                    class="px-6 py-2 bg-[#38C55C] text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer text-sm">
                Konfirmasi
            </button>
        </div>
    </div>
</div>

<!-- **************************************************
INI POP UP SUCCESS
******************************************************* -->
<div id="successModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 w-full max-w-sm mx-4 text-center border border-[#8E97A6]">
        <div class="mb-4">
            <i class="fas fa-check-circle text-green-500 text-5xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Request Booking Berhasil</h3>
        <p class="text-sm text-gray-600 mb-6">Tunggu approval dari admin</p>
        <button
                class="w-full px-6 py-2 bg-[#38C55C] text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer">
            OK
        </button>
    </div>
</div>


<script>const BASEURL = "<?= BASEURL ?>";</script>
<script src="/js/bookingRoom.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    
   //Fungsi Debounce (Mencegah spam request)
    function debounce(func, delay) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // 2. Fungsi Utama Fetch Data
    // Kita pisahkan logikanya agar bersih
    const fetchUserData = debounce(async (inputElement) => {
        const nim = inputElement.value.trim();
        // Cari field nama pasangannya (sibling dalam satu grid)
        const row = inputElement.closest('.grid'); 
        const namaField = row.querySelector(".nama-input");
        const allNimInputs = document.querySelectorAll('[name="nim[]"]');

        let isDuplicate = false;

        allNimInputs.forEach((input) => {
            // Jangan cek input dengan dirinya sendiri
            if (input === inputElement) return;
            
            // Cek jika value-nya sama (dan tidak kosong)
            // Pastikan HTML Penanggung Jawab sudah ada attribute value="..."
            if (input.value.trim() !== "" && input.value.trim() === nim) {
                isDuplicate = true;
            }
        });

        if (isDuplicate) {
            namaField.value = "";
            namaField.placeholder = "NIM sudah terdaftar di form ini!";
            // Tambahkan alert visual kecil atau border merah agar user sadar
            namaField.classList.add('text-red-500')
            inputElement.classList.add('border-red-500', 'text-red-500');
            return; // Hentikan proses, jangan fetch ke database
        } else {
            // Hapus indikator error jika sudah benar
            inputElement.classList.remove('border-red-500', 'text-red-500');
            namaField.classList.remove('text-red-500')
        }

        // Reset jika kosong atau terlalu pendek
        if (nim.length < 5) {
            namaField.value = "";
            return;
        }

        // Tanda sedang loading (Opsional, UX lebih baik)
        namaField.placeholder = "Mencari...";

        try {
            const response = await fetch(`${BASEURL}/Booking/cariAnggota`, { 
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ nim: nim })
            });

            if (!response.ok) throw new Error("Network response was not ok");

            const data = await response.json();
            console.log("Dapet data:", data);

            if (data && data.nama) {
                namaField.value = data.nama;
            } else {
                namaField.value = ""; // Kosongkan jika tidak ketemu
                namaField.placeholder = "Data tidak ditemukan";
            }

        } catch (err) {
            console.error("Fetch error:", err);
            namaField.value = "";
            namaField.placeholder = "Gagal memuat data";
        }
    }, 500); // Delay 500ms

    // 3. EVENT DELEGATION (Kunci agar input dinamis bisa jalan)
    // Kita pasang listener di container pembungkus utama, bukan di masing-masing input
    const membersContainer = document.getElementById('membersContainer');

    if (membersContainer) {
        membersContainer.addEventListener('input', function(e) {
            // Cek apakah yang diketik adalah elemen dengan class 'nim-input'
            if (e.target && e.target.classList.contains('nim-input')) {
                fetchUserData(e.target);
            }
        });
    }
});

    // Add member (WAJIB JS)
    const addButton = document.getElementById('addMember');
    addButton.addEventListener('click', addMember)
    let memberCount = <?= $i + 1?>;
    function addMember() {

        memberCount++;
        const container = document.getElementById('membersContainer');
        const newCard = document.createElement('div');
        newCard.className = 'member-card p-4 bg-gray-50 rounded-xl border border-gray-300';
        newCard.innerHTML = `
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <span class="inline-flex items-center justify-center w-7 h-7 bg-gray-600 text-white rounded-full text-xs font-bold">${memberCount}</span>
                    <span class="ml-2 font-medium text-sm text-gray-800">Anggota</span>
                </div>
                <button type="button" onclick="removeMember(this)" class="text-red-600 hover:text-red-800 transition">
                    <svg class="w-5 h-5 text-red-600 hover:text-red-800 transition" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <input type="text" maxlength="10" placeholder="NIM/NIP Anggota" name="nim[]" class="nim-input w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                <input type="text" placeholder="Nama Lengkap Anggota" name="nama[]" readonly class="nama-input w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
            </div>
        `;
        container.appendChild(newCard);
        if (memberCount == <?= $detailRuangan['max_capacity'] ?>) {
        addButton.classList.add('hidden'); // sembunyikan tombol
        return; // hentikan eksekusi fungsi 
        }
    }

    // Remove member (WAJIB JS)
    function removeMember(button) {
        const cards = document.querySelectorAll('.member-card');
        if (cards.length <= 2) {
            // Mengganti showError() dengan alert sederhana
            alert('Minimal harus ada 2 orang (perwakilan + 1 anggota).');
            return;
        }
        button.closest('.member-card').remove();
        document.querySelectorAll('.member-card').forEach((card, i) => {
            card.querySelector('span.rounded-full').textContent = i + 1;
        });
        memberCount = document.querySelectorAll('.member-card').length;
        addButton.classList.remove('hidden')
    }
    </script>

            