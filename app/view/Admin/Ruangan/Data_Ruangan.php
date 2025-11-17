    <main class="flex-1 p-8 overflow-y-auto bg-[#F3F5FA]">

        <nav class="text-sm text-dark-overlay/60 w-full mb-6">
            <a href="/Admin/Ruangan" class="text-gray-900 hover:text-[#1E68FB]">Data Peminjaman Ruangan</a>
            <span class="mx-2">></span>
            <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Data Ruangan</span>
        </nav>

        <div class="flex justify-between mb-6 space-x-4 items-center">
            <h2 class="text-xl font-bold text-[rgba(23,30,41,0.70)] mb-6">Data Ruangan</h2>

            <div class="flex items-center justify-end">
                <div class="relative max-w-sm w-full">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" id="search-input" placeholder="Lihat Data Ruangan"
                        class="block w-full pl-10 pr-10 py-2.5 border border-[rgba(23,30,41,0.50)] rounded-lg 
                                bg-white text-gray-900 placeholder-gray-500 
                                focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                transition duration-150 ease-in-out text-sm">
                    <button type="button" id="clear-search" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>


                <div class="flex justify-end order-1 md:order-2 items-center w-full">
                    <a href="/#" class="text-white bg-[#1E68FB] font-medium flex items-center text-sm transition px-4 py-2 rounded-full hover:from-blue-600 hover:to-blue-700">
                        Tambah Ruangan
                        <div class="text-white"> 
                            <img src="/icon/plus-circle.svg" alt="Tambah Ruangan" class="ml-2 w-5 h-5">
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="overflow-x-auto rounded-t-xl border border-[#8E97A6]">
            <table class="w-full text-sm">
                <thead class="bg-[rgba(30,104,251,0.10)]">
                    <tr>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70 rounded-tl-xl">No.</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Ruangan</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Kapasitas</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Status</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70 rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">
                            <div class="flex items-center justify-center space-x-3">
                                <img src="/img/DefaultRuangan.jpg" alt="Ruang hura hura"
                                    class="w-10 h-10 object-cover rounded-lg shadow-sm">
                                <span class="text-sm text-gray-900">Ruangan Lentera Edukasi</span>
                            </div>
                        </td>

                        <td class="px-4 py-3 text-center text-sm">4-8 Orang</td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">
                            <div
                                    class="flex bg-[#38C55C] items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                <span>Tersedia</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center text-sm">
                            <div class="flex justify-center items-center space-x-3">
                                <!-- Tombol Edit -->
                                <a href="/Ruangan/Edit/<?= $row['id'] ?>" 
                                class="flex items-center justify-center w-8 h-8 rounded-sm bg-[#F3F5FA] hover:bg-blue-100 transition 
                                        hover:text-blue-800 group"
                                title="Edit Ruangan">
                                    <img src="/icon/pencil.svg" alt="Edit" class="w-4 h-4">
                                </a>

                                <!-- Tombol Hapus -->
                                <button onclick="hapusRuangan(<?= $row['id'] ?>)"
                                        class="flex items-center justify-center w-8 h-8 rounded-sm bg-[#C90B0B] hover:bg-red-100 transition 
                                            hover:text-red-800 group"
                                        title="Hapus Ruangan">
                                    <img src="/icon/trash.svg" alt="Hapus" class="w-4 h-4">
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">
                            <div class="flex items-center justify-center space-x-3">
                                <img src="/img/DefaultRuangan.jpg" alt="Ruang hura hura"
                                    class="w-10 h-10 object-cover rounded-lg shadow-sm">
                                <span class="text-sm text-gray-900">Ruangan Lentera Edukasi</span>
                            </div>
                        </td>

                        <td class="px-4 py-3 text-center text-sm">4-8 Orang</td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">
                            <div
                                    class="flex bg-[#38C55C] items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                <span>Tersedia</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center text-sm">
                            <div class="flex justify-center items-center space-x-3">
                                <!-- Tombol Edit -->
                                <a href="/Ruangan/Edit/<?= $row['id'] ?>" 
                                class="flex items-center justify-center w-8 h-8 rounded-sm bg-[#F3F5FA] hover:bg-blue-100 transition 
                                        hover:text-blue-800 group"
                                title="Edit Ruangan">
                                    <img src="/icon/pencil.svg" alt="Edit" class="w-4 h-4">
                                </a>

                                <!-- Tombol Hapus -->
                                <button onclick="hapusRuangan(<?= $row['id'] ?>)"
                                        class="flex items-center justify-center w-8 h-8 rounded-sm bg-[#C90B0B] hover:bg-red-100 transition 
                                            hover:text-red-800 group"
                                        title="Hapus Ruangan">
                                    <img src="/icon/trash.svg" alt="Hapus" class="w-4 h-4">
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>