<!-- Main Content -->
<main class="container mx-auto px-4 w-97/100 lg:px-6 sm:px-6 py-6 sm:py-8 flex-1">
    <h2 class="text-2xl sm:text-3xl text-center font-bold text-dark-overlay mb-10 pt-5 left-align">Riwayat Peminjaman</h2>

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
                    class="p-2 text-dark-overlay5 hover:text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition border border-dark-overlay5 bg-white"
                    onclick="document.getElementById('jenis_anggota').value=''; document.getElementById('jurusan').value=''; document.getElementById('status').value=''; document.getElementById('filterForm').submit();">
                <div class="text-red1">
                    <?= icon('cross', 'w-4 h-4') ?>
                </div>
            </button>
        </div>

        <!-- Search Bar -->
        <div class="order-1 md:order-2">
            <div class="relative max-w-md ml-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <div class="text-dark-overlay7">
                        <?= icon('search', 'w-5 h-5') ?>
                    </div>
                </div>
                <input type="text" id="search-input" placeholder="Cari..."
                    class="block w-full p-10 py-2 border border-dark-overlay5 rounded-lg 
                            bg-white text-dark-overlay7 placeholder-dark-overlay7 text-sm
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                            transition duration-150">
                <button type="button" id="clear-search" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-dark-overlay7 hover:text-dark-overlay hidden">
                    <div class="hover:cursor-pointer">
                        <?= icon('cross', 'w-4 h-4') ?>
                    </div>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Table Content -->
    <div class="">
        <!-- Desktop Table -->
        <div id="desktop-table" class="md:block hidden overflow-x-auto bg-background2 rounded-t-xl">
            <table class="w-full text-sm border-separate border-spacing-0 border border-dark-overlay4 rounded-t-xl">
                <thead class="bg-blue-overlay1 rounded-t-xl">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-dark-overlay7 rounded-tl-xl">No.</th>
                        <th class="px-6 py-4 text-left font-semibold text-dark-overlay7">Tanggal</th>
                        <th class="px-6 py-4 text-left font-semibold text-dark-overlay7">Ruangan</th>
                        <th class="px-6 py-4 text-left font-semibold text-dark-overlay7">Jam</th>
                        <th class="px-6 py-4 text-left font-semibold text-dark-overlay7">Jumlah Orang</th>
                        <th class="px-6 py-4 text-center font-semibold text-dark-overlay7">Status</th>
                        <th class="px-6 py-4 text-center font-semibold text-dark-overlay7 rounded-tr-xl">Aksi</th>
                    </tr>
                </thead>


                <tbody id="" class="divide-y divide-dark-overlay5">
                <?php $i = 1 ?>
                <?php foreach($bookings as $booking) : ?>
                    <!-- **************************************************
                    INI Data pERTAMA
                    ******************************************************* -->
                    <tr class="hover:bg-dark-overlay1 transition border-b border-dark-overlay4">
                        <td class="px-6 py-4 text-left text-sm border-b border-dark-overlay4"><?= $i ?></td>
                        <td class="px-6 py-4 text-left text-sm border-b border-dark-overlay4"><?= tanggal_indonesia($booking['start_time']) ?></td>
                        <td class="px-6 py-4 text-left text-sm border-b border-dark-overlay4"><?= $booking['room_name'] ?></td>
                        <td class="px-6 py-4 text-left text-sm border-b border-dark-overlay4"><?= date('H:i', strtotime($booking['start_time'])) . '-' . date('H:i', strtotime($booking['end_time'])); ?></td>
                        <td class="px-6 py-4 text-left text-sm border-b border-dark-overlay4"><?= $booking['total_person'] ?></td>
                        <td class="px-6 py-4 text-left text-sm border-b border-dark-overlay4">
                            <div
                                    class="flex <?= getStyleStatus($booking['status']) ?> items-center justify-center text-white px-2 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                <span><?= translateStatus($booking['status']) ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center justify-center flex border-b border-dark-overlay4">
                            <button onclick="kirimFeedback('<?= $booking['id_booking'] ?>')"
                                    class="flex bg-blue-overlay items-center text-white hover:bg-blue-700 hover:cursor-pointer px-5 py-2 rounded-sm text-xs font-medium transition shadow-md transform hover:scale-105">
                                <span>Feedback</span>
                                
                                <div class="bg-background2 rounded-xs ml-3"> 
                                    <div class="text-blue-overlay">
                                        <?= icon('plus', 'w-4 h-4') ?>
                                    </div>
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
        <div id="mobile-cards" class="block md:hidden space-y-4 flex flex-col items-center mb-6">
            <!-- Row 1 -->
            <div class="bg-background2 rounded-xl shadow-lg border border-dark-overlay4 p-5 hover:shadow-md transition-shadow w-full">                    
                <div class="grid grid-cols-1 gap-x-4 gap-y-3 text-sm pb-3 mb-3">
                    <div class="grid grid-cols-2 border-b border-dark-overlay4">
                        <div>
                            <div class="text-dark-overlay7 text-xs uppercase tracking-wider">Ruangan</div>
                            <div class="font-semibold text-lg text-dark-overlay"><?= $booking['room_name'] ?></div>
                        </div>
                        <div class="w-full flex justify-end items-start">
                            <div class="<?= getStyleStatus($booking['status']) ?> font-semibold text-sm text-white1 py-1 w-1/2 text-center rounded-md">
                                <span><?= translateStatus($booking['status']) ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 border-b border-dark-overlay4">
                        <div class="text-dark-overlay7 text-xs uppercase tracking-wider">Tanggal</div>
                        <div class="font-semibold text-dark-overlay"><?= tanggal_indonesia($booking['start_time']) ?></div>
                    </div>

                    <div class="grid grid-cols-2 border-b border-dark-overlay4">
                        <div class="text-dark-overlay7 text-xs uppercase tracking-wider">Jam</div>
                        <div class="font-semibold text-dark-overlay"><?= date('H:i', strtotime($booking['start_time'])) . '-' . date('H:i', strtotime($booking['end_time'])); ?></div>
                    </div>
                    
                    <div class="grid grid-cols-2">
                        <div class="text-dark-overlay7 text-xs uppercase tracking-wider">Orang</div>
                        <div class="font-semibold text-dark-overlay"><?= $booking['total_person'] ?></div>
                    </div>  
                </div>
                <div class="mt-4 grid grid-cols-1 justify-center w-full">
                    <button onclick="kirimFeedback('<?= $booking['id_booking'] ?>')" class="flex items-center justify-center w-full bg-blue-overlay text-white hover:bg-blue-700 py-2 rounded-sm text-sm font-medium transition shadow-md">
                        <span>Feedback</span>
                        <div class="bg-background2 rounded-xs ml-3"> 
                            <div class="text-blue-overlay">
                                <?= icon('plus', 'w-4 h-4') ?>
                            </div>
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
                <input type="text" maxlength="1" readonly class="w-7 px-1 py-1 border border-dark-overlay4 rounded-xs focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                Page
            </div>
        </div>
    </div>
</main>


<script src="/js/search.js"></script>
<script src="/js/filterDropDown.js"></script>
<script src="/js/feedback.js"></script>