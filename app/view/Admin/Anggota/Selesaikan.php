    <main class="flex-1 p-8 overflow-y-auto bg-[#F3F5FA]">
        <nav class="mb-6 text-sm text-dark-overlay/60">
            <a href="/Admin/Anggota" class="text-gray-900 hover:text-[#1E68FB]">Data Anggota</a>
            <span class="mx-2">
                <img src="/icon/arrow.svg" class="w-5 h-5">
            </span>
            <a href="/Admin/Anggota" class="text-gray-900 hover:text-[#1E68FB]">Daftar Anggota</a>
            <span class="mx-2">
                <img src="/icon/arrow.svg" class="w-5 h-5">
            </span>
            <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Detail Data</span>
        </nav>

        <h2 class="text-xl font-bold text-[#171E29] mb-6">Detail Data</h2>

        <div class="flex flex-row gap-16">
            <div class="bg-[#F3F5FA] rounded-2xl w-full">
                    <div class="grid gap-4">
                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <div class="relative">
                                <input type="Text" id="Nama" name="Nama" placeholder="<?= htmlspecialchars($user['username']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" placeholder="<?= htmlspecialchars($user['role_name']?? '-')   ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIM/NIP/apapun itu</label>
                            <div class="relative">
                                <input type="Text" id="NIM" name="NIM" placeholder="<?= htmlspecialchars($user['nomor_induk']) ?? '-'?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <input type="Email" id="Email" name="Email" placeholder="<?= htmlspecialchars($user['email']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" placeholder="<?= htmlspecialchars($user['jurusan_unit']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Daftar</label>
                            <div class="relative">
                                <input type="text" id="TanggalDaftar" name="Tanggal Daftar" placeholder="<?= htmlspecialchars($createdDate) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-12 mt-2">
                            <button type="button" id="buttonDecline" class="px-4 py-2 bg-[#C90B0B] text-white rounded-lg font-medium hover:bg-red-800 transition hover:cursor-pointer">Decline</button>
                            <button type="button" id="buttonApprove" class="px-4 py-2 bg-[#38C55C] text-white rounded-lg font-medium hover:bg-green-600 transition hover:cursor-pointer">Approve</button>
                        </div>

                        <!-- Form Decline (Hidden) -->
                        <form id="declineForm" action="<?= BASEURL ?>Admin/handleDecline" method="POST" class="hidden">
                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                            <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                            <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                            <!-- Alasan akan ditambahkan via JavaScript -->
                        </form>

                        <!-- Form Approve (Hidden) -->
                        <form id="approveForm" action="<?= BASEURL ?>Admin/handleApprove" method="POST" class="hidden">
                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                            <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                            <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                        </form>
                    </div>
            </div>


            <div class="flex flex-col bg-white justify-center items-center rounded-2xl w-1/2 py-4">
                <p class="text-xs">Bukti foto akun KubacaPNJ</p>
                <div>
                    <img src="<?= !empty($user['kubaca_photo']) 
                    ? BASEURL . 'File/showBukti/' . $user['kubaca_photo'] : BASEURL . 'img/Profil-Kubaca_Contoh.jpg' ?>"
                    class="mt-2 w-auto h-124 object-cover rounded-lg border border-gray-300">
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../../template/modal.php'; ?>
    <script src="/js/modal.js" defer></script>
    <script>
    const buttonDecline = document.getElementById('buttonDecline');
    const buttonApprove = document.getElementById('buttonApprove');

    function openApproveModal() {
        Modal.confirm(
            'Approve User?',
            'Anda yakin ingin menyetujui user ini',
            function() {
                // Callback ketika tombol konfirmasi ditekan
                document.getElementById('approveForm').submit();
            },
            {
                icon: '/icon/check.svg',
                confirmText: 'Ya',
                confirmClass: 'w-full px-6 py-2 bg-[#38C55C] text-white rounded-lg font-semibold hover:bg-green-600 transition',
                cancelText: 'Batalkan'
            }
        );
    }
    
    function openDeclineRescheduleModal() {
        Modal.prompt(
            'Decline User?',
            'Anda yakin ingin menolak permintaan reschedule',
            function(alasan) {
                // Callback dengan nilai input
                console.log('Alasan decline:', alasan);
                
                // Submit form dengan alasan
                const form = document.getElementById('declineForm');
                
                // Buat hidden input untuk alasan
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'alasan';
                hiddenInput.value = alasan;
                form.appendChild(hiddenInput);
                
                // Submit form
                form.submit();
            },
            {
                icon: '/icon/cross-circle.svg',
                label: 'Alasan',
                placeholder: 'Tulis alasan disini',
                rows: 4,
                required: true, // Wajib diisi
                confirmText: 'Ya',
                confirmClass: 'w-full px-6 py-2 bg-[#C90B0B] text-white rounded-lg font-semibold hover:bg-red-800 transition',
                cancelText: 'Batalkan'
            }
        );
    }
    
    if(buttonDecline) {
        buttonDecline.addEventListener('click', openDeclineRescheduleModal);
    }
    if(buttonApprove) {
        buttonApprove.addEventListener('click', openApproveModal);
    }
</script>