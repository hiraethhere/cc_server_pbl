<!-- Main Content -->
<main class="container mx-auto px-6 w-97/100 sm:px-6 py-6 sm:py-8 flex-1">
    <h2 class="text-2xl sm:text-3xl text-center font-bold text-[#171E29] mb-10 pt-5 left-align">Riwayat Peminjaman</h2>

    <!-- Time Filters -->
    <div class="flex md:flex-row flex-col md:justify-between mb-6">
        <div class="flex flex-wrap gap-3 left-align order-2 md:order-1">
            <?php 
                // Anggap Anda sudah mendefinisikan array $jenis_anggota_options, dsb.
                // Di sini Anda memuat komponen:
                $filter_id = 'Ruangan'; 
                $label = 'Ruangan'; 
                $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Rapat Kecil' => 'Ruang Rapat Kecil']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../../template/filterDropDown.php';
            ?>

            <?php 
                // Anggap Anda sudah mendefinisikan array $jenis_anggota_options, dsb.
                // Di sini Anda memuat komponen:
                $filter_id = 'Status'; 
                $label = 'Status'; 
                $options = ['Selesai' => 'Selesai', 'Ditolak' => 'Ditolak']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../../template/filterDropDown.php';
            ?>

            <button type="button" 
                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition border border-gray-300 bg-white"
                    onclick="document.getElementById('jenis_anggota').value=''; document.getElementById('jurusan').value=''; document.getElementById('status').value=''; document.getElementById('filterForm').submit();">
                <img src="/icon/crossRed.svg" alt="clear" class="w-4 h-4">
            </button>
        </div>

        <!-- Search Bar -->
        <div class="order-1 md:order-2">
            <div class="relative max-w-md ml-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <img src="/icon/search.svg" alt="search" class="w-5 h-5">
                </div>
                <input type="text" id="search-input" placeholder="Cari..."
                    class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg 
                            bg-white text-gray-900 placeholder-gray-400 text-sm
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                            transition duration-150">
                <button type="button" id="clear-search" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                    <img src="/icon/silang.svg" alt="clear" classs="w-4 h-4">
                </button>
            </div>
        </div>
    </div>
    
    <!-- Table Content -->
        <div class="">
            <!-- Desktop Table -->
            <div id="desktop-table" class="md:block hidden overflow-x-auto bg-white rounded-t-xl">
                <table class="w-full text-sm border-separate border-spacing-0 border border-[#8E97A6] rounded-t-xl">
                    <thead class="bg-[rgba(30,104,251,0.10)] rounded-t-xl">
                        <tr>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700 rounded-tl-xl">No.</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Ruangan</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Jam</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Jumlah Orang</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700">Status</th>
                            <th class="px-4 py-3 text-center font-semibold text-gray-700 rounded-tr-xl">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="" class="divide-y divide-gray-500">

                        <!-- **************************************************
                        INI Data pERTAMA
                        ******************************************************* -->
                        <tr class="hover:bg-gray-50 transition border-b border-gray-300">
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">1</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">8 November 2025</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">Ruang Lentera Edukasi</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">09:00 - 12:00</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">4 Orang</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">
                                <div
                                        class="flex bg-[#38C55C] items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                    <span>Selesai</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center justify-center flex border-b border-[#8E97A6]">
                                <button
                                        class="flex bg-[#1E68FB] items-center text-white hover:bg-blue-600 hover:cursor-pointer px-5 py-2 rounded-sm text-xs font-medium transition shadow-md transform hover:scale-105">
                                    <span>Feedback</span>
                                    
                                    <div class="bg-white p-1 rounded-xs ml-3"> 
                                        <svg class="w-3 h-3 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                </button>
                            </td>
                        </tr>

                        <!-- **************************************************
                        INI Data KEDUA
                        ******************************************************* -->
                        <tr class="hover:bg-gray-50 transition border-b border-gray-300">
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">1</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">8 November 2025</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">Ruang Lentera Edukasi</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">09:00 - 12:00</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">4 Orang</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">
                                <div
                                        class="flex bg-[#C90B0B] items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                    <span>Ditolak</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center justify-center flex border-b border-[#8E97A6]">
                                <button
                                        class="flex bg-[#1E68FB] items-center text-white hover:bg-blue-600 hover:cursor-pointer px-5 py-2 rounded-sm text-xs font-medium transition shadow-md transform hover:scale-105">
                                    <span>Feedback</span>
                                    
                                    <div class="bg-white p-1 rounded-xs ml-3"> 
                                        <svg class="w-3 h-3 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                </button>
                            </td>
                        </tr>

                        <!-- **************************************************
                        INI Data KETIGA
                        ******************************************************* -->                        
                        <tr class="hover:bg-gray-50 transition border-b border-gray-300">
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">1</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">8 November 2025</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">Ruang Lentera Edukasi</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">09:00 - 12:00</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">4 Orang</td>
                            <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">
                                <div
                                        class="flex bg-[#38C55C] items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                    <span>Selesai</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center justify-center flex border-b border-[#8E97A6]">
                                <button
                                        class="flex bg-[#8D9198] items-center text-dark-overlay/70 px-5 py-2 rounded-sm text-xs font-medium shadow-md">
                                    <span>Feedback</span>
                                    
                                    <div class="bg-black/70 p-1 rounded-xs ml-3"> 
                                        <svg class="w-3 h-3 text-[#8D9198]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>




            <!-- **************************************************
            INI TAMPILAN MOBILE
            ******************************************************* --> 
            <!-- Mobile Cards -->
            <div id="mobile-cards" class="block md:hidden space-y-4 max-w-5/6 flex flex-col items-center mx-auto">
                <!-- Row 1 -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-5 hover:shadow-md transition-shadow">                    <div class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm border-b border-gray-200 pb-3 mb-3">
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Ruangan</div>
                        <div class="font-semibold text-gray-900">Ruang Lentera Edukasi</div>
                        
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Tanggal</div>
                        <div class="font-semibold text-gray-900">8 November 2025</div>
                        
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Jam</div>
                        <div class="font-semibold text-gray-900">09:00 - 12:00</div>
                        
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Orang</div>
                        <div class="font-semibold text-gray-900">4 Orang</div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button class="flex items-center justify-center w-full bg-[#1E68FB] text-white hover:bg-blue-600 py-2 rounded-sm text-xs font-medium transition shadow-md">
                            <span>Feedback</span>
                            <div class="bg-white rounded-xs ml-3">
                                <svg class="w-3 h-3 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-5 hover:shadow-md transition-shadow">                    <div class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm border-b border-gray-200 pb-3 mb-3">
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Ruangan</div>
                        <div class="font-semibold text-gray-900">Ruang Lentera Edukasi</div>
                        
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Tanggal</div>
                        <div class="font-semibold text-gray-900">8 November 2025</div>
                        
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Jam</div>
                        <div class="font-semibold text-gray-900">09:00 - 12:00</div>
                        
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Orang</div>
                        <div class="font-semibold text-gray-900">4 Orang</div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button class="flex items-center justify-center w-full bg-[#1E68FB] text-white hover:bg-blue-600 py-2 rounded-sm text-xs font-medium transition shadow-md">
                            <span>Feedback</span>
                            <div class="bg-white rounded-xs ml-3">
                                <svg class="w-3 h-3 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-5 hover:shadow-md transition-shadow">                    <div class="grid grid-cols-2 gap-x-4 gap-y-3 text-sm border-b border-gray-200 pb-3 mb-3">
                    <div class="text-gray-500 text-xs uppercase tracking-wider">Ruangan</div>
                    <div class="font-semibold text-gray-900">Ruang Lentera Edukasi</div>
                    
                    <div class="text-gray-500 text-xs uppercase tracking-wider">Tanggal</div>
                    <div class="font-semibold text-gray-900">8 November 2025</div>
                    
                    <div class="text-gray-500 text-xs uppercase tracking-wider">Jam</div>
                    <div class="font-semibold text-gray-900">09:00 - 12:00</div>
                    
                    <div class="text-gray-500 text-xs uppercase tracking-wider">Orang</div>
                    <div class="font-semibold text-gray-900">4 Orang</div>
                </div>
                <div class="mt-4 flex justify-center">
                    <button class="flex items-center justify-center w-full bg-[#1E68FB] text-white hover:bg-blue-600 py-2 rounded-sm text-xs font-medium transition shadow-md">
                        <span>Feedback</span>
                        <div class="bg-white rounded-xs ml-3">
                            <svg class="w-3 h-3 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>


        <div class="mt-10 mb-5 flex justify-center items-center">
            <div div class="flex items-center space-x-3">
                <div class="p-2"><</div>
                <div class="p-2">1</div>
                <div class="p-2">2</div>
                <div class="p-2">3</div>
                <div class="p-2">></div>
            </div>
            <div class="flex items-center space-x-3 ml-10">
                <div>
                    Go to
                </div>
                <div>
                    <input type="text" maxlength="1" readonly class="w-7 px-1 py-1 border border-gray-300 rounded-xs focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    Page
                </div>
            </div>
        </div>
</main>

<!-- Feedback Modal -->
<div id="feedbackModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center z-50 px-4 min-w-1/3 hidden">
    <div class="bg-[#FBFCFF] rounded-2xl p-6 w-full max-w-lg shadow-2xl">
        <h3 class="text-md font-bold text-[#171E29] mb-1 text-center">Bagaimana pengalamanmu memakai ruangan kami?</h3>
        <p class="text-sm text-dark-overlay/70 mb-6 text-center">Input kamu sangat berharga dalam meningkatkan kualitas ruangan di perpustakaan kami.</p>
        
        <div class="flex justify-around gap-4 mb-6">
            <button class="hover:scale-110 transition p-1 hover:cursor-pointer">
                <div class="text-4xl w-9 h-9 flex items-center justify-center">😥</div>
                <p class="text-[10px] mt-0.5">Sedih</p>
            </button>
            <button class="hover:scale-110 transition p-1 hover:cursor-pointer">
                <div class="text-4xl w-9 h-9 flex items-center justify-center">🙁</div>
                <p class="text-[10px] mt-0.5">Kecewa</p>
            </button>
            <button class="hover:scale-110 transition p-1 hover:cursor-pointer">
                <div class="text-4xl w-9 h-9 flex items-center justify-center">😐</div>
                <p class="text-[10px] mt-0.5">Biasa aja</p>
            </button>
            <button class="hover:scale-110 transition p-1 hover:cursor-pointer">
                <div class="text-4xl w-9 h-9 flex items-center justify-center">😄</div>
                <p class="text-[10px] mt-0.5">Senang</p>
            </button>
            <button class="hover:scale-110 transition p-1 hover:cursor-pointer">
                <div class="text-4xl w-9 h-9 flex items-center justify-center">🤩</div>
                <p class="text-[10px] mt-0.5">Luar Biasa</p>
            </button>
        </div>

        <textarea id="feedbackComment" placeholder="Tulis komentar (opsional)" 
                  class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-5 resize-none" 
                  rows="5"></textarea>

        <div class="grid grid-cols-2 gap-3">
            <button class="px-4 py-3 bg-white text-[#171E29] rounded-lg font-medium hover:bg-gray-200 border border-gray-500 transition hover:cursor-pointer">Batalkan</button>
            <button class="px-4 py-3 bg-[#38C55C] text-white rounded-lg font-medium hover:bg-green-600 transition hover:cursor-pointer shadow-sm">Kirim</button>
        </div>
    </div>
</div>

<script src="js/filterDropDown.js" defer></script>
<script>
const searchInput = document.getElementById('search-input');
const clearBtn = document.getElementById('clear-search');

if (searchInput && clearBtn) {
    searchInput.addEventListener('input', () => {
        clearBtn.classList.toggle('hidden', searchInput.value === '');
    });

    clearBtn.addEventListener('click', () => {
        searchInput.value = '';
        searchInput.focus();
        clearBtn.classList.add('hidden');
    });
}
</script>