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


<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <a href="/Admin/Peminjaman" class="text-[#1E68FB] hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="font-medium text-gray-900">Hari ini</span>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#171E29]">Booking Hari ini</h2>
        <a href="/Admin/buatBooking"
           class="flex items-center gap-2 px-3 py-1.5 bg-[#1E68FB] hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
            Buat Booking
            <img src="/icon/plus.svg" alt="Tambah Anggota" class="w-4 h-4">
        </a>
    </div>


    <div class="bg-[#FBFCFF] text-primary rounded-lg shadow-md">
        <!-- Tab Navigation & Search -->
        <div class="border-b border-gray-200">
            <!-- Tabs -->
            <div class="grid grid-cols-4">             
                <a href="?tab=hariIni"
                class="px-6 py-2.5 rounded-tl-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'hariIni') 
                            ? 'bg-[#1E68FB] text-white shadow-md' 
                            : 'bg-[rgba(30,104,251,0.10)] text-[#1E68FB] hover:bg-blue-200' ?>">
                    Hari Ini
                </a>
                <a href="?tab=berlangsung"
                class="px-6 py-2.5 font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'berlangsung') 
                            ? 'bg-[#1E68FB] text-white shadow-md' 
                            : 'bg-[rgba(30,104,251,0.10)] text-[#1E68FB] hover:bg-blue-200' ?>">
                    Berlangsung
                </a></a>
                <a href="?tab=reschedule"
                class="px-6 py-2.5 font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'reschedule') 
                            ? 'bg-[#1E68FB] text-white shadow-md' 
                            : 'bg-[rgba(30,104,251,0.10)] text-[#1E68FB] hover:bg-blue-200' ?>">
                    Reschedule
                </a></a>
                <a href="?tab=riwayat"
                class="px-6 py-2.5 rounded-tr-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'riwayat') 
                            ? 'bg-[#1E68FB] text-white shadow-md' 
                            : 'bg-[rgba(30,104,251,0.10)] text-[#1E68FB] hover:bg-blue-200' ?>">
                    Riwayat
                </a>
            </div>
        </div>

            <!-- KONTEN TAB -->

            <div class="flex justify-between items-center">
                <form method="POST" id="filterForm">
                    <input type="hidden" name="tab" value="<?= $tab ?>">

                    <div class="flex items-center gap-3 pt-6 pb-2 bg-gray-50 px-8">
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

                        <button type="button" 
                                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition border border-gray-300 bg-white"
                                onclick="document.getElementById('jenis_anggota').value=''; document.getElementById('jurusan').value=''; document.getElementById('status').value=''; document.getElementById('filterForm').submit();">
                            <img src="/icon/crossRed.svg" alt="clear" class="w-4 h-4">
                        </button>
                    </div>
                </form>

                <!-- Search Bar -->
                <div class="pt-6 pb-2 px-8">
                    <div class="relative max-w-md ml-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <img src="/icon/search.svg" alt="search" class="w-5 h-5">
                        </div>
                        <input type="text" id="search-input" placeholder="Cari"
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
            <div class="rounded-lg shadow-sm border border-gray-200 overflow-hidden mx-8 mt-4">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ruangan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode Booking</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Penanggung Jawab</th>      
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php $i = 1 ?>
                            <?php foreach($bookings as $booking) : ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-xs text-gray-900"><?= $i ?></td>
                                <td class="px-6 py-4 text-xs font-medium text-gray-900"><?= tanggal_indonesia($booking['start_time']) ?>
                                    <br>
                                    <span><?= waktu_indonesia($booking['start_time']) . '-' . waktu_indonesia($booking['end_time']) ?></span>
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-900"><?= htmlspecialchars( $booking['room_name'] ?? '-') ?></td>
                                <td class="px-6 py-4 text-xs text-gray-900"><?= $booking['booking_code']?></td>
                                <td class="px-6 py-4 text-xs text-gray-900"><?= $booking['username'] ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs min-w-5/6 justify-center font-medium rounded-sm <?= getStyleStatus($booking['status']) ?> text-[#FBFCFF]">
                                        <?= translateStatus($booking['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="<?= BASEURL . '/admin/' . $link . '/'. $booking[$data['id_column']] ?>"
                                       class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
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
            <div class="flex items-center justify-center px-6 py-4 bg-white border-t border-gray-200 mx-8">
                <div class="flex items-center gap-2">
                    <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button class="px-4 py-2 text-sm font-medium text-white bg-[#1E68FB] rounded-lg">1</button>
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-150">2</button>
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-150">3</button>
                    <span class="px-2 text-gray-500">...</span>
                    <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-150">8</button>
                    <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-150">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600">Go to</span>
                    <input type="text" value="1" 
                        class="w-16 px-3 py-2 text-center text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <span class="text-sm text-gray-600">Page</span>
                </div>
            </div>
    </div>

</main>

<script src="/js/filterDropdown.js" defer></script>
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