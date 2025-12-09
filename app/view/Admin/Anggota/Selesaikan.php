    <main class="flex-1 p-8 overflow-y-auto bg-background1">
        <nav class="flex mb-6 text-sm text-dark-overlay6">
            <a href="/Admin/Anggota" class="text-blue-overlay hover:text-blue-700">Data Anggota</a>
            <span class="mx-2">
                <div>
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
            <a href="/Admin/Anggota" class="text-blue-overlay hover:text-blue-700">Daftar Anggota</a>
            <span class="mx-2">
                <div>
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
            <span class="text-dark-overlay6 font-medium hover:cursor-pointer">Detail Data</span>
        </nav>

        <h2 class="text-xl font-bold text-dark-overlay mb-6">Detail Data</h2>

        <div class="flex flex-row gap-16">
            <div class="bg-background2 rounded-2xl w-full shadow-xl p-6 grid grid-cols-[2fr_1fr] gap-8">
                <div class="grid grid-cols-1 gap-4">
                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Nama</label>
                        <div class="relative">
                            <input type="Text" id="Nama" name="Nama" value="<?= htmlspecialchars($user['username']) ?? '-' ?>" readonly
                                class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div class="flex flex-row gap-6 justify-between">
                        <div class="mb-1 w-full">
                            <label class="block text-sm font-medium text-dark-overlay7 mb-2">Jurusan</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($user['jurusan_unit']) ?? '-' ?>" readonly
                                    class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1 w-full">
                            <label class="block text-sm font-medium text-dark-overlay7 mb-2">Prodi</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($user['prodi']) ?? '-' ?>" readonly
                                    class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row gap-6 justify-between">
                        <div class="mb-1 w-full">
                            <label class="block text-sm font-medium text-dark-overlay7 mb-2">Jenis Anggota</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($user['role_name']?? '-')   ?>" readonly
                                    class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1 w-full">
                            <label class="block text-sm font-medium text-dark-overlay7 mb-2">Email</label>
                            <div class="relative">
                                <input type="Email" id="Email" name="Email" value="<?= htmlspecialchars($user['email']) ?? '-' ?>" readonly
                                    class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">NIM</label>
                        <div class="relative">
                            <input type="Text" id="NIM" name="NIM" value="<?= htmlspecialchars($user['nomor_induk']) ?? '-'?>" readonly
                                class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                        </div>
                    </div>

                    <div class="mb-1">
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Tanggal Daftar</label>
                        <div class="relative">
                            <input type="text" id="TanggalDaftar" name="Tanggal Daftar" value="<?= htmlspecialchars($createdDate) ?? '-' ?>" readonly
                                class="w-full bg-background2 px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
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
                <!-- Container Gambar dengan Zoom Controls -->
                <div class="flex flex-col justify-center items-center rounded-2xl py-4">
                    <div class="px-8 py-4 border border-dark-overlay4 rounded-xl min-w-sm">
                        <p class="text-sm text-center pb-2 text-dark-overlay7 font-semibold border-b border-dark-overlay4">
                            Bukti foto akun KubacaPNJ
                        </p>
                        
                        <!-- Image Container dengan Zoom -->
                        <div class="relative mt-2">
                            <!-- Container untuk gambar yang bisa di-zoom -->
                            <div 
                                id="imageWrapper" 
                                class="relative overflow-hidden rounded-lg border border-dark-overlay4"
                                style="width: auto; height: 370px; max-width: 100%;"
                            >
                                <img 
                                    id="zoomableImage" 
                                    src="<?= !empty($user['kubaca_photo']) 
                                        ? BASEURL . 'File/showBukti/' . $user['kubaca_photo'] 
                                        : BASEURL . 'img/Profil-Kubaca_Contoh.jpg' ?>"
                                    class="w-full h-full object-contain transition-transform cursor-grab"
                                    style="transform: scale(1) translate(0px, 0px); transform-origin: center center;"
                                    draggable="false"
                                    alt="Bukti Akun KubacaPNJ"
                                >
                            </div>
                            
                            <!-- Zoom Controls (pojok kanan atas) -->
                            <div class="absolute top-2 right-2 flex flex-col gap-1 bg-black bg-opacity-60 rounded-lg p-1 z-10">
                                <!-- Zoom In -->
                                <button 
                                    id="zoomInBtn"
                                    class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-0.5 rounded transition-all"
                                    title="Zoom In (+ / Scroll Up)"
                                >
                                    <div class="text-dark-overlay flex items-center justify-center">
                                        <?= icon('plusZoom', 'w-5 h-5') ?>
                                    </div>
                                </button>
                                
                                <!-- Zoom Level Display -->
                                <div class="text-white text-xs text-center px-1 py-0.5 bg-black bg-opacity-40 rounded">
                                    <span id="zoomPercent">100%</span>
                                </div>
                                
                                <!-- Zoom Out -->
                                <button 
                                    id="zoomOutBtn"
                                    class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-0.5 rounded transition-all"
                                    title="Zoom Out (- / Scroll Down)"
                                >
                                    <div class="text-dark-overlay flex items-center justify-center">
                                        <?= icon('minusZoom', 'w-5 h-5') ?>
                                    </div>
                                </button>
                                
                                <!-- Reset Zoom -->
                                <button 
                                    id="resetBtn"
                                    class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-0.5 rounded transition-all"
                                    title="Reset Zoom (Double Click)"
                                >
                                    <div class="text-dark-overlay flex items-center justify-center">
                                        <?= icon('refresh', 'w-5 h-5') ?>
                                    </div>
                                </button>
                            </div>
                            
                            <!-- Hint Text (muncul saat zoom > 100%) -->
                            <div 
                                id="dragHint" 
                                class="absolute bottom-2 left-1/2 transform -translate-x-1/2 bg-black bg-opacity-60 text-white text-xs px-3 py-1 rounded-full opacity-0 transition-opacity pointer-events-none"
                            >
                                Drag untuk menggeser gambar
                            </div>
                        </div>
                    </div>                   
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


<script src="/js/imageZoom.js" defer></script>
<link rel="stylesheet" href="/css/zoom.css">