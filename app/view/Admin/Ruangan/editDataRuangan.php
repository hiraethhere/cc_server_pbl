<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Ruangan" class="text-blue-overlay hover:text-blue-700">Data Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <a href="#" class="text-dark-overlay6 hover:text-blue-overlay">Edit Ruangan</a>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Edit Data Ruangan</h2>

    <div class="grid lg:grid-cols-1 xl:grid-cols-2 gap-10 mt-6">

        <!-- KOLOM KIRI – Foto + Form Utama -->
        <div class="space-y-8 bg-background2 shadow-xl rounded-xl">

            <!-- Foto + Rating + Upload -->
            <div class="relative rounded-t-2xl overflow-hidden mb-0">
                <img src="/img/DefaultRuangan.jpg"
                    alt="Ruangan" class="w-full h-72 object-cover">

        
                <!-- Overlay Rating (mirip gambar) -->
                <div class="absolute top-6 left-6 flex items-center gap-3 px-5 py-1
                                bg-dark-overlay2
                                rounded-lg
                                animate-in fade-in slide-in-from-bottom duration-500">
                    
                    <!-- Bintang -->
                    <div class="flex items-center gap-1">
                        <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                        <svg class="w-7 h-7 text-background2 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                        </svg>
                    </div>

                    <!-- Teks rating -->
                    <div class="text-background2">
                        <span class="text-xl font-bold">4/5</span>
                        <span class="text-sm font-medium text-background2 ml-2">(67 Respon)</span>
                    </div>
                </div>
        

                <!-- Upload Foto Baru -->
                <div class="flex justify-between items-center absolute bottom-0 left-0 right-0 p-6 bg-linear-to-t from-black/70 to-transparent">
                    <label class="flex items-center gap-3 text-white cursor-pointer transition">
                        <span class="flex items-center font-medium py-2 px-3 rounded-full text-xs bg-blue-overlay hover:bg-blue-overlay7">Ganti Foto
                            <div>
                                <?= icon('uploadFoto', 'h-5 w-5 ml-2') ?>
                            </div>
                        </span>
                        <span type="file" accept=".png,.jpg,.jpeg" class="hidden">
                    </label>
                    <p class="font-medium py-2 px-3 rounded-full text-xs bg-blue-overlay text-white">.png, .jpg, .jpeg</p>
                </div>
            </div>

            <!-- Form Input -->
            <div class="space-y-4 p-8 rounded-xl">

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Nama Ruangan</label>
                    <input type="text" value="Ruangan Lentera Edukasi"
                            class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Lokasi</label>
                    <input type="text" value="Lantai 2"
                            class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay">
                </div>

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Status</label>
                    <select class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay">
                        <option>Tersedia</option>
                        <option>Tidak Tersedia</option>
                        <option>Dalam Perbaikan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Kapasitas Ruangan</label>
                    <div class="flex justify-between items-center gap-4">
                        <input type="number" value="4" min="1" class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg text-center">
                            <span class="text-dark-overlay7">Sampai</span>
                        <input type="number" value="8" min="1" class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN – Deskripsi + Tombol Aksi -->
        <div class="space-y-4 bg-background2 shadow-xl rounded-xl p-8 self-start">

            <div>
                <label class="block text-sm font-medium text-dark-overlay7 mb-2">
                Deskripsi Lengkap
                </label>
                <textarea rows="6" placeholder="Tuliskan deskripsi lengkap ruangan..."
                        class="w-full px-5 py-4 border border-dark-overlay4 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay"><?= htmlspecialchars($deskripsi_lengkap ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-dark-overlay7 mb-2">
                Deskripsi Singkat
                </label>
                <textarea rows="3" placeholder="Tuliskan deskripsi singkat yang muncul di kartu ruangan..."
                    class="w-full px-5 py-4 border border-dark-overlay4 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay">Temukan, pinjam, dan nikmati bacaan favoritmu dengan mudah.</textarea>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-8 pt-2">
                <button onclick="konfirmasiHapus()" class="flex-1 bg-red1 hover:bg-red-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
                Hapus Ruangan
                </button>
                <button onclick="konfirmasiEdit()" class="flex-1 bg-green1 hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
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
            confirmText: 'Edit',
            confirmClass: 'w-full px-6 py-2 bg-green1 text-white rounded-lg font-semibold hover:bg-green-700 transition hover:cursor-pointer',
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
            confirmText: 'Hapus',
            confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-red-700 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>