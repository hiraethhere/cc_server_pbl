<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-[#1E68FB] hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <a href="/Admin/buatPeminjaman" class="text-[#1E68FB] hover:text-blue-700">Buat Peminjaman</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <span class="font-medium text-gray-900">Booking</span>
    </nav>

    <h2 class="text-2xl font-bold text-[#171E29]">Booking</h2>

    <div class="flex flex-col gap-8 lg:grid lg:grid-cols-3 lg:gap-8 mt-4">
        <div class="order-2 lg:order-none lg:col-span-2">
            <div class="bg-[#FBFCFF] rounded-2xl shadow-xl p-6 md:p-8">

                <form id="bookingForm" action="/Booking/handleBooking" method="POST">
                    <input type="hidden" name="id_room" value="<?= $detailRuangan['id_room'] ?>">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                Tanggal Pinjam <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="date" id="tanggalPinjam" name="tanggalPinjam" required
                                class="w-full p-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-sm">
                        </div>
                        <div class="flex items-end">
                            <div class="w-full">
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    Total Jam
                                </label>
                                <div id="totalTime" class="inline-flex items-center py-2 text-gray-800 font-bold rounded-full text-xl">
                                    0 Jam 0 Menit
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                Jam Mulai <span class="text-red-500 ml-1">*</span>
                            </label>
                            <select id="jamMulai" name="jamMulai" disabled required class="w-full p-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none text-sm">
                                <option value="" disabled selected hidden>Pilih jam mulai</option>
                            </select>
                        </div>
                        <div class="relative">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                Jam Selesai <span class="text-red-500 ml-1">*</span>
                            </label>
                            <select id="jamSelesai" name="jamSelesai" disabled required class="w-full p-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white appearance-none text-sm">
                                <option value="" disabled selected hidden>Pilih jam selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-4 flex items-center">
                            Daftar Anggota <span class="text-red-500 ml-1">*</span>
                            <span class="ml-2 text-xs text-gray-500 font-normal">(Minimal 2 Orang)</span>
                        </label>
                        <div id="membersContainer" class="space-y-4">
                            <div class="member-card p-4 bg-[#1E68FB10] rounded-xl border border-blue-200">
                                <div class="flex items-center mb-2">
                                    <span class="inline-flex items-center justify-center w-7 h-7 bg-[#1E68FB] text-white rounded-full text-xs font-bold">1</span>
                                    <span class="ml-2 font-medium text-sm text-[#1E68FB]">Penanggung Jawab</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <input type="text" maxlength="10" max="10" placeholder="2407411000" readonly
                                        class="nim-input w-full px-4 py-2.5 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                    <input type="text" placeholder="Muhammad Reza Arifin" name="nama[]" readonly
                                        class="nama-input w-full px-4 py-2.5 border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                </div>
                            </div>
                            <?php //for ($i= 0; $i < $detailRuangan['min_capacity'] - 1 ; $i++) :?>
                            <div class="member-card p-4 bg-gray-50 rounded-xl border border-gray-300">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center w-7 h-7 bg-gray-600 text-white rounded-full text-xs font-bold">2</span>
                                        <span class="ml-2 font-medium text-sm text-gray-800">Anggota</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <input type="text" maxlength="10" placeholder="NIM/NIP Anggota *" name="nim[]" required
                                        class="nim-input w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                    <input type="text" placeholder="Nama Lengkap Anggota" name="nama[]" readonly
                                        class="nama-input w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white text-sm">
                                </div>
                            </div>
                            <?php //endfor ?>
                        </div>
                        <button type="button" id="addMember" onclick="addMember()"
                                class="rounded-md mt-4 flex items-center bg-[#1E68FB10] text-[#1E68FB] hover:text-blue-700 hover:bg-blue-200 hover:cursor-pointer text-sm font-medium transition px-4 py-1">
                            Tambah Anggota
                            <img src="/icon/plusBlue.svg" alt="tambah Anggota" class="w-4 h-4 ml-3">
                        </button>
                    </div>

                    <div id="errorMessage" class="hidden mb-6 p-4 bg-red-50 border border-red-300 text-red-700 rounded-xl flex items-start text-sm">
                        <i class="fas fa-exclamation-triangle mt-0.5 mr-2"></i>
                        <span></span>
                    </div>

                    <div class="flex flex-row justify-between gap-6">
                        <button type="button"
                                class="w-full py-3 hover:cursor-pointer bg-white text-white font-bold rounded-xl hover:bg-emerald-600 transition shadow-sm text-base">
                            Batal
                        </button>
                        <button type="button"
                                class="w-full py-3 hover:cursor-pointer bg-[#38C55C] text-white font-bold rounded-xl hover:bg-emerald-600 transition shadow-sm text-base">
                            Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="order-1 lg:order-none lg:col-span-1 space-y-6 lg:sticky">
    
            <!-- KARTU RUANGAN (TIDAK STICKY) -->
            <div class="bg-[#FBFCFF] rounded-2xl shadow-lg overflow-hidden">
                <?php 
                    // Ambil URL gambar dari array PHP
                    //$imageUrl = "/img/" . $detailRuangan['img_room'];
                ?>

                <div class="h-56 relative overflow-hidden bg-gray-200" 
                    style="background-image: url('/img/DefaultRuangan.jpg'); 
                            background-size: cover; 
                            background-position: center;">
                    <!-- Overlay Rating (mirip gambar) -->
                    <div class="absolute bottom-2 left-2 flex items-center gap-3 px-5 py-1
                                    bg-[#171E2950]
                                    rounded-lg border border-gray-100 
                                    animate-in fade-in slide-in-from-bottom duration-500">
                        
                        <!-- Bintang -->
                        <div class="flex items-center gap-1">
                            <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-yellow-400 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-gray-300 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                        </div>

                        <!-- Teks rating -->
                        <div class="text-white">
                            <span class="text-xl font-bold">4/5</span>
                            <span class="text-sm font-medium text-white ml-2">(67 Respon)</span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <h3 class="font-bold text-2xl text-gray-800 mb-4">Ruang Apa aja deh</h3>
                    <div class="space-y-3 text-sm text-gray-600 mb-6">
                        <p class="flex items-center">
                            <img src="/icon/location.svg" alt="Lantai" class="w-5 h-5 mr-3">
                            lantai 2
                        </p>
                        <p class="flex items-center">
                            <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-5 h-5 mr-3">
                            4 - 5 orang
                        </p>
                    </div>
                    <details class="text-gray-600">
                        <summary class="text-base font-semibold cursor-pointer text-[#171E2980] hover:text-gray-400 flex items-center">
                            Deskripsi Ruangan
                            <img src="/icon/arrowDown.svg" alt="Deskripsi" class="w-4 h-4 ml-3">
                        </summary>
                        <p class="mt-3 text-sm leading-relaxed text-justify">
                            Lorem Ipsum
                        </p>
                    </details>
                </div>
            </div>
        </div>
    </div>
</main>

<script>const BASEURL = "<?= BASEURL ?>";</script>
<script src="/js/bookingRoom.js"></script>