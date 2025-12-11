<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <a href="/Admin/superAdmin" class="text-dark-overlay6 hover:text-blue-700">Data Admin</a>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-dark-overlay">Data Admin</h2>

        <div class="flex justify-between items-center gap-8">
            <a href="/Superadmin/tambahAdmin"
                class="flex items-center gap-2 px-3 py-1.5 bg-blue-overlay hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
                Tambah Admin
                <div>
                    <?= icon('plus', 'w-4 h-4') ?>
                </div>
            </a>
        </div>
    </div>

    <div class="pb-2">
        <div class="relative max-w-xs">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <div class="text-dark-overlay7">
                    <?= icon('search', 'w-5 h-5') ?>
                </div>
            </div>
            <input type="text" id="search-input" placeholder="Cari..."
                class="block w-full pl-10 pr-10 py-2 border border-dark-overlay4 rounded-lg 
                        bg-white text-dark-overlay7 placeholder-dark-overlay7 text-sm
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                        transition duration-150">
            <button type="button" id="clear-search" 
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-dark-overlay7 hover:text-dark-overlay hidden">
                <div class="text-dark-overlay7">
                    <?= icon('cross', 'w-4 h-4 hover:cursor-pointer') ?>
                </div>
            </button>
        </div>
    </div>


    <div class="rounded-lg shadow-sm border border-dark-overlay4 overflow-hidden mt-4">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-blue-overlay1 border-b border-dark-overlay4">
                        <th class="px-4 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">No</th>
                        <th class="px-12 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Nama</th>
                        <th class="px-12 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">NIP</th>
                        <th class="px-12 py-4 text-left text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Email</th>
                        <th class="px-12 py-4 text-center text-xs font-semibold text-dark-overlay7 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-dark-overlay4">
                    <?php $i = 1 ?>
                    <?php foreach ($data['admins'] as $admin): ?>
                    <tr class="hover:bg-gray-50 bg-white transition-colors duration-150">
                        <td class="px-4 py-4 text-xs font-medium text-dark-overlay"><?= $i ?></td>
                        <td class="px-12 py-4 text-xs font-medium text-dark-overlay"><?= $admin['username'] ?></td>
                        <td class="px-12 py-4 text-xs font-medium text-dark-overlay"><?= $admin['nomor_induk'] ?></td>
                        <td class="px-12 py-4 text-xs font-medium text-dark-overlay"><?= $admin['email'] ?></td>
                        <td class="px-12 py-4 text-center">
                            <a href="/SuperAdmin/detailAdmin"
                                class="items-center gap-2 px-6 py-2 bg-blue-overlay hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="/js/search.js"></script>