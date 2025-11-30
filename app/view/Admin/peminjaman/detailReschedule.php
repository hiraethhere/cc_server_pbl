<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-[#1E68FB] hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <a href="Admin/Peminjaman" class="font-medium text-gray-900">Hari ini</a>
        <span class="mx-2 text-gray-400">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <span class="font-medium text-gray-900">Detail Reschedule</span>
    </nav>

    <h2 class="text-2xl font-bold text-[#171E29]">Detail Reschedule</h2>

    <div class="flex flex-col gap-8 lg:grid lg:grid-cols-[3fr_2fr] lg:gap-8 mt-5">
        <div class="bg-[#FBFCFF] rounded-2xl shadow-lg p-6 md:p-8 w-full">

            <!-- Nama Ruangan -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-gray-700 mb-2">Nama Ruangan</p>
                <span 
                    class="block w-full px-4 py-2 bg-white border border-[#888D93] rounded-lg text-gray-800">
                    Ruang Lentera Edukasi
                </span>
            </div>

            <!-- Waktu Peminjaman -->
            <div class="mb-5 w-full">
                <label class="block text-sm font-medium text-gray-700 mb-2">Waktu Peminjaman</label>
                <div class="flex flex-row justify-between gap-3 border border-[#5C616A] p-4 rounded-lg flex-wrap">
                    <div class="flex-1">
                        <p class="mb-2">Tanggal</p>
                        <span
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            5 September 2025
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2">Jam Mulai</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            13:00
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2">Jam Selesai</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            15:00
                        </span>
                    </div>
                </div>
            </div>

            <!-- Penanggung Jawab -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-gray-700 mb-2">Penanggung Jawab</p>
                <div class="flex flex-col justify-between gap-3 border border-[#5C616A] p-4 rounded-lg flex-wrap">
                    <div class="flex-1">
                        <p class="mb-2">Nama</p>
                        <span
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2">NIM</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            2407411000
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2">Jurusan</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            Teknik Informatika dan Komputer
                        </span>
                    </div>
                </div>
            </div>

            <!-- Informasi Anggota -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-gray-700 mb-2">Informasi Anggota</p>
                <div class="flex flex-col justify-between gap-3 border border-[#5C616A] p-4 rounded-lg flex-wrap">
                    <div class="flex-1">
                        <span
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                    <div class="flex-1">
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                    <div class="flex-1">
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-[#888D93] rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                </div>
            </div>

            <!-- Jumlah Orang -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-gray-700 mb-2">Jumlah Orang</p>
                <span 
                    class="block w-full px-4 py-2 bg-white border border-[#888D93] rounded-lg text-gray-800">
                    4
                </span>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-4 pt-6">
                <button class="flex-1 bg-[#C90B0B] hover:bg-red-700 text-white font-medium py-2.5 rounded-lg transition hover:cursor-pointer">
                Decline
                </button>
                <button class="flex-1 bg-[#38C55C] hover:bg-green-700 text-white font-medium py-2.5 rounded-lg transition hover:cursor-pointer">
                Approve
                </button>
            </div>
        </div>

        <div class="order-1 lg:order-none lg:col-span-1 space-y-6 lg:sticky min-w-2/5">

            <!-- KARTU RUANGAN (TIDAK STICKY) -->
            <div class="bg-[#FBFCFF] rounded-2xl shadow-lg overflow-hidden">

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
                        <h3 class="font-bold text-2xl text-gray-800 mb-4">Ruang Lentera Edukasi</h3>
                        <div class="space-y-3 text-sm text-gray-600 mb-6">
                            <p class="flex items-center">
                                <img src="/icon/location.svg" alt="Lantai" class="w-5 h-5 mr-3">
                                lantai 2
                            </p>
                            <p class="flex items-center">
                                <img src="/icon/userOutline.svg" alt="Jumlah Orang" class="w-5 h-5 mr-3">
                                4 - 8 orang
                            </p>
                        </div>
                        <details class="text-gray-600">
                            <summary class="text-base font-semibold cursor-pointer text-[#171E2980] hover:text-gray-400 flex items-center">
                                Deskripsi Ruangan
                                <img src="/icon/arrowDown.svg" alt="Deskripsi" class="w-4 h-4 ml-3">
                            </summary>
                            <p class="mt-3 text-sm leading-relaxed text-justify">
                                Ruangan (...) dengan luas xx m² yang berada di lantai x Perpustakaan Politeknik Negeri Jakarta ini dirancang untuk memberikan kenyamanan dan fasilitas lengkap bagi penggunanya. Ruangan ini dapat Anda gunakan bersama dengan rekan Anda untuk berbagai keperluan, seperti diskusi kelompok, presentasi, atau kegiatan pembelajaran lainnya yang memerlukan suasana tenang dan fokus.
                            </p>
                        </details>
                    </div>
                </div>

                <div class="mt-6 pt-6 space-y-4 bg-[#FBFCFF] shadow-xl p-6 rounded-xl">
                    <div class="mb-3 w-full">
                        <p class="block text-sm font-medium text-gray-700 mb-2">Kode Booking</p>
                        <span 
                            class="block w-full px-4 py-2 bg-white border border-[#888D93] rounded-lg text-gray-800">
                            16HDQ89WRH
                        </span>
                    </div>

                    <div class="mb-3 w-full">
                        <p class="text-sm font-medium text-gray-700 mb-2">Status</p>
                        <a class="flex flex-row flex-wrap justify-center items-center px-3 py-2 bg-[#38C55C25] text-[#38C55C] rounded-lg font-semibold max-w-1/3">           
                            <svg 
                                width="20" 
                                height="20" 
                                class="mr-3"
                                viewBox="0 0 24 24">
                                <path 
                                fill="currentcolor" 
                                d="M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/>
                            </svg>
                            <p>Diterima</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>