    <main class="flex-1 p-8 overflow-y-auto bg-background1">
        <nav class="flex mb-6 text-sm text-dark-overlay6">
            <a href="/Admin/Anggota" class="text-blue-overlay hover:text-blue-700">Data Anggota</a>
            <span class="mx-2">
                <div>
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
            <a href="/Admin/Anggota" class="text-blue-overlay hover:text-blue-700">Approval Anggota</a>
            <span class="mx-2">
                <div>
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
            <span class="font-medium hover:cursor-pointer">Detail Data</span>
        </nav>

        <h2 class="text-xl font-bold text-dark-overlay mb-6">Detail Data</h2>

    
        <div class="bg-background2 rounded-2xl w-full shadow-xl p-6">
                <div class="grid gap-4">
                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Nama</label>
                        <div class="relative">
                            <input type="Text" id="Nama" name="Nama" value="<?= htmlspecialchars($user['username'] ?? '-') ?>" readonly
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-dark-overlay">
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Jurusan/Unit Kerja</label>
                        <div class="relative">
                            <input type="Text" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($user['jurusan_unit'] ?? '-')  ?>" readonly
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-dark-overlay">
                        </div>
                    </div>

                    <div class="flex flex-row gap-12 justify-between">
                        <div class="mb-1 w-full">
                            <label class="block text-sm font-medium text-dark-overlay7 mb-2">Jenis Anggota</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($user['role_name'] ?? '-')  ?>" readonly
                                    class="w-full px-4 py-2 border border-dark-overlay4 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-dark-overlay">
                            </div>
                        </div>
                        <div class="mb-1 w-full">
                            <label class="block text-sm font-medium text-dark-overlay7 mb-2">Email</label>
                            <div class="relative">
                                <input type="Email" id="Email" name="Email" value="<?= htmlspecialchars($user['email'] ?? '-')  ?>" readonly
                                    class="w-full px-4 py-2 border border-dark-overlay4 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-dark-overlay">
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">NIP</label>
                        <div class="relative">
                            <input type="Text" id="NIM" name="NIM" value="<?= htmlspecialchars($user['nomor_induk'] ?? '-')  ?>" readonly
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-dark-overlay">
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Tanggal Daftar</label>
                        <div class="relative">
                            <input type="text" id="TanggalDaftar" name="Tanggal Daftar" value="<?= htmlspecialchars(tanggal_indonesia($user['created_at']) ?? '-')  ?>" readonly
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm text-dark-overlay">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-12 mt-2">
                        <button type="button" id="buttonDecline" class="px-4 py-2 bg-red1 text-white rounded-lg font-medium hover:bg-red-800 transition hover:cursor-pointer">Decline</button>
                        <button type="button" id="buttonApprove" class="px-4 py-2 bg-green1 text-white rounded-lg font-medium hover:bg-green-600 transition hover:cursor-pointer">Approve</button>
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
                icon: <?= json_encode(icon("usersAdmin", "w-24 h-24 text-green1")) ?>,
                confirmText: 'Ya',
                confirmClass: 'w-full px-6 py-2 bg-green1 text-white rounded-lg font-semibold hover:bg-green-600 transition',
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
                icon: <?= json_encode(icon("usersAdmin", "w-24 h-24 text-red1")) ?>,
                label: 'Alasan',
                value: 'Tulis alasan disini',
                rows: 4,
                required: true, // Wajib diisi
                confirmText: 'Ya',
                confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-red-800 transition',
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