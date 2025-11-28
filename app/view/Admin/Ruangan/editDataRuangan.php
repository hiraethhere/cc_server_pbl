<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Ruangan" class="text-[#1E68FB] hover:text-blue-700">Data Ruangan</a>
        <span class="mx-2">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <a href="#" class="text-gray-900 hover:text-[#1E68FB]">Edit Ruangan</a>
    </nav>

    <h2 class="text-2xl font-bold text-[#171E29]">Edit Data Ruangan</h2>

    <div class="grid lg:grid-cols-1 xl:grid-cols-2 gap-10 mt-6">

        <!-- KOLOM KIRI – Foto + Form Utama -->
        <div class="space-y-8 bg-[#FBFCFF] shadow-xl rounded-xl">

            <!-- Foto + Rating + Upload -->
            <div class="relative rounded-t-2xl overflow-hidden mb-0">
                <img src="/img/DefaultRuangan.jpg"
                    alt="Ruangan" class="w-full h-72 object-cover">

        
                <!-- Overlay Rating (mirip gambar) -->
                <div class="absolute top-6 left-6 flex items-center gap-3 px-5 py-1
                                bg-[#171E2950]
                                rounded-lg border border-gray-100 
                                animate-in fade-in slide-in-from-bottom duration-500">
                    
                    <!-- Bintang -->
                    <div class="flex items-center gap-1">
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                    </div>

                    <!-- Teks rating -->
                    <div class="text-white">
                        <span class="text-lg font-bold">4/5</span>
                        <span class="text-xs font-medium text-white ml-2">(67 Respon)</span>
                    </div>
                </div>
        

                <!-- Upload Foto Baru -->
                <div class="flex justify-between items-center absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/70 to-transparent">
                    <label class="flex items-center gap-3 text-white cursor-pointer hover:text-blue-300 transition">
                        <!-- <i class="fas fa-camera text-xl"></i> -->
                        <span class="font-medium py-2 px-3 rounded-full text-xs bg-[#1E68FB]">Ganti Foto</span>
                        <span type="file" accept=".png,.jpg,.jpeg" class="hidden">
                    </label>
                    <p class="font-medium py-2 px-3 rounded-full text-xs bg-[#1E68FB] text-white">.png, .jpg, .jpeg</p>
                </div>
            </div>

            <!-- Form Input -->
            <div class="space-y-4 p-8 rounded-xl">

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ruangan</label>
                    <input type="text" value="Ruangan Lentera Edukasi"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" value="Lantai 2"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <option>Tersedia</option>
                        <option>Tidak Tersedia</option>
                        <option>Dalam Perbaikan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas Ruangan</label>
                    <div class="flex justify-between items-center gap-4">
                        <input type="number" value="4" min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-center">
                            <span class="text-gray-600">Sampai</span>
                        <input type="number" value="8" min="1" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN – Deskripsi + Tombol Aksi -->
        <div class="space-y-4 bg-[#FBFCFF] shadow-xl rounded-xl p-8 self-start">

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
            Deskripsi Lengkap
            </label>
            <textarea rows="6" placeholder="Tuliskan deskripsi lengkap ruangan..."
                    class="w-full px-5 py-4 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"><?= htmlspecialchars($deskripsi_lengkap ?? '') ?></textarea>
            <!-- <p class="text-xs text-gray-500 mt-1 text-right">0/255</p> -->
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
            Deskripsi Singkat
            </label>
            <textarea rows="3" placeholder="Tuliskan deskripsi singkat yang muncul di kartu ruangan..."
                class="w-full px-5 py-4 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">Temukan, pinjam, dan nikmati bacaan favoritmu dengan mudah.</textarea>
            <!-- <p class="text-xs text-gray-500 mt-1 text-right">68/100</p> -->
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-8 pt-2">
            <button onclick="konfirmasiHapus()" class="flex-1 bg-[#C90B0B] hover:bg-red-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
            Hapus Ruangan
            </button>
            <button onclick="konfirmasiEdit()" class="flex-1 bg-[#38C55C] hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
            Edit Ruangan
            </button>
        </div>

        </div>
    </div>

</main>

<?php include __DIR__ . '/../../template/modal.php'; ?>

<script src="/js/modal.js" defer></script>
<script>
function konfirmasiEdit() {
    Modal.confirm(
        'Edit Ruangan?',
        'Data ruangan akan terganti',
        function() {
            window.location.href = '#';
        },
        {
            icon: '/icon/pencil.svg',
            confirmText: 'Lanjut',
            confirmClass: 'w-full px-6 py-2 bg-[#38C55C] text-white rounded-lg font-semibold hover:bg-red-800 transition',
            cancelText: 'Batalkan'
        }
    );
}

function konfirmasiHapus() {
    Modal.confirm(
        'Hapus Ruangan?',
        'Data ruangan akan terhapus untuk selamnaya dan tidak bisa dikembalikan',
        function() {
            window.location.href = '#';
        },
        {
            icon: '/icon/trash.svg',
            confirmText: 'Lanjut',
            confirmClass: 'w-full px-6 py-2 bg-[#C90B0B] text-white rounded-lg font-semibold hover:bg-red-800 transition',
            cancelText: 'Batalkan'
        }
    );
}
</script>