<!-- Main Content -->
<main class="container mx-auto px-4 w-97/100 lg:px-6 sm:px-6 py-6 sm:py-8 flex-1">
    <h2 class="text-2xl sm:text-3xl text-center font-bold text-[#171E29] mb-10 pt-5 left-align">Riwayat Peminjaman</h2>

    <!-- Time Filters -->
    <div class="flex md:flex-row flex-col md:justify-between mb-6 gap-4">
        <div class="flex flex-wrap gap-3 left-align order-2 md:order-1 w-full justify-between md:justify-start lg:justify-start">
            <?php 
                $filter_id = 'Ruangan'; 
                $label = 'Ruangan'; 
                $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Rapat Kecil' => 'Ruang Rapat Kecil']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../../template/filterDropDown.php';
            ?>

            <?php 
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
                <?php $i = 1 ?>
                <?php foreach($bookings as $booking) : ?>
                    <!-- **************************************************
                    INI Data pERTAMA
                    ******************************************************* -->
                    <tr class="hover:bg-gray-50 transition border-b border-gray-300">
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]"><?= $i ?></td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]"><?= tanggal_indonesia($booking['start_time']) ?></td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]"><?= $booking['room_name'] ?></td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]"><?= date('H:i', strtotime($booking['start_time'])) . '-' . date('H:i', strtotime($booking['end_time'])); ?></td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]"><?= $booking['total_person'] ?></td>
                        <td class="px-4 py-3 text-center text-sm border-b border-[#8E97A6]">
                            <div
                                    class="flex <?= getStyleStatus($booking['status']) ?> items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                <span><?= translateStatus($booking['status']) ?></span>
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
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>


        <!-- **************************************************
        INI TAMPILAN MOBILE
        ******************************************************* --> 
        <!-- Mobile Cards -->
        <?php $i = 1 ?>
            <?php foreach($bookings as $booking) : ?>
        <div id="mobile-cards" class="block md:hidden space-y-4 flex flex-col items-center">
            <!-- Row 1 -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-5 hover:shadow-md transition-shadow w-full">                    
                <div class="grid grid-cols-1 gap-x-4 gap-y-3 text-sm pb-3 mb-3">
                    <div class="grid grid-cols-2 border-b border-gray-200">
                        <div>
                            <div class="text-gray-500 text-xs uppercase tracking-wider">Ruangan</div>
                            <div class="font-semibold text-lg text-gray-900"><?= $booking['room_name'] ?></div>
                        </div>
                        <div class="w-full flex justify-end items-start">
                            <div class="<?= getStyleStatus($booking['status']) ?> font-semibold text-sm text-white py-1 w-1/2 text-center rounded-md">
                                <span><?= translateStatus($booking['status']) ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 border-b border-gray-200">
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Tanggal</div>
                        <div class="font-semibold text-gray-900"><?= tanggal_indonesia($booking['start_time']) ?></div>
                    </div>

                    <div class="grid grid-cols-2 border-b border-gray-200">
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Jam</div>
                        <div class="font-semibold text-gray-900"><?= date('H:i', strtotime($booking['start_time'])) . '-' . date('H:i', strtotime($booking['end_time'])); ?></div>
                    </div>
                    
                    <div class="grid grid-cols-2">
                        <div class="text-gray-500 text-xs uppercase tracking-wider">Orang</div>
                        <div class="font-semibold text-gray-900"><?= $booking['total_person'] ?></div>
                    </div>  
                </div>
                <div class="mt-4 grid grid-cols-1 justify-center w-full">
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
        <?php endforeach ?>
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

<script src="js/filterDropDown.js" defer></script>
<script src="/js/search.js" defer></script>