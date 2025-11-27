<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Ruangan" class="text-[#1E68FB] hover:text-blue-700">Data Ruangan</a>
        <span class="mx-2">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <a href="#" class="text-gray-900 hover:text-[#1E68FB]">Tambah Ruangan</a>
    </nav>

    <h2 class="text-2xl font-bold text-[#171E29]">Tambah Ruangan</h2>

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
                    
                    <p class="text-white font-semibold">INI FOTO DEFAULT</p>

                    
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
            <button class="flex-1 bg-[#FBFCFF] hover:bg-gray-200 border border-[#5C616A] text-[#5C616A] font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
            Batal
            </button>
            <button class="flex-1 bg-[#38C55C] hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
            Tambah
            </button>
        </div>

        </div>
    </div>
</main>