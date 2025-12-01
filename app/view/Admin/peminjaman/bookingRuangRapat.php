<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Peminjaman" class="text-[#1E68FB] hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <a href="/Admin/buatPeminjaman" class="text-[#1E68FB] hover:text-blue-700">Buat Peminjaman</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <span class="font-medium text-gray-900">Booking Ruang Rapat</span>
    </nav>

    <h2 class="text-2xl font-bold text-[#171E29]">Booking Ruang Rapat</h2>

    <!-- Form Card -->
    <div class="bg-[#FBFCFF] rounded-lg shadow-sm p-6 mt-6">
        <h2 class="text-2xl font-semibold text-[#171E29] mb-6">Ruang Rapat</h2>

        <form class="space-y-6">
            <!-- Email Perwakilan -->
            <div>
                <label class="block text-sm font-medium text-[#171E29] mb-2">Email Perwakilan</label>
                <input type="email" placeholder="Email perwakilan" 
                        class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Jumlah Orang & Nama Instansi -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#171E29] mb-2">Jumlah Orang</label>
                    <input type="number" placeholder="Jumlah Orang" 
                            class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#171E29] mb-2">Nama Instansi/Jurusan/Unit Kerja</label>
                    <input type="text" placeholder="Input" 
                            class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Tujuan Peminjaman -->
            <div>
                <label class="block text-sm font-medium text-[#171E29] mb-2">Tujuan Peminjaman</label>
                <textarea placeholder="Tujuan Peminjaman" rows="4"
                            class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
            </div>

            <!-- Tanggal, Jam Mulai, Jam Selesai -->
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#171E29] mb-2">Tanggal Peminjaman</label>
                    <input type="date" value="2025-11-13"
                            class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#171E29] mb-2">Jam Mulai</label>
                    <input type="time" value="14:00"
                            class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#171E29] mb-2">Jam Selesai</label>
                    <input type="time" value="16:00"
                            class="w-full px-4 py-2 border border-[#888D93] text-[#171E2990] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Upload Surat -->
            <div class="flex items-center justify-between w-full mb-2">
                <label for="buktiKubaca" 
                    class="relative flex items-center w-full pl-4 bg-white border border-gray-300 rounded-l-lg shadow-sm cursor-pointer hover:bg-gray-50 focus-within:ring-2 focus-within:ring-blue-500 transition-all duration-200">

                    <div class="flex items-center flex-1 space-x-3">
                        <img src="/icon/file.svg" alt="File" class="w-5 h-5 text-gray-400 flex-shrink-0">
                        <span id="fileNameDisplay" class="text-gray-500 text-xs truncate">
                            Belum ada file yang dipilih
                        </span>
                    </div>

                    <span class="flex items-center px-6 py-2.5 ml-auto text-sm font-medium text-white bg-[#1E68FB] hover:bg-blue-700 transition">
                        <img src="/icon/paperClip.svg" alt="Clip" class="w-4 h-4 mr-2">
                        Pilih File
                    </span>

                    <button type="button" 
                            class="clear-file absolute right-3 top-1/2 -translate-y-1/2 opacity-0 pointer-events-none transition-all duration-200 z-10">
                        <img src="/icon/silang.svg" alt="Hapus" class="w-6 h-6 hover:scale-125 transition-transform">
                    </button>

                    <input type="file" name="buktiKubaca" id="buktiKubaca" accept="image/*" class="hidden">
                </label>
            </div>

            <!-- Buttons -->
            <div class="grid grid-cols-2 gap-4 pt-4">
                <button type="button" class="px-6 py-3 border border-[#888D93] text-[#171E29] rounded-lg font-medium hover:bg-gray-200 transition hover:cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-6 py-3 bg-[#38C55C] text-white rounded-lg font-medium hover:bg-green-600 transition hover:cursor-pointer">
                    Booking
                </button>
            </div>
        </form>
    </div>

</main>
<script src="/js/uploadFile.js" defer></script>