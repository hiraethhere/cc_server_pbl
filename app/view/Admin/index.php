<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <nav class="mb-6 text-sm flex">
        <span class="font-medium text-dark-overlay6">Dashboard</span>
    </nav>
    <h2 class="text-xl font-bold text-dark-overlay mb-6">Dashboard Laporan</h2>

    <!-- Section Booking yang Sedang Berjalan -->
    <div class="bg-background2 p-6 shadow-xl rounded-lg">
        <h2 class="text-xl font-semibold text-dark-overlay mb-4">Booking yang Sedang Berjalan</h2>
        
        <!-- Grid untuk kartu-kartu booking (2 kolom di layar besar, 1 di kecil) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            
            <!-- Kartu 1 -->
            <div class="p-4 rounded-lg shadow-md border border-dark-overlay5">
                <h3 class="text-lg font-medium text-dark-overlay">Ruang Lenter Edukasi</h3>
                <p class="text-sm text-dark-overlay7">10:00 - 13:00</p>
                <span class="inline-block bg-blue-overlay text-background2 px-2 py-1 rounded-xl text-sm font-semibold mt-2">6 Orang</span>
                <p class="text-sm text-dark-overlay mt-2">Penanggung Jawab: Muhammad Reza Arifin</p>
            </div>
            
            <!-- Kartu 2 -->
            <div class="p-4 rounded-lg shadow-md border border-dark-overlay5">
                <h3 class="text-lg font-medium text-dark-overlay">Ruang Lenter Edukasi</h3>
                <p class="text-sm text-dark-overlay7">10:00 - 13:00</p>
                <span class="inline-block bg-blue-overlay text-background2 px-2 py-1 rounded-xl text-sm font-semibold mt-2">6 Orang</span>
                <p class="text-sm text-dark-overlay mt-2">Penanggung Jawab: Muhammad Reza Arifin</p>
            </div>
            
            <!-- Kartu 3 -->
            <div class="p-4 rounded-lg shadow-md border border-dark-overlay5">
                <h3 class="text-lg font-medium text-dark-overlay">Ruang Lenter Edukasi</h3>
                <p class="text-sm text-dark-overlay7">10:00 - 13:00</p>
                <span class="inline-block bg-blue-overlay text-background2 px-2 py-1 rounded-xl text-sm font-semibold mt-2">6 Orang</span>
                <p class="text-sm text-dark-overlay mt-2">Penanggung Jawab: Muhammad Reza Arifin</p>
            </div>
            
            <!-- Kartu 4 -->
            <div class="p-4 rounded-lg shadow-md border border-dark-overlay5">
                <h3 class="text-lg font-medium text-dark-overlay">Ruang Lenter Edukasi</h3>
                <p class="text-sm text-dark-overlay7">10:00 - 13:00</p>
                <span class="inline-block bg-blue-overlay text-background2 px-2 py-1 rounded-xl text-sm font-semibold mt-2">6 Orang</span>
                <p class="text-sm text-dark-overlay mt-2">Penanggung Jawab: Muhammad Reza Arifin</p>
            </div>
            
            <!-- Kartu 5 -->
            <div class="p-4 rounded-lg shadow-md border border-dark-overlay5">
                <h3 class="text-lg font-medium text-dark-overlay">Ruang Lenter Edukasi</h3>
                <p class="text-sm text-dark-overlay7">10:00 - 13:00</p>
                <span class="inline-block bg-blue-overlay text-background2 px-2 py-1 rounded-xl text-sm font-semibold mt-2">6 Orang</span>
                <p class="text-sm text-dark-overlay mt-2">Penanggung Jawab: Muhammad Reza Arifin</p>
            </div>
            
            <!-- Kartu 6 -->
            <div class="p-4 rounded-lg shadow-md border border-dark-overlay5">
                <h3 class="text-lg font-medium text-dark-overlay">Ruang Lenter Edukasi</h3>
                <p class="text-sm text-dark-overlay7">10:00 - 13:00</p>
                <span class="inline-block bg-blue-overlay text-background2 px-2 py-1 rounded-xl text-sm font-semibold mt-2">6 Orang</span>
                <p class="text-sm text-dark-overlay mt-2">Penanggung Jawab: Muhammad Reza Arifin</p>
            </div>
            
        </div>
    </div>


    <div class="bg-background2 p-6 shadow-xl mt-12 rounded-lg">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold text-dark-overlay">Booking</h1>
                <button class="bg-blue-overlay hover:bg-blue-700 text-white1 font-medium px-3 py-2 rounded-lg flex items-center gap-2 shadow-md transition text-sm hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentcolor" d="m8 19.425l-2.25 2.25q-.3.3-.7.288t-.7-.313q-.275-.3-.287-.7t.287-.7L6.6 18H5.35q-.425 0-.712-.287T4.35 17t.288-.712T5.35 16H9q.425 0 .713.288T10 17v3.65q0 .425-.288.713T9 21.65t-.712-.287T8 20.65zM13 22q-.425 0-.712-.288T12 21v-4q0-1.25-.875-2.125T9 14H5q-.425 0-.712-.288T4 13V4q0-.825.588-1.412T6 2h8l6 6v12q0 .825-.587 1.413T18 22zm0-13h5l-5-5l5 5l-5-5z"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="flex items-center gap-3 pb-2">
            <!-- Filter Hari Ini -->
            <?php 
                $filter_id = 'Hari Ini'; 
                $label = 'Hari Ini'; 
                $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Meeting Kecil' => 'Ruang Meeting Kecil']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../template/filterDropDown.php';
                ?>
            <button type="button" 
                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition border border-gray-300 bg-white"
                    onclick="document.getElementById('jenis_anggota').value=''; document.getElementById('jurusan').value=''; document.getElementById('status').value=''; document.getElementById('filterForm').submit();">
                <img src="/icon/crossRed.svg" alt="clear" class="w-4 h-4">
            </button>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 gap-6 mt-6">
            <div class="grid grid-cols-3 gap-6">
                <!-- Total Booking -->
                <div class="bg-blue-overlay9 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Total Booking</p>
                    <p class="text-2xl font-bold mt-2">120 Orang</p>
                </div>

                <!-- Reschedule -->
                <div class="bg-blue-overlay7 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Reschedule</p>
                    <p class="text-2xl font-bold mt-2">6 Reschedule</p>
                </div>

                <!-- Selesai -->
                <div class="bg-green1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Selesai</p>
                    <p class="text-2xl font-bold mt-2">6 Booking</p>
                </div>
            </div>
            

            <div class="grid grid-cols-2 gap-6">
                <!-- Dibatalkan -->
                <div class="bg-red1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Dibatalkan</p>
                    <p class="text-2xl font-bold mt-2">1 Booking</p>
                </div>

                <!-- Dipinjam -->
                <div class="bg-blue-overlay5 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Dipinjam</p>
                    <p class="text-2xl font-bold mt-2">6 Booking</p>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-background2 p-6 shadow-xl mt-12 rounded-lg">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold text-dark-overlay">Anggota</h1>
                <button class="bg-blue-overlay hover:bg-blue-700 text-white1 font-medium px-3 py-2 rounded-lg flex items-center gap-2 shadow-md transition text-sm hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentcolor" d="m8 19.425l-2.25 2.25q-.3.3-.7.288t-.7-.313q-.275-.3-.287-.7t.287-.7L6.6 18H5.35q-.425 0-.712-.287T4.35 17t.288-.712T5.35 16H9q.425 0 .713.288T10 17v3.65q0 .425-.288.713T9 21.65t-.712-.287T8 20.65zM13 22q-.425 0-.712-.288T12 21v-4q0-1.25-.875-2.125T9 14H5q-.425 0-.712-.288T4 13V4q0-.825.588-1.412T6 2h8l6 6v12q0 .825-.587 1.413T18 22zm0-13h5l-5-5l5 5l-5-5z"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="flex items-center gap-3 pb-2">
            <!-- Filter Hari Ini -->
            <?php 
                $filter_id = 'Hari Ini'; 
                $label = 'Hari Ini'; 
                $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Meeting Kecil' => 'Ruang Meeting Kecil']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../template/filterDropDown.php';
                ?>
            <?php 
                $filter_id = 'Jurusan'; 
                $label = 'Jurusan'; 
                $options = ['TIK' => 'TIK', 'Teknik Elektro' => 'Teknik Elektro']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../template/filterDropDown.php';
                ?>
            <?php 
                $filter_id = 'Prodi'; 
                $label = 'Prodi'; 
                $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Meeting Kecil' => 'Ruang Meeting Kecil']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../template/filterDropDown.php';
                ?>
            <button type="button" 
                    class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition border border-gray-300 bg-white"
                    onclick="document.getElementById('jenis_anggota').value=''; document.getElementById('jurusan').value=''; document.getElementById('status').value=''; document.getElementById('filterForm').submit();">
                <img src="/icon/crossRed.svg" alt="clear" class="w-4 h-4">
            </button>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 gap-6 mt-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-blue-overlay9 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Total Anggota</p>
                    <p class="text-2xl font-bold mt-2">120 Orang</p>
                </div>

                <div class="bg-blue-overlay8 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Dosen</p>
                    <p class="text-2xl font-bold mt-2">20 Orang</p>
                </div>

                <div class="bg-blue-overlay7 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Mahasiswa</p>
                    <p class="text-2xl font-bold mt-2">200 Orang</p>
                </div>

                <div class="bg-blue-overlay5 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Tenaga Pendidik</p>
                    <p class="text-2xl font-bold mt-2">7 Orang</p>
                </div>

                <div class="bg-green1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Aktif</p>
                    <p class="text-2xl font-bold mt-2">210 Orang</p>
                </div>

                <div class="bg-red1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Tidak Aktif</p>
                    <p class="text-2xl font-bold mt-2">10 Orang</p>
                </div>   
            </div>
            

            <div class="grid grid-cols-2 gap-6">
                <div class="bg-blue-overlay4 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Menunggu Approval</p>
                    <p class="text-2xl font-bold mt-2">7 Orang</p>
                </div>
                
                <div class="bg-red1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Ditolak</p>
                    <p class="text-2xl font-bold mt-2">10 Orang</p>
                </div>

            </div>

            
            
        </div>
    </div>


    <div class="bg-background2 p-6 shadow-xl mt-12 rounded-lg">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold text-dark-overlay">Ruangan</h1>
                <button class="bg-blue-overlay hover:bg-blue-700 text-white1 font-medium px-3 py-2 rounded-lg flex items-center gap-2 shadow-md transition text-sm hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentcolor" d="m8 19.425l-2.25 2.25q-.3.3-.7.288t-.7-.313q-.275-.3-.287-.7t.287-.7L6.6 18H5.35q-.425 0-.712-.287T4.35 17t.288-.712T5.35 16H9q.425 0 .713.288T10 17v3.65q0 .425-.288.713T9 21.65t-.712-.287T8 20.65zM13 22q-.425 0-.712-.288T12 21v-4q0-1.25-.875-2.125T9 14H5q-.425 0-.712-.288T4 13V4q0-.825.588-1.412T6 2h8l6 6v12q0 .825-.587 1.413T18 22zm0-13h5l-5-5l5 5l-5-5z"/></svg>
                    Export
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-blue-overlay9 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Total Ruangan</p>
                    <p class="text-2xl font-bold mt-2">10 Ruangan</p>
                </div>

                <div class="bg-green1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Tersedia</p>
                    <p class="text-2xl font-bold mt-2">8 Ruangan</p>
                </div>

                <div class="bg-red1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Tidak Tersedia</p>
                    <p class="text-2xl font-bold mt-2">2 Ruangan</p>
                </div>

                <div class="bg-blue-overlay text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Ruangan Terpopuler</p>
                    <p class="text-2xl font-bold mt-2">Ruang Lentera Edukasi</p>
                </div>

                <div class="bg-yellow1 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Rating Terbaik</p>
                    <p class="text-2xl font-bold mt-2">Ruang Perancis (4.7/5)</p>
                </div>

                <!-- Reschedule -->
                <div class="bg-dark-overlay4 text-white1 p-6 rounded-2xl shadow-lg">
                    <p class="text-white1 text-sm font-medium">Rating Terendah</p>
                    <p class="text-2xl font-bold mt-2">Ruang Italy (3.2/5)</p>
                </div>
            </div>
        </div>
    </div>
        
</main>

</body>
</html>