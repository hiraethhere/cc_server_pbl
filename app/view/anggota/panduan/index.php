<!-- Main Content -->
<main class="container mx-auto lg:px-11 md:px-9 px-6 py-12 min-h-screen max-w-4xl">
    <h1 class="text-2xl md:text-4xl font-semibold text-dark-overlay mb-10 text-center">
        Panduan Menggunakan ruanginPNJ
    </h1>

    <!-- Accordion Container -->
    <div class="space-y-4">
        
        <!-- FAQ Item 1 -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleAccordion(1)" 
                    class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <?= icon('book', 'w-6 h-6 text-[#1E68FB]') ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Bagaimana cara meminjam ruangan?</h3>
                </div>
                <div id="icon-1" class="flex-shrink-0 transition-transform duration-300">
                    <?= icon('arrowDown', 'w-6 h-6 text-gray-600') ?>
                </div>
            </button>
            <div id="content-1" class="accordion-content hidden">
                <div class="px-5 pb-5 pt-2">
                    <div class="pl-10 text-gray-700 space-y-2">
                        <ol class="list-decimal list-inside space-y-2">
                            <li>Pergi ke page ruangan</li>
                            <li>Pilih ruangan yang ingin dipinjam</li>
                            <li>Klik tombol "Pinjam Ruangan"</li>
                            <li>Isi form peminjaman dengan lengkap</li>
                            <li>Submit dan tunggu konfirmasi dari admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleAccordion(2)" 
                    class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <?= icon('book', 'w-6 h-6 text-[#1E68FB]') ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Apa itu suspend?</h3>
                </div>
                <div id="icon-2" class="flex-shrink-0 transition-transform duration-300">
                    <?= icon('arrowDown', 'w-6 h-6 text-gray-600') ?>
                </div>
            </button>
            <div id="content-2" class="accordion-content hidden">
                <div class="px-5 pb-5 pt-2">
                    <div class="pl-10 text-gray-700">
                        <p>
                            Suspend adalah status ketika akun Anda dibekukan sementara. Hal ini terjadi jika Anda melakukan 
                            cancel peminjaman sebanyak 3 kali, atau jika sudah mencapai batas tersebut, maka akun Anda akan 
                            di-suspend dan tidak bisa login. Anda harus menemui admin perpustakaan untuk mengaktifkan 
                            kembali akun Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleAccordion(3)" 
                    class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <?= icon('book', 'w-6 h-6 text-[#1E68FB]') ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Jadwal perpustakaan</h3>
                </div>
                <div id="icon-3" class="flex-shrink-0 transition-transform duration-300">
                    <?= icon('arrowDown', 'w-6 h-6 text-gray-600') ?>
                </div>
            </button>
            <div id="content-3" class="accordion-content hidden">
                <div class="px-5 pb-5 pt-2">
                    <div class="pl-10 text-gray-700">
                        <div class="space-y-3">
                            <div>
                                <p class="font-semibold text-gray-800">Senin - Jumat</p>
                                <p>08:00 - 16:00 WIB</p>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Sabtu</p>
                                <p>08:00 - 12:00 WIB</p>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Minggu</p>
                                <p class="text-red-600">Tutup</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Item 4 -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleAccordion(4)" 
                    class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <?= icon('book', 'w-6 h-6 text-[#1E68FB]') ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Berapa lama durasi peminjaman?</h3>
                </div>
                <div id="icon-4" class="flex-shrink-0 transition-transform duration-300">
                    <?= icon('arrowDown', 'w-6 h-6 text-gray-600') ?>
                </div>
            </button>
            <div id="content-4" class="accordion-content hidden">
                <div class="px-5 pb-5 pt-2">
                    <div class="pl-10 text-gray-700">
                        <p>
                            Durasi peminjaman ruangan bervariasi tergantung kebutuhan dan ketersediaan ruangan:
                        </p>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Minimal peminjaman: 1 jam</li>
                            <li>Maksimal peminjaman: 4 jam per hari</li>
                            <li>Dapat memesan hingga 7 hari ke depan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Item 5 -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleAccordion(5)" 
                    class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <?= icon('book', 'w-6 h-6 text-[#1E68FB]') ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Bagaimana cara membatalkan peminjaman?</h3>
                </div>
                <div id="icon-5" class="flex-shrink-0 transition-transform duration-300">
                    <?= icon('arrowDown', 'w-6 h-6 text-gray-600') ?>
                </div>
            </button>
            <div id="content-5" class="accordion-content hidden">
                <div class="px-5 pb-5 pt-2">
                    <div class="pl-10 text-gray-700">
                        <ol class="list-decimal list-inside space-y-2">
                            <li>Buka menu "Booking Anda"</li>
                            <li>Pilih booking yang ingin dibatalkan</li>
                            <li>Klik tombol "Batalkan"</li>
                            <li>Konfirmasi pembatalan</li>
                        </ol>
                        <div class="mt-3 p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                            <p class="text-sm text-yellow-800">
                                <strong>Perhatian:</strong> Pembatalan berlebihan (lebih dari 3 kali) dapat mengakibatkan akun Anda di-suspend.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Item 6 -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <button onclick="toggleAccordion(6)" 
                    class="w-full flex items-center justify-between p-5 text-left hover:bg-gray-50 transition">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <?= icon('book', 'w-6 h-6 text-[#1E68FB]') ?>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Apa saja fasilitas yang tersedia?</h3>
                </div>
                <div id="icon-6" class="flex-shrink-0 transition-transform duration-300">
                    <?= icon('arrowDown', 'w-6 h-6 text-gray-600') ?>
                </div>
            </button>
            <div id="content-6" class="accordion-content hidden">
                <div class="px-5 pb-5 pt-2">
                    <div class="pl-10 text-gray-700">
                        <p class="mb-3">Setiap ruangan dilengkapi dengan fasilitas berikut:</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-center gap-2">
                                <?= icon('check', 'w-5 h-5 text-green-600') ?>
                                <span>Proyektor dan layar</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <?= icon('check', 'w-5 h-5 text-green-600') ?>
                                <span>Whiteboard</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <?= icon('check', 'w-5 h-5 text-green-600') ?>
                                <span>AC</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <?= icon('check', 'w-5 h-5 text-green-600') ?>
                                <span>WiFi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <?= icon('check', 'w-5 h-5 text-green-600') ?>
                                <span>Meja dan kursi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <?= icon('check', 'w-5 h-5 text-green-600') ?>
                                <span>Stopkontak</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Contact Section -->
    <div class="mt-12 p-6 bg-blue-50 rounded-lg border border-blue-200">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <?= icon('info', 'w-8 h-8 text-[#1E68FB]') ?>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Butuh Bantuan Lebih Lanjut?</h3>
                <p class="text-gray-700 mb-3">
                    Jika Anda memiliki pertanyaan lain yang belum terjawab, silakan hubungi admin perpustakaan.
                </p>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-sm">
                        <?= icon('email', 'w-4 h-4 text-gray-600') ?>
                        <span class="text-gray-700">perpustakaan@pnj.ac.id</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm">
                        <?= icon('phone', 'w-4 h-4 text-gray-600') ?>
                        <span class="text-gray-700">(021) 1234-5678</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
// Fungsi untuk toggle accordion
function toggleAccordion(id) {
    const content = document.getElementById(`content-${id}`);
    const icon = document.getElementById(`icon-${id}`);
    
    // Toggle visibility
    if (content.classList.contains('hidden')) {
        // Tutup semua accordion lain
        document.querySelectorAll('.accordion-content').forEach(item => {
            item.classList.add('hidden');
        });
        
        // Reset semua icon
        document.querySelectorAll('[id^="icon-"]').forEach(item => {
            item.classList.remove('rotate-180');
        });
        
        // Buka accordion yang diklik
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        // Tutup accordion yang diklik
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

// Optional: Auto-scroll ke accordion yang dibuka
document.querySelectorAll('[onclick^="toggleAccordion"]').forEach(button => {
    button.addEventListener('click', function() {
        setTimeout(() => {
            this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 300);
    });
});
</script>

<style>
/* Smooth transition untuk accordion */
.accordion-content {
    transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
}

/* Smooth rotation untuk icon */
[id^="icon-"] {
    transition: transform 0.3s ease;
}

.rotate-180 {
    transform: rotate(180deg);
}
</style>