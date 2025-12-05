<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-blue-overlay hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="font-medium text-dark-overlay6">Buat Peminjaman</span>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Buat Peminjaman</h2>

    <!-- Header Ruangan Utama (Contoh Ruang Rapat) -->
    <div class="bg-background2 rounded-2xl shadow-lg overflow-hidden mb-8 mt-6">
        <div class="grid md:grid-cols-2 min-h-40 items-stretch">
            <!-- Teks Kiri -->
            <div class="p-5 flex flex-col justify-center flex-wrap">
                <h2 class="text-xl font-bold text-black mb-3">Ruang Rapat</h2>
                <p class="text-dark-overlay8 mb-2 pb-2 leading-relaxed border-b border-dark-overlay text-sm">
                    Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.
                </p>
                <a href="/Admin/bookingRuangRapat" class="w-full mt-1">
                    <button class="px-6 py-2 bg-blue-overlay hover:bg-blue-700 text-white font-semibold text-sm rounded-md shadow-md hover:shadow-lg transition hover:cursor-pointer w-full">
                        Booking
                    </button>
                </a>
            </div>
            <!-- Gambar Kanan -->
            <div class="bg-gray-100 h-40">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Rapat" class="w-full h-auto object-cover object-center">
            </div>
        </div>
    </div>

    <hr class="text-dark-overlay7">

    <!-- Search Bar -->
    <div class="pt-6 pb-2">
        <div class="relative max-w-xs">
            <div class="absolute inset-y-0 pl-3 flex items-center pointer-events-none">
                <div>
                    <?= icon('search', 'w-5 h-5') ?>
                </div>
            </div>
            <input type="text" id="search-input" placeholder="Cari"
                class="block w-full pl-10 pr-10 py-2 border border-dark-overlay4 rounded-lg 
                        bg-white text-dark-overlay7 placeholder-dark-overlay7 text-sm
                        focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent 
                        transition duration-150">
            <button type="button" id="clear-search" 
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-dark-overlay7 hover:text-dark-overlay hidden">
                <div>
                    <?= icon('cross', 'w-4 h-4 hover:cursor-pointer') ?>
                </div>
            </button>
        </div>
    </div>

    <!-- Rooms Grid -->
    <div id="rooms-container" class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mb-8 mt-6 md:gap-10 lg:gap-12 gap-5">
        <div class="bg-background2 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 from-dark-overlay4 to-dark-overlay7">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-rows-[2fr_1fr] px-5 p-3">
                <div>
                    <h3 class="font-bold text-lg text-black3 mb-1">Ruang Perancis</h3>
                    <p class="text-dark-overlay8 mb-2 text-justify text-sm">Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.</p>
                    <hr class="border-t border-dark-overlay">
                </div>
                <div class="grid grid-cols-[1fr_2fr] mb-2 md:text-md text-xs">
                    <div class="flex items-center justify-start w-full">
                        <div class="flex items-center gap-2 text-black2">
                            <?= icon('userOutline', 'w-5 h-5 mr-2') ?>        
                        </div>
                        <span class="inline-flex items-center justify-center lg:flex-row flex-col">3-4 orang </span>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <a class="bg-green-overlay4 flex-row flex-wrap inline-flex justify-center py-1 px-4 rounded-md mt-2">
                            <div class="flex items-center gap-2 text-green1">
                                <?= icon('circleFill', 'w-3 h-3 mr-2') ?>        
                            </div>
                            <h2 class="text-sm inline-block font-medium text-green1">Tersedia</h2>
                        </a>
                    </div>           
                </div>
                <div class="w-full flex justify-end">
                    <a href="/Admin/bookingRuangan"
                        class="flex items-center justify-center w-full bg-blue-overlay text-white text-center rounded-xl font-semibold text-sm hover:bg-green1 transition duration-200 py-2">
                        Booking
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-background2 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 from-dark-overlay4 to-dark-overlay7">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-rows-[2fr_1fr] px-5 p-3">
                <div>
                    <h3 class="font-bold text-lg text-black3 mb-1">Ruang Perancis</h3>
                    <p class="text-dark-overlay8 mb-2 text-justify text-sm">Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.</p>
                    <hr class="border-t border-dark-overlay">
                </div>
                <div class="grid grid-cols-[1fr_2fr] mb-2 md:text-md text-xs">
                    <div class="flex items-center justify-start w-full">
                        <div class="flex items-center gap-2 text-black2">
                            <?= icon('userOutline', 'w-5 h-5 mr-2') ?>        
                        </div>
                        <span class="inline-flex items-center justify-center lg:flex-row flex-col">3-4 orang </span>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <a class="bg-green-overlay4 flex-row flex-wrap inline-flex justify-center py-1 px-4 rounded-md mt-2">
                            <div class="flex items-center gap-2 text-green1">
                                <?= icon('circleFill', 'w-3 h-3 mr-2') ?>        
                            </div>
                            <h2 class="text-sm inline-block font-medium text-green1">Tersedia</h2>
                        </a>
                    </div>           
                </div>
                <div class="w-full flex justify-end">
                    <a href="/Admin/bookingRuangan"
                        class="flex items-center justify-center w-full bg-blue-overlay text-white text-center rounded-xl font-semibold text-sm hover:bg-green1 transition duration-200 py-2">
                        Booking
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-background2 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 from-dark-overlay4 to-dark-overlay7">
                <img src="/img/DefaultRuangan.jpg" 
                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
            </div>
            <div class="grid grid-rows-[2fr_1fr] px-5 p-3">
                <div>
                    <h3 class="font-bold text-lg text-black3 mb-1">Ruang Perancis</h3>
                    <p class="text-dark-overlay8 mb-2 text-justify text-sm">Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.</p>
                    <hr class="border-t border-dark-overlay">
                </div>
                <div class="grid grid-cols-[1fr_2fr] mb-2 md:text-md text-xs">
                    <div class="flex items-center justify-start w-full">
                        <div class="flex items-center gap-2 text-black2">
                            <?= icon('userOutline', 'w-5 h-5 mr-2') ?>        
                        </div>
                        <span class="inline-flex items-center justify-center lg:flex-row flex-col">3-4 orang </span>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <a class="bg-green-overlay4 flex-row flex-wrap inline-flex justify-center py-1 px-4 rounded-md mt-2">
                            <div class="flex items-center gap-2 text-green1">
                                <?= icon('circleFill', 'w-3 h-3 mr-2') ?>        
                            </div>
                            <h2 class="text-sm inline-block font-medium text-green1">Tersedia</h2>
                        </a>
                    </div>           
                </div>
                <div class="w-full flex justify-end">
                    <a href="/Admin/bookingRuangan"
                        class="flex items-center justify-center w-full bg-blue-overlay text-white text-center rounded-xl font-semibold text-sm hover:bg-green1 transition duration-200 py-2">
                        Booking
                    </a>
                </div>
            </div>
        </div>

        
    </div>
</main>

<script src="/js/search.js" defer></script>