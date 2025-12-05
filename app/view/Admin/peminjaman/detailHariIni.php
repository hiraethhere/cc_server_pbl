<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-blue-overlay hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <a href="/Admin/Peminjaman" class="text-blue-overlay hover:text-blue-700">Hari ini</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="font-medium text-gray-900">Detail Booking</span>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Booking Hari ini</h2>

    <div class="flex flex-col gap-8 lg:grid lg:grid-cols-[3fr_2fr] lg:gap-8 mt-2">
        <div class="bg-background2 rounded-2xl shadow-lg p-6 md:p-8 w-full">

            <!-- Nama Ruangan -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-dark-overlay7 mb-2">Nama Ruangan</p>
                <span 
                    class="block w-full px-4 py-2 bg-white border border-dark-overlay4 rounded-lg text-dark-overlay">
                    Ruang Lentera Edukasi
                </span>
            </div>

            <!-- Waktu Peminjaman -->
            <div class="mb-5 w-full">
                <label class="block text-sm font-medium text-dark-overlay7 mb-2">Waktu Peminjaman</label>
                <div class="flex flex-row justify-between gap-3 border border-dark-overlay4 p-4 rounded-lg flex-wrap">
                    <div class="flex-1">
                        <p class="mb-2 text-dark-overlay7">Tanggal</p>
                        <span
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            5 September 2025
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2 text-dark-overlay7">Jam Mulai</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            13:00
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2 text-dark-overlay7">Jam Selesai</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            15:00
                        </span>
                    </div>
                </div>
            </div>

            <!-- Penanggung Jawab -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-dark-overlay7 mb-2">Penanggung Jawab</p>
                <div class="flex flex-col justify-between gap-3 border border-dark-overlay4 p-4 rounded-lg flex-wrap">
                    <div class="flex-1">
                        <p class="mb-2 text-dark-overlay7">Nama</p>
                        <span
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2 text-dark-overlay7">NIM</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            2407411000
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="mb-2 text-dark-overlay7">Jurusan</p>
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            Teknik Informatika dan Komputer
                        </span>
                    </div>
                </div>
            </div>

            <!-- Informasi Anggota -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-dark-overlay7 mb-2">Informasi Anggota</p>
                <div class="flex flex-col justify-between gap-3 border border-dark-overlay4 p-4 rounded-lg flex-wrap">
                    <div class="flex-1">
                        <span
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                    <div class="flex-1">
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                    <div class="flex-1">
                        <span 
                            class="block w-full px-3 py-2 bg-white border border-dark-overlay4 rounded-lg text-left">
                            Muhammad Reza Arifin
                        </span>
                    </div>
                </div>
            </div>

            <!-- Jumlah Orang -->
            <div class="mb-5 w-full">
                <p class="block text-sm font-medium text-dark-overlay7 mb-2">Jumlah Orang</p>
                <span 
                    class="block w-full px-4 py-2 bg-white border border-dark-overlay4 rounded-lg text-dark-overlay">
                    4
                </span>
            </div>

            
        </div>

        <div class="order-1 lg:order-0 lg:col-span-1 space-y-6 lg:sticky">
    
            <!-- KARTU RUANGAN (TIDAK STICKY) -->
            <div class="bg-background2 rounded-xl shadow-lg overflow-hidden">
                <?php 
                    // Ambil URL gambar dari array PHP
                    //$imageUrl = "/img/" . $detailRuangan['img_room'];
                ?>

                <div class="h-56 relative overflow-hidden bg-background2" 
                    style="background-image: url('/img/DefaultRuangan.jpg'); 
                            background-size: cover; 
                            background-position: center;">
                    <!-- Overlay Rating (mirip gambar) -->
                    <div class="absolute bottom-2 left-2 flex items-center gap-3 px-5 py-1
                                    bg-dark-overlay5
                                    rounded-lg
                                    animate-in fade-in slide-in-from-bottom duration-500">
                        
                        <!-- Bintang -->
                        <div class="flex items-center gap-1">
                            <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-yellow1 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.3h7.7l-6.2 4.5 2.4 7.3-6.3-4.5-6.3 4.5 2.4-7.3-6.2-4.5h7.7z"/>
                            </svg>
                            <svg class="w-7 h-7 text-white fill-current" viewBox="0 0 24 24">
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
                        <h3 class="font-bold text-2xl text-black mb-4">Ruang Apa Aja Deh</h3>
                        <div class="space-y-3 text-sm text-black3 mb-2 gap-4">
                            <div class="flex items-center">
                                <div class="flex items-center text-black2">
                                    <?= icon('location', 'w-5 h-5 mr-3') ?> 
                                </div>    
                                <p class="">Lantai 2</p>
                            </div>
    
                            <div class="flex items-center text-black">
                                <div class="flex items-center text-black2">
                                    <?= icon('userOutline', 'w-5 h-5 mr-3') ?> 
                                </div>    
                                <p >4 - 5 orang</p>
                            </div>
                            
                        </div>
                        <details class="text-dark-overlay8 mt-4">
                            <summary class="text-base cursor-pointer text-dark-overlay8 flex items-center">
                                Deskripsi Ruangan
                                <div class="flex items-center">
                                    <?= icon('arrowDown', 'w-6 h-6 ml-2') ?> 
                                </div>
                            </summary>
                            <p class="mt-3 text-sm leading-relaxed text-justify">
                                Ruangan (...) dengan luas xx m² yang berada di lantai x Perpustakaan Politeknik Negeri Jakarta ini dirancang untuk memberikan kenyamanan dan fasilitas lengkap bagi penggunanya. Ruangan ini dapat Anda gunakan bersama dengan rekan Anda untuk berbagai keperluan, seperti diskusi kelompok, presentasi, atau kegiatan pembelajaran lainnya yang memerlukan suasana tenang dan fokus.
                            </p>
                        </details>
                    </div>
                </div>

                <div class="mt-6 pt-6 space-y-4 bg-background2 shadow-xl p-6 rounded-xl">
                    <div class="mb-3 w-full">
                        <p class="block text-sm font-medium text-dark-overlay7 mb-2">Kode Booking</p>
                        <span 
                            class="block w-full px-4 py-2 bg-white border border-dark-overlay4 rounded-lg text-dark-overlay">
                            16HDQ89WRH
                        </span>
                    </div>

                    <div class="mb-3 w-full">
                        <p class="text-sm font-medium text-dark-overlay7 mb-2">Status</p>
                        <a class="bg-green-overlay4 flex-row flex-wrap inline-flex justify-center py-1 px-4 rounded-md mt-2">
                            <div class="flex items-center gap-2 text-green1">
                                <?= icon('circleFill', 'w-3 h-3 mr-2') ?>        
                            </div>
                            <h2 class="text-md inline-block font-semibold text-green1">Diterima</h2>
                        </a>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="gap-4 pt-6 grid grid-cols-1">
                    <div class="grid grid-cols-2 gap-8">
                        <button onclick="konfirmasiCancel()" class="flex-1 bg-red1 hover:bg-red-700 text-white font-medium py-2.5 rounded-lg transition hover:cursor-pointer">
                            Cancel Booking
                        </button>
                        <button onclick="konfirmasiMulai()" class="flex-1 bg-green1 hover:bg-green-700 text-white font-medium py-2.5 rounded-lg transition hover:cursor-pointer">
                            Mulai Peminjaman
                        </button>
                    </div>
                    
                    <button class="flex-1 bg-blue-overlay hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition hover:cursor-pointer">
                    Selesaikan Peminjaman
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function konfirmasiMulai() {
        Modal.confirm(
            'Mulai peminjaman',
            'Anda yakin ingin memulai peminjaman?',
            function() {
            // ini yang benar untuk POST form, bukan window.location.href
            // document.getElementById('bookingForm').submit();
            },
            {
            icon: <?= json_encode(icon("calendar", "w-12 h-12 text-green1")) ?>,
            confirmText: 'Mulai',
            confirmClass: 'w-full px-6 py-2 bg-green1 text-white rounded-lg font-semibold hover:bg-green-700 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
            }
        );
    }

    function konfirmasiCancel() {
    Modal.confirm(
        'Cancel Booking',
        'Apakah Anda yakin ingin membatalkan booking?',
        function() {
            window.location.href = '#';
        },
        {
            icon: <?= json_encode(icon("crossCircle", "w-12 h-12 text-red1")) ?>,
            confirmText: 'Ya',
            confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-red-700 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>