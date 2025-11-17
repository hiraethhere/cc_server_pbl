    <main class="flex-1 p-8 overflow-y-auto bg-[#F3F5FA]">

        <nav class="text-sm text-dark-overlay/60 w-full mb-6">
            <a href="/Admin/Ruangan" class="text-gray-900 hover:text-[#1E68FB]">Data Peminjaman Ruangan</a>
            <span class="mx-2">></span>
            <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Hari Ini</span>
        </nav>
        <h2 class="text-xl font-bold text-[rgba(23,30,41,0.70)] mb-6">Data Peminjaman Ruangan</h2>

        <div class="flex justify-between mb-6 space-x-4 items-center">
            <div>
                <button 
                        class="px-4 py-2 mr-5 bg-[rgba(30,104,251,0.90)] text-white rounded-full font-medium text-sm hover:bg-blue-600 transition duration-200 hover:cursor-pointer">
                    Hari Ini
                </button>
                <button 
                        class="px-4 py-2 mr-5 bg-white text-[#171E29] rounded-full font-medium text-sm hover:bg-gray-300 transition duration-200 hover:cursor-pointer">
                    On Process
                </button>
                <button 
                        class="px-4 py-2 mr-5 bg-white text-[#171E29] rounded-full font-medium text-sm hover:bg-gray-300 transition duration-200 hover:cursor-pointer">
                    Request
                </button>
                <button 
                        class="px-4 py-2 mr-5 bg-white text-[#171E29] rounded-full font-medium text-sm hover:bg-gray-300 transition duration-200 hover:cursor-pointer">
                    History
                </button>
            </div>

            <div class="relative max-w-sm w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" id="search-input" placeholder="Cari Anggota"
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


            <div class="flex justify-center order-1 md:order-2 items-center">
                <a href="/Admin/dataRuangan" class="text-white bg-[#1E68FB] font-medium flex items-center text-sm transition px-4 py-2 rounded-full hover:from-blue-600 hover:to-blue-700">
                    Lihat Data Ruangan
                    <div class="text-white"> 
                        <svg class="w-5 h-5 fill-current ml-2" 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="2" 
                            stroke-linecap="round" 
                            stroke-linejoin="round">
                            
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </a>
            </div>
        </div>


        <div class="overflow-x-auto rounded-t-xl border border-[#8E97A6]">
            <table class="w-full text-sm">
                <thead class="bg-[rgba(30,104,251,0.10)]">
                    <tr>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70 rounded-tl-xl">No.</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Tanggal</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Ruangan</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Jam</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Penanggung Jawab</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70">Jumlah Orang</th>
                        <th class="px-4 py-3 text-center font-semibold text-dark-overlay/70 rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    <!-- ========== TAB SEMUA – DATA HTML ========== -->
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">5 November 2025</td>
                        <td class="px-4 py-3 text-center text-sm">Ruang Lentera Edukasi</td>
                        <td class="px-4 py-3 text-center text-sm">12:00 - 14:00</td>
                        <td class="px-4 py-3 text-center text-sm">Muhammad Reza Arifin</td>
                        <td class="px-4 py-3 text-center text-sm">6 Orang</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#"
                            class="inline-flex items-center justify-center px-5 py-2 rounded-sm text-xs font-semibold
                                    bg-[linear-gradient(0deg,rgba(30,104,251,0.03)_0%,rgba(30,104,251,0.03)_100%),#FAFAFA]
                                    border border-[rgba(23,30,41,0.50)] shadow-md hover:bg-gray-100 transition">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">5 November 2025</td>
                        <td class="px-4 py-3 text-center text-sm">Ruang Lentera Edukasi</td>
                        <td class="px-4 py-3 text-center text-sm">12:00 - 14:00</td>
                        <td class="px-4 py-3 text-center text-sm">Muhammad Reza Arifin</td>
                        <td class="px-4 py-3 text-center text-sm">6 Orang</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#"
                            class="inline-flex items-center justify-center px-5 py-2 rounded-sm text-xs font-semibold
                                    bg-[linear-gradient(0deg,rgba(30,104,251,0.03)_0%,rgba(30,104,251,0.03)_100%),#FAFAFA]
                                    border border-[rgba(23,30,41,0.50)] shadow-md hover:bg-gray-100 transition">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">5 November 2025</td>
                        <td class="px-4 py-3 text-center text-sm">Ruang Lentera Edukasi</td>
                        <td class="px-4 py-3 text-center text-sm">12:00 - 14:00</td>
                        <td class="px-4 py-3 text-center text-sm">Muhammad Reza Arifin</td>
                        <td class="px-4 py-3 text-center text-sm">6 Orang</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#"
                            class="inline-flex items-center justify-center px-5 py-2 rounded-sm text-xs font-semibold
                                    bg-[linear-gradient(0deg,rgba(30,104,251,0.03)_0%,rgba(30,104,251,0.03)_100%),#FAFAFA]
                                    border border-[rgba(23,30,41,0.50)] shadow-md hover:bg-gray-100 transition">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">5 November 2025</td>
                        <td class="px-4 py-3 text-center text-sm">Ruang Lentera Edukasi</td>
                        <td class="px-4 py-3 text-center text-sm">12:00 - 14:00</td>
                        <td class="px-4 py-3 text-center text-sm">Muhammad Reza Arifin</td>
                        <td class="px-4 py-3 text-center text-sm">6 Orang</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#"
                            class="inline-flex items-center justify-center px-5 py-2 rounded-sm text-xs font-semibold
                                    bg-[linear-gradient(0deg,rgba(30,104,251,0.03)_0%,rgba(30,104,251,0.03)_100%),#FAFAFA]
                                    border border-[rgba(23,30,41,0.50)] shadow-md hover:bg-gray-100 transition">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-4 py-3 text-center text-sm">1</td>
                        <td class="px-4 py-3 text-center text-sm">5 November 2025</td>
                        <td class="px-4 py-3 text-center text-sm">Ruang Lentera Edukasi</td>
                        <td class="px-4 py-3 text-center text-sm">12:00 - 14:00</td>
                        <td class="px-4 py-3 text-center text-sm">Muhammad Reza Arifin</td>
                        <td class="px-4 py-3 text-center text-sm">6 Orang</td>
                        <td class="px-4 py-3 text-center">
                            <a href="#"
                            class="inline-flex items-center justify-center px-5 py-2 rounded-sm text-xs font-semibold
                                    bg-[linear-gradient(0deg,rgba(30,104,251,0.03)_0%,rgba(30,104,251,0.03)_100%),#FAFAFA]
                                    border border-[rgba(23,30,41,0.50)] shadow-md hover:bg-gray-100 transition">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="flex justify-center items-center gap-2 py-6 text-sm text-gray-600">
            <a href="?tab=<?= $tab ?>&page=1" class="px-3 py-1 border rounded hover:bg-gray-100">&lt;</a>
            <a href="?tab=<?= $tab ?>&page=1" class="px-3 py-1 bg-blue-100 text-blue-600 rounded font-medium">1</a>
            <a href="?tab=<?= $tab ?>&page=2" class="px-3 py-1 border rounded hover:bg-gray-100">2</a>
            <a href="?tab=<?= $tab ?>&page=3" class="px-3 py-1 border rounded hover:bg-gray-100">3</a>
            <span>...</span>
            <a href="?tab=<?= $tab ?>&page=8" class="px-3 py-1 border rounded hover:bg-gray-100">8</a>
            <a href="?tab=<?= $tab ?>&page=8" class="px-3 py-1 border rounded hover:bg-gray-100">&gt;</a>
            <span class="ml-4">Go to</span>
            <input type="text" class="w-12 mx-1 text-center border rounded" value="1">
            <span>Page</span>
        </div>
    </main>

</body>
</html>