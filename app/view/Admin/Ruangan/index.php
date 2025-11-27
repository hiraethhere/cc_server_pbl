<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <a href="/Admin/Ruangan" class="text-[#1E68FB] hover:text-blue-700">Data Ruangan</a>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#171E29]">Data Ruangan</h2>
        <a href=""
           class="flex items-center gap-2 px-3 py-1.5 bg-[#1E68FB] hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow-sm hover:shadow-md transition duration-200">
            Tambah Ruangan
            <img src="/icon/plus.svg" alt="Tambah Anggota" class="w-4 h-4">
        </a>
    </div>

    <div class="flex justify-between items-center">
        <form method="POST" id="filterForm">
            <input type="hidden" name="tab" value="<?= $tab ?>">

            <div class="flex items-center gap-3 pt-6 pb-2 bg-gray-50 ">
                <?php 
                $filter_id = 'status'; 
                $label = 'status'; 
                $options = ['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia']; 
                $current_values = $_GET[$filter_id] ?? ''; 
                include __DIR__ . '/../../template/filterDropDown.php';
                ?>
                <button type="button" 
                        class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition border border-gray-300 bg-white"
                        onclick="document.getElementById('jenis_anggota').value=''; document.getElementById('jurusan').value=''; document.getElementById('status').value=''; document.getElementById('filterForm').submit();">
                    <img src="/icon/crossRed.svg" alt="clear" class="w-4 h-4">
                </button>
            </div>
        </form>

        <!-- Search Bar -->
        <div class="pt-6 pb-2">
            <div class="relative max-w-md ml-auto">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <img src="/icon/search.svg" alt="search" class="w-5 h-5">
                </div>
                <input type="text" id="search-input" placeholder="Cari"
                    class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg 
                            bg-white text-gray-900 placeholder-gray-400 text-sm
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                            transition duration-150">
                <button type="button" id="clear-search" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 hidden">
                    <img src="/icon/silang.svg" alt="clear" classs="w-4 h-4">
                </button>
            </div>
        </div>
    </div>

    <!-- Rooms Grid -->
    <div id="rooms-container" class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mb-8 mt-6 md:gap-10 lg:gap-12 gap-5">
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 from-gray-300 to-gray-400">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-rows-[2fr_1fr] px-5 pt-5 pb-3">
                <div>
                    <h3 class="font-bold text-lg text-[#1A1A1A] mb-2">Ruang Perancis</h3>
                    <p class="text-dark-overlay/80 mb-4 text-justify text-sm">Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.</p>
                    <hr class="border-t border-[#171E2950] mb-4">
                </div>
                <div class="flex items-center justify-between mb-2 md:text-md text-xs">
                    <div class="flex items-center justify-start w-full">
                        <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-6 h-6 mr-2">
                        <span class="inline-flex items-center justify-center lg:flex-row flex-col">3-4 orang </span>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <a class="bg-[#38C55C40] flex flex-row flex-wrap py-2 px-4 justify-between text-white rounded-md mt-2 w-2/3">
                            <img src="/icon/circleGreen.svg" alt="Status" class="h-5 w-5">
                            <h2 class="text-sm inline-block font-semibold text-[#38C55C]">Tersedia</h2>
                        </a>
                    </div>           
                </div>
                <div class="w-full flex justify-end">
                    <a href="#"
                        class="flex items-center justify-center w-full bg-[#1E68FB] text-white text-center rounded-xl font-semibold text-sm hover:bg-[#38C55C] transition duration-200 py-2">
                        Edit Ruangan
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 from-gray-300 to-gray-400">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-rows-[2fr_1fr] px-5 pt-5 pb-3">
                <div>
                    <h3 class="font-bold text-lg text-[#1A1A1A] mb-2">Ruang Perancis</h3>
                    <p class="text-dark-overlay/80 mb-4 text-justify text-sm">Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.</p>
                    <hr class="border-t border-[#171E2950] mb-4">
                </div>
                <div class="flex items-center justify-between mb-2 md:text-md text-xs">
                    <div class="flex items-center justify-start w-full">
                        <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-6 h-6 mr-2">
                        <span class="inline-flex items-center justify-center lg:flex-row flex-col">3-4 orang </span>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <a class="bg-[#38C55C40] flex flex-row flex-wrap py-2 px-4 justify-between text-white rounded-md mt-2 w-2/3">
                            <img src="/icon/circleGreen.svg" alt="Status" class="h-5 w-5">
                            <h2 class="text-sm inline-block font-semibold text-[#38C55C]">Tersedia</h2>
                        </a>
                    </div>           
                </div>
                <div class="w-full flex justify-end">
                    <a href="#"
                        class="flex items-center justify-center w-full bg-[#1E68FB] text-white text-center rounded-xl font-semibold text-sm hover:bg-[#38C55C] transition duration-200 py-2">
                        Edit Ruangan
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 from-gray-300 to-gray-400">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-rows-[2fr_1fr] px-5 pt-5 pb-3">
                <div>
                    <h3 class="font-bold text-lg text-[#1A1A1A] mb-2">Ruang Perancis</h3>
                    <p class="text-dark-overlay/80 mb-4 text-justify text-sm">Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.</p>
                    <hr class="border-t border-[#171E2950] mb-4">
                </div>
                <div class="flex items-center justify-between mb-2 md:text-md text-xs">
                    <div class="flex items-center justify-start w-full">
                        <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-6 h-6 mr-2">
                        <span class="inline-flex items-center justify-center lg:flex-row flex-col">3-4 orang </span>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <a class="bg-[#38C55C40] flex flex-row flex-wrap py-2 px-4 justify-between text-white rounded-md mt-2 w-2/3">
                            <img src="/icon/circleGreen.svg" alt="Status" class="h-5 w-5">
                            <h2 class="text-sm inline-block font-semibold text-[#38C55C]">Tersedia</h2>
                        </a>
                    </div>           
                </div>
                <div class="w-full flex justify-end">
                    <a href="#"
                        class="flex items-center justify-center w-full bg-[#1E68FB] text-white text-center rounded-xl font-semibold text-sm hover:bg-[#38C55C] transition duration-200 py-2">
                        Edit Ruangan
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>