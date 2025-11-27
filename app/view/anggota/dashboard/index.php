
    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold text-black mb-8 text-center">Ruangan Yang Bisa Dipinjam</h2>

        <!-- Capacity Filters -->
        <div class="flex justify-start mb-6 space-x-4 mx-5">
            <button id="filter-all" 
                    class="px-4 py-2 bg-[#1E68FB] text-white rounded-full font-medium text-sm hover:bg-blue-700 transition duration-200 hover:cursor-pointer">
                Semua
            </button>
            <button id="filter-2-4" 
                    class="px-4 py-2 bg-white text-[#171E29] rounded-full font-medium text-sm hover:bg-gray-300 transition duration-200 hover:cursor-pointer">
                2-4 Orang
            </button>
            <button id="filter-4-8" 
                    class="px-4 py-2 bg-white text-[#171E29] rounded-full font-medium text-sm hover:bg-gray-300 transition duration-200 hover:cursor-pointer">
                4-8 Orang
            </button>
        </div>

        <!-- Rooms Grid -->
        <div id="rooms-container" class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mb-8 mx-5 md:gap-10 lg:gap-12 gap-5">
            <!-- **************************************************
            INI UNTUK CARD RUANGAN
            ******************************************************* -->
            <?php foreach($ruangan as $r) : ?>

            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <div class="relative h-48 from-gray-300 to-gray-400">
                    <img src="/img/<?= $r['img_room'] ?>" 
                        alt="Ruang Lentera Edukasi" class="w-full h-full object-cover">
                </div>
                <div class="grid grid-rows-[2fr_1fr] px-5 pt-5 pb-3">
                    <div>
                        <h3 class="font-bold text-lg text-[#1A1A1A] mb-2"><?= $r['room_name'] ?></h3>
                        <p class="text-dark-overlay/80 mb-4 text-justify text-sm"><?= $r['short_description'] ?></p>
                        <hr class="border-t border-[#171E29] mb-4">
                    </div>
                    <div class="grid grid-cols-2 items-center text-sm text-gray-600">
                        <div class="grid grid-cols-2 gap-1 justify-items-start mb-2 md:text-md text-xs">
                            <div class="flex md:flex-col lg:flex-row flex-col justify-center items-center md:mr-2">
                                <img src="/icon/location.svg" alt="lantai ruangan" class="w-6 h-6">
                                <span class="inline-flex items-center lg:flex-row flex-col text-[#1E1E1E]">
                                    Lantai <?= $r['floor'] ?>
                                </span>
                            </div>
                            <div class="flex md:flex-col lg:flex-row flex-col justify-center items-center text-[#1E1E1E]">                            
                                <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-6 h-6">
                                <span class="inline-flex items-center lg:flex-row flex-col"><?= $r['min_capacity'] . '-' . $r['max_capacity']  ?> orang </span>
                            </div>                          
                        </div>
                        <div class="w-full flex justify-end">
                            <a href="/Dashboard/Booking/<?= $r['id_room'] ?>"
                                class="flex items-center justify-center w-5/6 bg-[#1E68FB] text-white text-center rounded-xl font-semibold text-xs hover:bg-[#38C55C] transition duration-200 py-3">
                                Booking Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                <?php endforeach ?>
        </div>
    </main>