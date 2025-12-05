<?php
// Hanya untuk logika tab (tidak pakai database)
$tab = $_GET['tab'] ?? 'hariIni';
$tab = strtolower($tab);
$valid_tabs = ['hariIni', 'berlangsung', 'reschedule', 'riwayat'];
if (!in_array($tab, $valid_tabs)) {
    $tab = 'hariIni';
}

function isActive($current, $check) {
    return $current === $check;
}
?>


<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Peminjaman" class="text-blue-overlay hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="font-medium text-dark-overlay6">
            <?php 
            $tab_labels = [
                'hariIni' => 'Hari ini',
                'berlangsung' => 'Berlangsung',
                'reschedule' => 'Reschedule',
                'riwayat' => 'Riwayat'
            ];
            echo $tab_labels[$tab] ?? 'Hari ini';
            ?>
        </span>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-dark-overlay"> 
            <?php 
            $title_labels = [
                'hariIni' => 'Booking Hari ini',
                'berlangsung' => 'Berlangsung',
                'reschedule' => 'Reschedule',
                'riwayat' => 'Riwayat Booking'
            ];
            echo $title_labels[$tab] ?? 'Hari ini';
            ?>
        </h2>
        <a href="/Admin/buatBooking"
           class="flex items-center gap-2 px-3 py-2 bg-blue-overlay hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
            Buat Booking
            <div>
                <?= icon('plus', 'w-4 h-4') ?>
            </div>
        </a>
    </div>


    <div class="bg-background2 text-primary rounded-lg shadow-md">
        <!-- Tab Navigation & Search -->
        <div class="border-b border-dark-overlay1">
            <!-- Tabs -->
            <div class="grid grid-cols-4">             
                <a href="?tab=hariIni"
                class="px-6 py-2.5 rounded-tl-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'hariIni') 
                            ? 'bg-blue-overlay text-white shadow-md' 
                            : 'bg-blue-overlay1 text-blue-overlay hover:bg-blue-overlay2' ?>">
                    Hari Ini
                </a>
                <a href="?tab=berlangsung"
                class="px-6 py-2.5 font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'berlangsung') 
                            ? 'bg-blue-overlay text-white shadow-md' 
                            : 'bg-blue-overlay1 text-blue-overlay hover:bg-blue-overlay2' ?>">
                    Berlangsung
                </a></a>
                <a href="?tab=reschedule"
                class="px-6 py-2.5 font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'reschedule') 
                            ? 'bg-blue-overlay text-white shadow-md' 
                            : 'bg-blue-overlay1 text-blue-overlay hover:bg-blue-overlay2' ?>">
                    Reschedule
                </a></a>
                <a href="?tab=riwayat"
                class="px-6 py-2.5 rounded-tr-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'riwayat') 
                            ? 'bg-blue-overlay text-white shadow-md' 
                            : 'bg-blue-overlay1 text-blue-overlay hover:bg-blue-overlay2' ?>">
                    Riwayat
                </a>
            </div>
        </div>

            <!-- KONTEN TAB -->
            <?php if (!empty($bookings)): ?>
            <div class="flex justify-between items-center">
                <form method="POST" id="filterForm">
                    <input type="hidden" name="tab" value="<?= $tab ?>">

                    <div class="flex items-center gap-3 py-4 px-8 bg-background2">
                        <?php 
                        $filter_id = 'ruangan'; 
                        $label = 'ruangan'; 
                        $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Meeting Kecil' => 'Ruang Meeting Kecil']; 
                        $current_values = $_GET[$filter_id] ?? ''; 
                        include __DIR__ . '/../../template/filterDropDown.php';
                        ?>

                        <?php 
                        $filter_id = 'status'; 
                        $label = 'Status'; 
                        $options = ['Aktif' => 'Aktif', 'Belum Aktif' => 'Belum Aktif', 'NonAktif' => 'NonAktif']; 
                        $current_values = $_GET[$filter_id] ?? ''; 
                        include __DIR__ . '/../../template/filterDropDown.php';
                        ?>

                        <button type="button" id="filter-action-btn"
                                class="p-2 text-dark-overlay5 hover:text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition border border-dark-overlay5 bg-white">
                            <div id="filter-action-icon" class="text-dark-overlay5"
                                data-check="<?= htmlspecialchars(icon('check', 'w-4 h-4 text-blue-overlay'), ENT_QUOTES) ?>"
                                data-cross="<?= htmlspecialchars(icon('cross', 'w-4 h-4 text-red1'), ENT_QUOTES) ?>">
                                <?= icon('check', 'w-4 h-4') ?>
                            </div>
                        </button>
                    </div>
                </form>

                <!-- Search Bar -->
                <div class="py-4 px-8">
                    <div class="relative max-w-md ml-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <div>
                                <?= icon('search', 'w-5 h-5') ?>
                            </div>
                        </div>
                        <input type="text" id="search-input" placeholder="Cari Anggota"
                            class="block w-full pl-10 pr-10 py-2 border border-dark-overlay4 rounded-lg 
                                    bg-white text-dark-overlay placeholder-dark-overlay6 text-sm
                                    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                    transition duration-150">
                        <button type="button" id="clear-search" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-dark-overlay6 hover:text-dark-overlay7 hidden">
                            <div>
                                <?= icon('cross', 'w-4 h-4 hover:cursor-pointer') ?>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="rounded-lg shadow-sm border border-dark-overlay4 overflow-hidden mx-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-dark-overlay4">
                                <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">No</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Tanggal</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Ruangan</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Kode Booking</th>
                                <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Penanggung Jawab</th>      
                                <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-4 text-center text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-dark-overlay4">
                            <?php $i = 1 ?>
                            <?php foreach($bookings as $booking) : ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-4 py-4 text-xs text-dark-overlay"><?= $i ?></td>
                                <td class="px-4 py-4 text-xs font-medium text-dark-overlay"><?= tanggal_indonesia($booking['start_time']) ?>
                                    <br>
                                    <span><?= waktu_indonesia($booking['start_time']) . '-' . waktu_indonesia($booking['end_time']) ?></span>
                                </td>
                                <td class="px-4 py-4 text-xs text-dark-overlay"><?= htmlspecialchars( $booking['room_name'] ?? '-') ?></td>
                                <td class="px-4 py-4 text-xs text-dark-overlay"><?= $booking['booking_code']?></td>
                                <td class="px-4 py-4 text-xs text-dark-overlay"><?= $booking['username'] ?></td>
                                <td class="px-4 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs min-w-5/6 justify-center font-medium rounded-sm <?= getStyleStatus($booking['status']) ?> text-background2">
                                        <?= translateStatus($booking['status']) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-center">
                                    <a href="<?= BASEURL . '/admin/' . $link . '/'. $booking[$data['id_column']] ?>"
                                       class="inline-flex items-center px-4 py-2 text-xs font-medium text-dark-overlay bg-white border border-dark-overlay4 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            <?php endforeach ?>
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>


            <!-- Pagination (Sama untuk kedua tab) -->
            <div class="flex items-center justify-center px-6 py-4 bg-white border-t border-dark-overlay4 mx-8">
                <div class="flex items-center gap-2">
                    <button class="p-2 text-dark-overlay6 hover:text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="px-4 py-2 text-sm font-medium text-white bg-blue-overlay rounded-lg">1</button>
                    <button class="px-4 py-2 text-sm font-medium text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">2</button>
                    <button class="px-4 py-2 text-sm font-medium text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">3</button>
                    <span class="px-2 text-dark-overlay6">...</span>
                    <button class="px-4 py-2 text-sm font-medium text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">8</button>
                    <button class="p-2 text-dark-overlay6 hover:text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-sm text-dark-overlay6">Go to</span>
                    <input type="text" value="1" 
                        class="w-16 px-3 py-2 text-center text-sm border border-dark-overlay4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-sm text-dark-overlay6">Page</span>
                </div>
            </div>
            <?php else: ?>
            <div class="flex flex-col items-center justify-center p-20">
                <div class="mb-4">
                    <?= icon('fileList', 'h-20 w-20 text-gray-400') ?>
                </div>
                <div class="flex items-center flex-col justify-center">
                    <h3 class="text-lg font-semibold text-dark-overlay7 mb-2">Belum Ada Data Booking</h3>
                    <p class="text-sm text-dark-overlay6 text-center mb-6">Tidak ada booking yang berjalan</p>
                    <a href="/Admin/buatBooking"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-overlay hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-200">
                        Buat Booking Baru
                        <?= icon('plus', 'w-4 h-4') ?>
                    </a>
                </div>
            </div>
            <?php endif; ?>
    </div>

</main>

<script src="/js/filterDropdown.js" defer></script>
<script src="/js/search.js" defer></script>