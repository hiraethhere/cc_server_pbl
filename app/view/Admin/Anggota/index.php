<?php
// Hanya untuk logika tab (tidak pakai database)
$tab = $_GET['tab'] ?? 'approval';
$tab = strtolower($tab);
$valid_tabs = ['semua', 'approval'];
if (!in_array($tab, $valid_tabs)) {
    $tab = 'approval';
}

function isActive($current, $check) {
    return $current === $check;
}
?>


<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <a href="/Admin/Anggota" class="text-[#1E68FB] hover:text-blue-700">Data Anggota</a>
        <span class="mx-2 text-gray-400">></span>
        <span class="font-medium text-gray-900">Daftar Anggota</span>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#171E29]">Daftar Anggota</h2>
        <a href="/Admin/TambahAnggota"
           class="flex items-center gap-2 px-3 py-1.5 bg-[#1E68FB] hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
            Tambah Anggota
            <img src="/icon/plus.svg" alt="Tambah Anggota" class="w-4 h-4">
        </a>
    </div>

    <div class="bg-[#FBFCFF] rounded-lg shadow-md">
        <!-- Tab Navigation & Search -->
        <div class="border-b border-gray-200">
            <!-- Tabs -->
            <div class="grid grid-cols-2">             
                <a href="?tab=approval"
                class="px-6 py-2.5 rounded-tl-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'approval') 
                            ? 'bg-[#1E68FB] text-white shadow-md' 
                            : 'bg-[rgba(30,104,251,0.10)] text-[#1E68FB] hover:bg-blue-200' ?>">
                    Approval
                </a>
                <a href="?tab=semua"
                class="px-6 py-2.5 rounded-tr-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'semua') 
                            ? 'bg-[#1E68FB] text-white shadow-md' 
                            : 'bg-[rgba(30,104,251,0.10)] text-[#1E68FB] hover:bg-blue-200' ?>">
                    Daftar Anggota
                </a>
            </div>
        </div>

        <!-- ============================================
             LOGIKA IF-ELSE DI SINI (SETELAH TAB NAVIGATION)
             ============================================ -->
        <?php if ($tab === 'approval'): ?>
            <?php if (!empty($users)): ?>
            <!-- KONTEN TAB approval -->

            <div class="flex justify-between items-center">
                <form method="POST" id="filterForm">
                    <input type="hidden" name="tab" value="<?= $tab ?>">

                    <div class="flex items-center gap-3 pt-6 pb-2 bg-gray-50 px-8">
                        
                        <?php 
                        // Anggap Anda sudah mendefinisikan array $jenis_anggota_options, dsb.
                        // Di sini Anda memuat komponen:
                        $filter_id = 'jenis_anggota'; 
                        $label = 'Jenis Anggota'; 
                        $options = ['Mahasiswa' => 'Mahasiswa', 'Dosen' => 'Dosen', 'Tendik' => 'Tendik']; 
                        $current_values = $_GET[$filter_id] ?? ''; 
                        include __DIR__ . '/../../template/filterDropDown.php';
                        ?>
                        
                        <?php 
                        $filter_id = 'jurusan'; 
                        $label = 'Jurusan/Unit Kerja'; 
                        $options = ['Teknik Informatika & Komputer' => 'TIK', 'Teknik Elektro' => 'TE']; 
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
                <div class="py-4 px-8">
                    <div class="relative max-w-md ml-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <img src="/icon/search.svg" alt="search" class="w-5 h-5">
                        </div>
                        <input type="text" id="search-input" placeholder="Cari Anggota"
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

            <!-- Table Daftar Anggota -->
            <div class="rounded-lg shadow-sm border border-gray-200 overflow-hidden mx-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Anggota</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jurusan/Unit Kerja</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tangal Daftar</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php $i = 1 ?>
                            <?php foreach($users as $user) : ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $i ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= htmlspecialchars($user['username'] ?? '-') ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm bg-blue-100 text-blue-700">
                                        <?= htmlspecialchars($user['role_name']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?= htmlspecialchars($user['jurusan_unit'] ?? '-') ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full">
                                        <?= htmlspecialchars($user['createdDate'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/selesaikan/<?= $user['id_user'] ?>"
                                       class="inline-flex items-center px-4 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150 shadow-md">
                                        Selesaikan
                                    </a>
                                </td>
                            </tr>
                            <?php $i += 1 ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php else: ?>
                <!-- Empty State untuk Tab Approval -->
                <div class="flex flex-col items-center justify-center py-20 px-8">
                    <svg class="w-24 h-24 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Anggota yang Perlu Diapprove</h3>
                    <p class="text-gray-500 text-center">Saat ini tidak ada anggota baru yang menunggu approval</p>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- KONTEN TAB daftar ANggota -->
            
            <div class="flex justify-between items-center">
                <form method="POST" id="filterForm">
                    <input type="hidden" name="tab" value="<?= $tab ?>">

                    <div class="flex items-center gap-3 pt-6 pb-2 bg-gray-50 px-8">
                        
                        <?php 
                        // Anggap Anda sudah mendefinisikan array $jenis_anggota_options, dsb.
                        // Di sini Anda memuat komponen:
                        $filter_id = 'jenis_anggota'; 
                        $label = 'Jenis Anggota'; 
                        $options = ['Mahasiswa' => 'Mahasiswa', 'Dosen' => 'Dosen', 'Tendik' => 'Tendik']; 
                        $current_values = $_GET[$filter_id] ?? ''; 
                        include __DIR__ . '/../../template/filterDropDown.php';
                        ?>
                        
                        <?php 
                        $filter_id = 'jurusan'; 
                        $label = 'Jurusan/Unit Kerja'; 
                        $options = ['Teknik Informatika & Komputer' => 'TIK', 'Teknik Elektro' => 'TE']; 
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
                <div class="py-4 px-8">
                    <div class="relative max-w-md ml-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <img src="/icon/search.svg" alt="search" class="w-5 h-5">
                        </div>
                        <input type="text" id="search-input" placeholder="Cari Anggota"
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

            <!-- Table Approval -->
            <div class="rounded-lg shadow-sm border border-gray-200 overflow-hidden mx-8 mt-4">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis Anggota</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jurusan/Unit Kerja</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php $c = 1 ?>
                            <?php foreach($users as $user) : ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900"><?= $c ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= htmlspecialchars($user['username'] ?? '-') ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm bg-[#B9D0FE] text-[#1E68FB]">
                                        <?= htmlspecialchars($user['role_name'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?= $user['jurusan_unit'] ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm <?= $user['statusStyle'] ?> text-[#FBFCFF]">
                                        <?= htmlspecialchars($user['status'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/"
                                       class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            <?php $c += 1 ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif; ?>
        
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
