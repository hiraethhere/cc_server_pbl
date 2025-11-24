<?php
// Hanya untuk logika tab (tidak pakai database)
$tab = $_GET['tab'] ?? 'semua';
$tab = strtolower($tab);
$valid_tabs = ['semua', 'approval'];
if (!in_array($tab, $valid_tabs)) {
    $tab = 'semua';
}

function isActive($current, $check) {
    return $current === $check;
}
?>

<main class="flex-1 p-8 overflow-y-auto bg-[#F3F5FA]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <a href="/Admin/Anggota" class="text-gray-600 hover:text-[#1E68FB]">Data Anggota</a>
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
            <!-- KONTEN TAB approval -->

            <div class="flex justify-between items-center">
                <form method="GET" action="/Admin/Anggota" id="filterForm">
    <input type="hidden" name="tab" value="<?= $tab ?>">
    
    <div class="flex items-center gap-3 py-4 bg-gray-50 px-8">
        <!-- Filter Jenis Anggota -->
        <div class="relative">
            <button type="button" 
                    onclick="toggleDropdown('jenisAnggota')"
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-sm bg-white hover:bg-gray-50 transition">
                <span id="jenisAnggotaText">
                    <?= isset($_GET['jenis_anggota']) && $_GET['jenis_anggota'] != '' ? $_GET['jenis_anggota'] : 'Jenis Anggota' ?>
                </span>
                <img src="/icon/arrowDown.svg" alt="dropDown" class="w-4 h-4">
            </button>
            
            <div id="jenisAnggotaDropdown" 
                 class="hidden absolute z-10 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg">
                <ul class="py-1">
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jenisAnggota', 'jenis_anggota', '')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Semua
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jenisAnggota', 'jenis_anggota', 'Mahasiswa')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Mahasiswa
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jenisAnggota', 'jenis_anggota', 'Dosen')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Dosen
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jenisAnggota', 'jenis_anggota', 'Tendik')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Tendik
                        </button>
                    </li>
                </ul>
            </div>
            <!-- Hidden input untuk menyimpan nilai -->
            <input type="hidden" name="jenis_anggota" id="jenis_anggota" value="<?= $_GET['jenis_anggota'] ?? '' ?>">
        </div>

        <!-- Filter Jurusan -->
        <div class="relative">
            <button type="button" 
                    onclick="toggleDropdown('jurusan')"
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-sm bg-white hover:bg-gray-50 transition">
                <span id="jurusanText">
                    <?= isset($_GET['jurusan']) && $_GET['jurusan'] != '' ? $_GET['jurusan'] : 'Jurusan/Unit Kerja' ?>
                </span>
                <img src="/icon/arrowDown.svg" alt="dropDown" class="w-4 h-4">
            </button>
            
            <div id="jurusanDropdown" 
                 class="hidden absolute z-10 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg">
                <ul class="py-1">
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jurusan', 'jurusan', '')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Semua
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jurusan', 'jurusan', 'Teknik Informatika & Komputer')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Teknik Informatika & Komputer
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('jurusan', 'jurusan', 'Teknik Elektro')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Teknik Elektro
                        </button>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="jurusan" id="jurusan" value="<?= $_GET['jurusan'] ?? '' ?>">
        </div>

        <!-- Filter Status -->
        <div class="relative">
            <button type="button" 
                    onclick="toggleDropdown('status')"
                    class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-sm bg-white hover:bg-gray-50 transition">
                <span id="statusText">
                    <?= isset($_GET['status']) && $_GET['status'] != '' ? $_GET['status'] : 'Status' ?>
                </span>
                <img src="/icon/arrowDown.svg" alt="dropDown" class="w-4 h-4">
            </button>
            
            <div id="statusDropdown" 
                 class="hidden absolute z-10 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                <ul class="py-1">
                    <li>
                        <button type="button" 
                                onclick="selectFilter('status', 'status', '')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Semua
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('status', 'status', 'Aktif')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Aktif
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('status', 'status', 'Belum Aktif')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            Belum Aktif
                        </button>
                    </li>
                    <li>
                        <button type="button" 
                                onclick="selectFilter('status', 'status', 'NonAktif')"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">
                            NonAktif
                        </button>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="status" id="status" value="<?= $_GET['status'] ?? '' ?>">
        </div>

        <!-- Clear Filter Button -->
        <button type="button" 
                onclick="clearAllFilters()"
                class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition">
            <img src="/icon/silang.svg" alt="clear" class="w-4 h-4">
        </button>
    </div>
</form>

                <!-- Search Bar -->
                <div class="py-4 px-8">
                    <div class="relative max-w-md ml-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" id="search-input" placeholder="Cari Anggota"
                            class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg 
                                    bg-white text-gray-900 placeholder-gray-400 text-sm
                                    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                    transition duration-150">
                        <button type="button" id="clear-search" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M6 18L18 6M6 6l12 12"/>
                            </svg>
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
                                <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= $user['username'] ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm bg-blue-100 text-blue-700">
                                        Mahasiswa
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?= $user['jurusan_unit'] ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full">
                                        5 November 2025
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/detailAnggota/<?= $user['id_user'] ?>"
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
            <!-- KONTEN TAB daftar ANggota -->
            
            <!-- Search Bar -->
            <div class="py-4 bg-white border-b border-gray-200 px-8">
                <div class="relative max-w-md ml-auto">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" id="search-input" placeholder="Cari Anggota"
                           class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg 
                                  bg-white text-gray-900 placeholder-gray-400 text-sm
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                  transition duration-150">
                    <button type="button" id="clear-search" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Filters -->
            <div class="flex items-center gap-3 py-4 bg-gray-50 px-8">
                <select class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Jenis Anggota</option>
                    <option>Mahasiswa</option>
                    <option>Dosen</option>
                    <option>Tendik</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Jurusan/Unit Kerja</option>
                    <option>Teknik Informatika & Komputer</option>
                    <option>Teknik Elektro</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option>Status</option>
                    <option>Aktif</option>
                    <option>Belum Aktif</option>
                    <option>NonAktif</option>
                </select>
                <button class="p-2 text-gray-500 hover:text-gray-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
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
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">Naqib Zuhair Al-Hudri</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                        Mahasiswa
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Teknik Informatika & Komputer</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                        Belum Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/Selesaikan"
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        Selesaikan
                                    </a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900">2</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">Ahmad Saputra</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">
                                        Dosen
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Teknik Elektro</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                        Belum Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/Selesaikan"
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        Selesaikan
                                    </a>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-gray-900">3</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">Siti Nurhaliza</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-orange-100 text-orange-700">
                                        Tendik
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">Administrasi Umum</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                                        Belum Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/Selesaikan"
                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                                        Selesaikan
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php endif; ?>
        
        <!-- Pagination (Sama untuk kedua tab) -->
        <div class="flex items-center justify-between px-6 py-4 bg-white border-t border-gray-200 mx-8">
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
