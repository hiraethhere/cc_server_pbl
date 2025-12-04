    <main class="flex-1 p-8 overflow-y-auto bg-background1">
        <nav class="mb-6 text-sm text-dark-overlay6 flex">
            <a href="/Admin/Anggota" class="text-blue-overlay hover:text-blue-700">Data Anggota</a>
            <span class="mx-2">
                <div>
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
            <a href="/Admin/Anggota?tab=semua" class="text-blue-overlay hover:text-blue-700">Daftar Anggota</a>
            <span class="mx-2">
                <div>
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
            <span class="text-dark-overlay6 font-medium hover:cursor-pointer">Detail Anggota</span>
        </nav>

        <h2 class="text-xl font-bold text-dark-overlay mb-6">Detail Anggota</h2>


        <div class="bg-background2 rounded-2xl w-full shadow-xl p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 justify-start items-start border border-dark-overlay7 mt-6 p-4 rounded-md">
                <div class="border-dark-overlay7 py-4">  

                    <p class="text-dark-overlay7 text-sm">Nama</p>
                    <div class="max-w-3/6">
                        <h2 class="text-xl inline-block font-semibold pr-2 1y-1 text-dark-overlay rounded-lg mt-2"><?= htmlspecialchars($user['username']) ?></h2>
                    </div>           
                </div>

                <div class="py-4">         
                    <p class="text-dark-overlay7 text-sm">NIM/NIP</p>
                    <div class="max-w-3/6">
                        <h2 class="text-lg inline-block pr-2 1y-1 text-dark-overlay rounded-lg mt-2"><?= htmlspecialchars($user['nomor_induk']) ?></h2>
                    </div>           
                </div>

                <div class="py-4">         
                    <p class="text-dark-overlay7 text-sm">Jenis Anggota</p>
                    <div class="max-w-3/6">
                        <h2 class="inline-flex justify-center items-center text-sm font-semibold py-2 px-3 1y-1 text-white rounded-lg mt-2 bg-blue-overlay"><?= htmlspecialchars($user['role_name']) ?></h2>
                    </div>           
                </div>

                <div class="py-4">         
                    <p class="text-dark-overlay7 text-sm">Status</p>
                    <a class="inline-flex justify-start items-center bg-green-overlay-25 mt-2 rounded-lg py-2 px-4">
                        <div class="text-green1">
                            <?= icon('circleFill', 'w-4 h-4 mr-2') ?>
                        </div>
                        <h2 class="text-sm inline-block font-semibold text-green1"><?= translateStatus($user['status']) ?></h2>
                    </a>           
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 mt-6">
                <div>
                    <label for="jurusan" class="block text-sm font-medium text-dark-overlay7 mb-2">Jurusan</label>
                    <input type="text" id="jurusan" value="<?= htmlspecialchars($user['jurusan_unit'] ?? '-') ?>" readonly
                        class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:outline-none focus:border-blue-500 text-dark-overlay">
                </div>
                
                <div>
                    <label for="prodi" class="block text-sm font-medium text-dark-overlay7 mb-2">Prodi</label>
                    <input type="text" id="prodi" value="<?= htmlspecialchars($user['prodi'] ?? '-') ?>" readonly
                        class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:outline-none focus:border-blue-500 text-dark-overlay">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-dark-overlay7 mb-2">Email</label>
                    <input type="email" id="email" value="<?= htmlspecialchars($user['email']) ?? '-' ?>" readonly
                        class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:outline-none focus:border-blue-500 text-dark-overlay">
                </div>
                
                <div>
                    <label for="masa-aktif" class="block text-sm font-medium text-dark-overlay7 mb-2">Masa Aktif</label>
                    <input type="text" id="masa-aktif" value="<?= $masaAktif ?>" readonly
                        class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:outline-none focus:border-blue-500 text-dark-overlay">
                </div>

                <div>
                    <label for="tanggal-daftar" class="block text-sm font-medium text-dark-overlay7 mb-2">Tanggal Daftar</label>
                    <input type="text" id="tanggal-daftar" value="<?= tanggal_indonesia($user['created_at']) ?>" readonly
                        class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:outline-none focus:border-blue-500 text-dark-overlay">
                </div>
                
                <div>
                    <label for="jumlah-suspend" class="block text-sm font-medium text-dark-overlay7 mb-2">Jumlah Suspend</label>
                    <input type="number" id="jumlah-suspend" value="<?= $user['suspend_count'] ?>" readonly
                        class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:outline-none focus:border-blue-500 text-dark-overlay">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
                
                <button class="flex-1 bg-red1 hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                    Nonaktifkan
                </button>
                
                <button onclick="konfirmasiSuspend()" class="flex-1 bg-red1 hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                    Suspend
                </button>
                
                <button class="flex-1 bg-green1 hover:bg-green-600 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                    Aktifkan
                </button>
                
            </div>
                
        </div>
    </main>

    <?php include __DIR__ . '/../../template/modal.php'; ?>

<script src="/js/modal.js" defer></script>
<script>
function konfirmasiSuspend() {
    Modal.confirm(
        'Suspend Anggota?',
        'Apakah yakin ingin suspend?',
        function() {
            window.location.href = '#';
        },
        {
            icon: <?= json_encode(icon("suspend", "w-18 h-18 text-red1")) ?>,
            confirmText: 'Suspend',
            confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-red-800 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>