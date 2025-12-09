<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-blue-overlay hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <a href="/Admin/buatBooking" class="text-blue-overlay hover:text-blue-700">Buat Peminjaman</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="font-medium text-dark-overlay6">Booking Ruang Rapat</span>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Booking Ruang Rapat</h2>

    <!-- Form Card -->
    <div class="bg-background2 rounded-lg shadow-sm p-6 mt-4">
        <h2 class="text-2xl font-semibold text-dark-overlay mb-4">Ruang Rapat</h2>

        <form class="space-y-4" id="bookingForm" action="/admin/handleExternalBooking" method="POST" enctype="multipart/form-data">
             <input type="hidden" id="id_room" name="id_room" value="<?= $rapat['id_room'] ?>">
            
            <!-- Email Perwakilan -->
            <div>
                <label class="block text-sm font-medium text-dark-overlay mb-2">Email Perwakilan</label>
                <input type="email" placeholder="Email perwakilan" name="email" 
                        class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Jumlah Orang & Nama Instansi -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-dark-overlay mb-2">Jumlah Orang</label>
                    <input type="number" placeholder="Jumlah Orang" name="jumlah" 
                            class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-overlay mb-2">Nama Instansi/Jurusan/Unit Kerja</label>
                    <input type="text" placeholder="Nama Instansi" name="instansi"
                            class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Tujuan Peminjaman -->
            <div>
                <label class="block text-sm font-medium text-dark-overlay mb-2">Tujuan Peminjaman</label>
                <textarea placeholder="Tujuan Peminjaman" rows="4" name="tujuan"
                            class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"></textarea>
            </div>

            <!-- Tanggal, Jam Mulai, Jam Selesai -->
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-dark-overlay mb-2">Tanggal Peminjaman</label>
                    <input type="date" id="tanggalPinjam" name="tanggalPinjam"
                            class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-overlay mb-2">Jam Mulai</label>
                    <input type="time" id="jamMulai" name="jamMulai" disabled selected
                            class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-dark-overlay mb-2">Jam Selesai</label>
                    <input type="time" id="jamSelesai" name="jamSelesai" disabled selected
                            class="w-full px-4 py-2 border border-dark-overlay4 text-dark-overlay rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Upload Surat -->
            <div class="flex items-center justify-between w-full mb-2">
                <label for="file_proposal" 
                    class="relative flex items-center w-full pl-4 border border-dark-overlay4 rounded-l-lg shadow-xs cursor-pointer hover:bg-dark-overlay1 focus-within:ring-2 focus-within:ring-blue-500 transition-all duration-200">

                    <div class="flex items-center flex-1 space-x-3">
                        <div>
                            <?= icon('fileUpload', 'w-6 h-6 flex-shrink-0 text-black') ?>
                        </div>
                        <span id="fileNameDisplay" class=" text-sm truncate">
                            Belum ada file yang dipilih
                        </span>
                    </div>

                    <span class="flex items-center px-6 py-3 ml-auto text-sm font-medium text-white bg-blue-overlay hover:bg-blue-700 transition">
                        <div>
                            <?= icon('paperClip', 'w-4 h-4 mr-2') ?>
                        </div>
                        Pilih File
                    </span>

                    <button type="button" 
                            class="clear-file absolute right-3 top-1/2 -translate-y-1/2 opacity-0 pointer-events-none transition-all duration-200 z-10">
                        <div>
                            <?= icon('cross', 'w-6 h-6 hover:scale-125 transition-transform') ?>
                        </div>
                    </button>
                    <input type="file" name="file_proposal" id="file_proposal" class="hidden">
                </label>
            </div>

            <!-- Buttons -->
            <div class="grid grid-cols-2 gap-4 pt-4">
                <button type="button" class="px-6 py-3 border border-dark-overlay4 text-dark-overlay7 rounded-lg font-semibold hover:bg-gray-200 transition hover:cursor-pointer">
                    Batal
                </button>
                <button type="submit" class="px-6 py-3 bg-green1 text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer">
                    Booking
                </button>
            </div>
        </form>
    </div>

</main>
<script> const BASEURL = '<?= BASEURL ?>'</script>    
<script src="/js/bookingRapat.js"></script>