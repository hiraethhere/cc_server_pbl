<?php

function isActive($current, $check) {
    return $current === $check;
}
$nomor = ($current_page - 1) * $limit + 1
?>

<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Anggota" class="text-blue-overlay hover:text-blue-700">Data Anggota</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="font-medium text-dark-overlay6">Daftar Anggota</span>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-dark-overlay">Daftar Anggota</h2>
        <a href="/Admin/tambahAnggota"
           class="flex items-center gap-2 px-3 py-1.5 bg-blue-overlay hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
            Tambah Anggota
            <div>
                <?= icon('plus', 'h-4 w-4') ?>
            </div>
        </a>
    </div>

    <div class="bg-background2 rounded-lg shadow-md">
        <!-- Tab Navigation & Search -->
        <div class="">
            <!-- Tabs -->
            <div class="grid grid-cols-2">             
                <a href="?tab=approval"
                class="px-6 py-2.5 rounded-tl-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'approval') 
                            ? 'bg-blue-overlay text-white shadow-md' 
                            : 'bg-blue-overlay1 text-blue-overlay hover:bg-blue-overlay2' ?>">
                    Approval
                </a>
                <a href="?tab=semua"
                class="px-6 py-2.5 rounded-tr-lg font-medium text-sm transition-all duration-200 text-center
                        <?= isActive($tab, 'semua') 
                            ? 'bg-blue-overlay text-white shadow-md' 
                            : 'bg-blue-overlay1 text-blue-overlay hover:bg-blue-overlay2' ?>">
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

                    <div class="flex items-center gap-3 py-4 px-8 bg-background1">
     
                        <?php 
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
                                    bg-white text-dark-overlay7 placeholder-dark-overlay7 text-sm
                                    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                                    transition duration-150">
                        <button type="button" id="clear-search" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-dark-overlay7 hover:text-dark-overlay7 hidden">
                            <div class="hover:cursor-pointer">
                                <?= icon('cross', 'w-4 h-4') ?>
                            </div>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Table Daftar Anggota -->
            <div class="rounded-lg shadow-sm border border-dark-overlay4 overflow-hidden mx-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-background1 border-b border-dark-overlay4">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Jenis Anggota</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Jurusan/Unit Kerja</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Tangal Daftar</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach($users as $user) : ?>
                            <tr class="hover:bg-background1 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-dark-overlay"><?= $nomor ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-dark-overlay"><?= htmlspecialchars($user['username'] ?? '-') ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm <?= getStyleRole($user['role_name']) ?> min-w-24 justify-center">
                                        <?= htmlspecialchars($user['role_name']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-dark-overlay"><?= htmlspecialchars($user['jurusan_unit'] ?? '-') ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex py-1 text-xs font-medium rounded-full">
                                        <?= htmlspecialchars($user['createdDate'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="/Admin/selesaikan/<?= $user['id_user'] ?>"
                                       class="inline-flex items-center px-4 py-1.5 text-xs font-medium text-dark-overlay bg-white border border-dark-overlay4 rounded-lg hover:bg-background1 transition-colors duration-150 shadow-md">
                                        Selesaikan
                                    </a>
                                </td>
                            </tr>
                            <?php $nomor += 1 ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php else: ?>
                <!-- Empty State untuk Tab Approval -->
                <div class="flex flex-col items-center justify-center py-20 px-8">
                    <div>
                        <?= icon('fileList', 'h-24 w-24') ?>
                    </div>
                    <h3 class="text-xl font-semibold text-dark-overlay mb-2">Belum Ada Anggota yang Perlu Diapprove</h3>
                    <p class="text-dark-overlay7 text-center">Saat ini tidak ada anggota baru yang menunggu approval</p>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- KONTEN TAB daftar ANggota -->
            
            <div class="flex justify-between items-center">
                <form method="POST" id="filterForm">
                    <input type="hidden" name="tab" value="<?= $tab ?>">

                    <div class="flex items-center gap-3 py-4 px-8 bg-background1">
                        
                        <?php 
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

            <!-- Table Approval -->
            <div class="rounded-lg shadow-sm border border-dark-overlay4 overflow-hidden mx-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-background1 border-b border-dark-overlay4">
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Jenis Anggota</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Jurusan/Unit Kerja</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <?php if (!empty($users)): ?>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach($users as $user) : ?>
                            <tr class="hover:bg-background1 transition-colors duration-150">
                                <td class="px-6 py-4 text-sm text-dark-overlay"><?= $nomor ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-dark-overlay"><?= htmlspecialchars($user['username'] ?? '-') ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm <?= getStyleRole($user['role_name']) ?> min-w-24 justify-center">
                                        <?= htmlspecialchars($user['role_name'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-dark-overlay"><?= $user['jurusan_unit'] ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-3 py-1 text-xs font-medium rounded-sm <?= $user['statusStyle'] ?> text-background2 min-w-24 justify-center">
                                        <?= htmlspecialchars($user['status'] ?? '-') ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="<?= BASEURL . "admin/" . $data['link'] .'/' . ($user['id_user'] ?? '')?>"
                                       class="inline-flex items-center px-4 py-1.5 text-xs font-medium text-dark-overlay bg-white border border-dark-overlay4 rounded-lg hover:bg-background1 transition-colors duration-150">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            <?php $nomor += 1 ?>
                            <?php endforeach ?>
                        </tbody>
                        <?php else: ?>
                        <tbody>
                            <tr>
                                <td colspan="6" class="px-6 py-12">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="mb-4">
                                            <?= icon('fileList', 'h-20 w-20 text-dark-overlay4') ?>
                                        </div>
                                        <h3 class="text-lg font-semibold text-dark-overlay mb-2">Belum Ada Data Anggota</h3>
                                        <p class="text-sm text-dark-overlay7 text-center">Tidak ada anggota yang ditemukan untuk filter yang Anda pilih</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>

        <?php endif; ?>
        
        <?php if (!empty($users) && $total_page >= 1): ?>   
        <div class="flex items-center justify-center px-6 py-4 bg-white mx-8">
            
            <div class="flex items-center gap-2">
                
                    <?php if ($current_page > 1): ?>
                        <a href="?tab=<?= $tab; ?>&page=<?= $current_page - 1; ?>" class="p-2 text-dark-overlay5 hover:text-dark-overlay hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">
                            <?= icon('arrowLeft', 'w-6 h-6') ?>
                        </a>
                    <?php else: ?>
                        <button disabled class="p-2 text-dark-overlay cursor-not-allowed rounded-lg">
                            <?= icon('arrowLeft', 'w-6 h-6') ?>
                        </button>
                    <?php endif; ?>


                    <?php for ($p = 1; $p <= $total_page; $p++) : ?>
                        
                        <?php if ($p == $current_page) : ?>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-overlay rounded-lg">
                                <?= $p; ?>
                            </button>
                        
                        <?php else : ?>
                            <a href="?tab=<?= $tab; ?>&page=<?= $p; ?>" class="px-4 py-2 text-sm font-medium text-dark-overlay hover:bg-dark-overlay1 rounded-lg transition-colors duration-150 block">
                                <?= $p; ?>
                            </a>
                        <?php endif; ?>

                    <?php endfor; ?>


                    <?php if ($current_page < $total_page): ?>
                        <a href="?tab=<?= $tab; ?>&page=<?= $current_page + 1; ?>" class="p-2 text-dark-overlay5 hover:text-dark-overlay hover:bg-dark-overlay1 rounded-lg transition-colors duration-150">
                            <?= icon('arrowRight', 'w-6 h-6') ?>
                        </a>
                    <?php else: ?>
                        <button disabled class="p-2 text-gray-300 cursor-not-allowed rounded-lg">
                            <?= icon('arrowRight', 'w-6 h-6') ?>
                        </button>
                    <?php endif; ?>
                

            </div>

            <form action="" method="GET" class="flex items-center gap-2 ml-4">
                <input type="hidden" name="tab" value="<?= $tab; ?>">
                <span class="text-sm text-dark-overlay7">Go to</span>
                <input type="number" name="page" min="1" max="<?= $total_page; ?>" value="<?= $current_page; ?>" 
                    class="w-16 px-3 py-2 text-center text-sm border border-dark-overlay4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <span class="text-sm text-dark-overlay7">Page</span>
                
                <button type="submit" class="hidden"></button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</main>

<script src="/js/filterDropdown.js" defer></script>
<script src="/js/search.js" defer></script>