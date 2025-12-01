<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-[#1E68FB] hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <span class="font-medium text-gray-900">Buat Peminjaman</span>
    </nav>

    <h2 class="text-2xl font-bold text-[#171E29]">Buat Peminjaman</h2>

    <!-- Header Ruangan Utama (Contoh Ruang Rapat) -->
    <div class="bg-[#FBFCFF] rounded-2xl shadow-lg overflow-hidden mb-8 border-b border-[#171E2970] mt-6">
        <div class="grid md:grid-cols-2 min-h-40 items-stretch">
            <!-- Teks Kiri -->
            <div class="p-5 flex flex-col justify-center flex-wrap">
                <h2 class="text-xl font-bold text-gray-800 mb-3">Ruang Rapat</h2>
                <p class="text-[#171E2990] mb-2 pb-2 leading-relaxed border-b border-[#171E29] text-sm">
                    Ruang bersih, tenang, dilengkapi wifi, cocok untuk belajar, rapat, dan aktivitas produktif.
                </p>
                <a href="/Admin/bookingRuangRapat" class="w-full mt-1">
                    <button class="px-6 py-2 bg-[#1E68FB] hover:bg-blue-700 text-white font-semibold text-sm rounded-md shadow-md hover:shadow-lg transition hover:cursor-pointer w-full">
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

    <hr class="text-[#171E29]">

    <!-- Search Bar -->
    <div class="pt-6 pb-2">
        <div class="relative max-w-xs">
            <div class="absolute inset-y-0 pl-3 flex items-center pointer-events-none">
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
                    <hr class="border-t border-[#171E29] mb-4">
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
                    <a href="/Admin/bookingRuangan"
                        class="flex items-center justify-center w-full bg-[#1E68FB] text-white text-center rounded-xl font-semibold text-sm hover:bg-[#38C55C] transition duration-200 py-2">
                        Booking
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
                    <hr class="border-t border-[#171E29] mb-4">
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
                        Booking
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
                    <hr class="border-t border-[#171E29] mb-4">
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
                        Booking
                    </a>
                </div>
            </div>
        </div>
    </div>

        
    
</main>