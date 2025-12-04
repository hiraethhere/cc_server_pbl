    <main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
        <nav class="mb-6 text-sm text-dark-overlay/60 flex">
            <a href="/Admin/Anggota" class="text-[#1E68FB]">Data Anggota</a>
            <span class="mx-2">
                <img src="/icon/arrow.svg" class="w-5 h-5">
            </span>
            <a href="/Admin/Anggota" class="text-[#1E68FB]">Daftar Anggota</a>
            <span class="mx-2">
                <img src="/icon/arrow.svg" class="w-5 h-5">
            </span>
            <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Detail Anggota</span>
        </nav>

        <h2 class="text-xl font-bold text-[#171E29] mb-6">Detail Anggota</h2>


        <div class="bg-[#FBFCFF] rounded-2xl w-full shadow-xl p-6">

            <div class="grid grid-cols-2 justify-center items-center border border-[#5C616A] p-3 rounded-md">
                <div class="grid grid-rows-2 items-start">
                    <div class="border-dark-overlay/70 py-4">         
                        <p class="text-[#171E2990] text-sm">Nama</p>
                        <div class="max-w-3/6">
                            <h2 class="text-xl inline-block font-semibold pr-2 1y-1 text-[#171E29] rounded-lg mt-2"><?= htmlspecialchars($user['username']) ?></h2>
                        </div>           
                    </div>

                    <div class="border-dark-overlay/70 py-4">         
                        <p class="text-[#171E2990] text-sm">Jenis Anggota</p>
                        <div class="max-w-3/6">
                            <h2 class="flex justify-center items-center max-w-2/5 text-sm font-semibold py-2 px-3 1y-1 text-white rounded-lg mt-2 bg-[#1E68FB]"><?= htmlspecialchars($user['role_name']) ?></h2>
                        </div>           
                    </div>
                </div>
                <div class="grid grid-rows-2 items-start">
                    <div class="border-dark-overlay/70 py-4">         
                        <p class="text-[#171E2990] text-sm">NIM/NIP</p>
                        <div class="max-w-3/6">
                            <h2 class="text-lg inline-block pr-2 1y-1 text-[#171E29] rounded-lg mt-2"><?= htmlspecialchars($user['nomor_induk']) ?></h2>
                        </div>           
                    </div>

                    <div class="border-dark-overlay/70 py-4">         
                        <p class="text-[#171E2990] text-sm">Status</p>
                        <a class="flex justify-start items-center bg-[#38C55C25] mt-2 rounded-lg py-2 px-3 max-w-3/10">
                            <img src="/icon/circleGreen.svg" class="w-5 h-5 mr-3 ">
                            <h2 class="text-sm inline-block font-semibold text-[#38C55C]"><?= translateStatusUser($user['status']) ?></h2>
                        </a>           
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-4 mt-6">
                <div>
                    <label for="jurusan" class="block text-sm font-medium text-[#171E2990] mb-2">Jurusan</label>
                    <input type="text" id="jurusan" value="<?= htmlspecialchars($user['jurusan_unit'] ?? '-') ?>" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-blue-500 text-[#171E29]">
                </div>
                
                <div>
                    <label for="prodi" class="block text-sm font-medium text-[#171E2990] mb-2">Prodi</label>
                    <input type="text" id="prodi" value="<?= htmlspecialchars($user['prodi'] ?? '-') ?>" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-blue-500 text-[#171E29]">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-[#171E2990] mb-2">Email</label>
                    <input type="email" id="email" value="<?= htmlspecialchars($user['email']) ?? '-' ?>" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-blue-500 text-[#171E29]">
                </div>
                
                <div>
                    <label for="masa-aktif" class="block text-sm font-medium text-[#171E2990] mb-2">Masa Aktif</label>
                    <input type="text" id="masa-aktif" value="<?= $masaAktif ?>" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-blue-500 text-[#171E29]">
                </div>

                <div>
                    <label for="tanggal-daftar" class="block text-sm font-medium text-[#171E2990] mb-2">Tanggal Daftar</label>
                    <input type="text" id="tanggal-daftar" value="<?= tanggal_indonesia($user['created_at']) ?>" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-blue-500 text-[#171E29]">
                </div>
                
                <div>
                    <label for="jumlah-suspend" class="block text-sm font-medium text-[#171E2990] mb-2">Jumlah Suspend</label>
                    <input type="number" id="jumlah-suspend" value="<?= $user['suspend_count'] ?>" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-blue-500 text-[#171E29]">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-between gap-4 mt-6">
                
                <button id="buttonNonAktif" class="flex-1 bg-[#C90B0B] hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                    Nonaktifkan
                </button>
                
                <button onclick="konfirmasiSuspend()" class="flex-1 bg-[#C90B0B] hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                    Suspend
                </button>
                
                <button id="buttonAktifkan" class="flex-1 bg-[#38C55C] hover:bg-green-600 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                    Aktifkan
                </button>
                
            </div>
                    <form id="suspendForm" action="<?= BASEURL ?>Admin/handleSuspend" method="POST" class="hidden">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                        <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                        <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                    </form>

                    <form id="non-activateForm" action="<?= BASEURL ?>Admin/handleNonActivate" method="POST" class="hidden">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                        <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                        <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                    </form>

                    <!-- Form Approve (Hidden) -->
                    <form id="approveForm" action="<?= BASEURL ?>Admin/handleActivate" method="POST" class="hidden">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                        <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                        <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                    </form>
                
        </div>
    </main>

    <?php include __DIR__ . '/../../template/modal.php'; ?>

<script src="/js/modal.js" defer></script>
<script>

    const buttonAktifkan = document.getElementById('buttonAktifkan');
    const buttonNonAktif = document.getElementById('buttonNonAktif');
    if (buttonAktifkan) {
        buttonAktifkan.addEventListener('click', function () {document.getElementById('approveForm').submit();});
}


    function konfirmasiSuspend() {
        Modal.confirm(
            'Suspend Anggota?',
            'Apakah yakin ingin suspend?',
            function() {
                document.getElementById('suspendForm').submit();
            },
            {
                icon: '/icon/pencil.svg',
                confirmText: 'Suspend',
                confirmClass: 'w-full px-6 py-2 bg-[#C90B0B] text-white rounded-lg font-semibold hover:bg-red-800 transition hover:cursor-pointer',
                cancelText: 'Batalkan'
            }
        );
    }

    function konfirmasiNonAktif() {
        Modal.confirm(
            'Nonaktifkan Anggota?',
            'Apakah yakin ingin Menonaktifkan Anggota?',
            function() {
                document.getElementById('non-activateForm').submit();
            },
            {
                icon: '/icon/pencil.svg',
                confirmText: 'Non-Aktifkan',
                confirmClass: 'w-full px-6 py-2 bg-[#C90B0B] text-white rounded-lg font-semibold hover:bg-red-800 transition hover:cursor-pointer',
                cancelText: 'Batalkan'
            }
        );
    }

    if(buttonNonAktif) {
        buttonNonAktif.addEventListener('click', konfirmasiNonAktif);
    }

</script>