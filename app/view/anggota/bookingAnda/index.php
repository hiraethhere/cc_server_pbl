<?php $tab = $_GET['tab'] ?? 'booking'; ?>

<main class="container mx-auto lg:px-11 md:px-9 px-6 py-8 min-h-screen">

    <h1 class="text-3xl font-semibold text-center mb-12">Bookingan Anda</h1>

    <div class="flex justify-center mb-6 flex-col shadow-xl">
        <div class="overflow-hidden w-full">
            <div class="flex mx-auto rounded-t-xl overflow-hidden">
                <a href="?tab=booking" 
                class="flex-1 text-center py-3 font-semibold transition <?= ($_GET['tab'] ?? 'booking') === 'booking' ? 'bg-blue-overlay9 text-white rounded-tl-xl' : 'bg-blue-overlay1 text-blue-overlay hover:bg-gray-200' ?>">
                    Booking
                </a>
                <a href="?tab=reschedule" 
                class="flex-1 text-center py-3 font-semibold transition <?= ($_GET['tab'] ?? 'booking') === 'reschedule' ? 'bg-blue-overlay9 text-white rounded-tr-xl' : 'bg-blue-overlay1 text-blue-overlay hover:bg-gray-200' ?>">
                    Status Reschedule
                </a>
            </div>
                <?php if ($tab === 'booking'): ?>
                    <?php if (!empty($activeBooking)): ?>
                    <!-- Booking Details -->
                    <div class="w-full mx-auto bg-background2 rounded-b-xl shadow-xl p-12">
                        <div class="">
                            <div class="relative h-96">
                                <img src="/img/DefaultRuangan.jpg" 
                                    alt="Ruang Lentera Edukasi" class="w-full h-full object-cover rounded-xl">
                            </div>
                            <div class="grid grid-cols-2 justify-center items-center border border-dark-overlay7 mt-6 p-3 rounded-md">
                                <div class="">
                                    <p class="text-dark-overlay7 text-sm">Nama Ruangan</p>
                                    <h2 class="text-3xl font-semibold text-dark-overlay"><?= htmlspecialchars($activeBooking['room_name'] ?? '-')?></h2>
                                </div>

                                <div class="">         
                                    <p class="text-dark-overlay7 text-sm">Status</p>
                                    <div class="max-w-1/4">
                                        <a class="bg-blue-overlay-25 flex-wrap py-2 px-4 justify-center text-white1 rounded-md mt-2 flex">
                                            <div class="text-blue-overlay">
                                                <?= icon('circleFill', 'h-5 w-5 mr-2') ?>
                                            </div>
                                            <h2 class="text-sm inline-block font-semibold text-blue-overlay"><?= htmlspecialchars($status) ?></h2>
                                        </a>
                                    </div>           
                                </div>
                            </div>

                            <div class="grid grid-cols-2 justify-center items-center border border-dark-overlay7 mt-6 p-3 rounded-md">
                                <div>
                                    <div class="border-dark-overlay7 py-4">         
                                        <p class="text-dark-overlay7 text-sm">Tanggal Peminjaman</p>
                                        <div class="max-w-3/6">
                                            <h2 class="text-sm inline-block font-semibold pr-2 1y-1 text-dark-overlay rounded-lg mt-2"><?= htmlspecialchars($bookingDate) ?></h2>
                                        </div>           
                                    </div>
                                    <div class="border-dark-overlay7 py-4">
                                        <p class="text-dark-overlay7 text-sm">Jumlah Orang</p>
                                        <h2 class="text-sm font-semibold"><?= htmlspecialchars($activeBooking['total_person'] ?? '-') ?></h2>     
                                    </div>
                                </div>
                                <div class="grid grid-rows-2">
                                    <div class="border-dark-overlay7 py-4">         
                                        <p class="text-dark-overlay7 text-sm">Jam Peminjaman</p>
                                        <div class="max-w-3/6">
                                            <h2 class="text-sm inline-block font-semibold pr-2 1y-1 text-dark-overlay rounded-lg mt-2"><?= htmlspecialchars($start_time)?> -  <?= htmlspecialchars($end_time) ?></h2>
                                        </div>           
                                    </div>

                                    <div class="border-dark-overlay7 py-4">         
                                        <p class="text-dark-overlay7 text-sm">Kode Booking</p>
                                        <div class="max-w-3/6">
                                            <h2 class="text-sm inline-block font-semibold pr-2 1y-1 text-dark-overlay rounded-lg mt-2"><?= htmlspecialchars($activeBooking['booking_code'] ?? '-')?></h2>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-4 py-4">
                                <button type="button" id="buttonCancel" class="bg-red1 text-white px-6 py-2 rounded-sm text-sm hover:bg-red-700 hover:cursor-pointer">
                                    Cancel Booking
                                </button>
                                <a href="Booking/Reschedule" class="bg-blue-overlay text-white px-6 py-2 rounded-sm text-sm hover:bg-blue-700 hover:cursor-pointer">
                                    Reschedule
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <form id="cancelForm" action="<?= BASEURL ?>/Booking/cancelBooking" method="post">
                        <input type="hidden" value="<?= $activeBooking['id_booking'] ?? '' ?>" name="id_booking">
                    </form>

                    <?php else: ?>
                        <!-- Empty State untuk Booking -->
                        <div class="w-full mx-auto bg-background2 rounded-b-xl shadow-xl p-12">
                            <div class="flex flex-col items-center justify-center py-16">
                                <svg class="w-24 h-24 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Booking Aktif</h3>
                                <p class="text-gray-500 text-center mb-6">Anda belum memiliki booking yang sedang aktif saat ini</p>
                                <a href="/Dashboard" class="bg-blue-overlay text-white px-6 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                                    Booking Ruangan Sekarang
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else: ?>

                <div id="desktop-table" class="md:block hidden overflow-x-auto bg-white rounded-t-xl p-12">
                    <table class="w-full text-sm border-separate border-spacing-0 border border-dark-overlay4 rounded-t-xl">
                        <thead class="bg-blue-overlay1 rounded-t-xl">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold text-dark-overlay7 rounded-tl-xl">No.</th>
                                <th class="px-4 py-3 text-left font-semibold text-dark-overlay7">Tanggal</th>
                                <th class="px-4 py-3 text-left font-semibold text-dark-overlay7">Ruangan</th>
                                <th class="px-4 py-3 text-left font-semibold text-dark-overlay7">Jam</th>
                                <th class="px-4 py-3 text-center font-semibold text-dark-overlay7 rounded-tr-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody id="" class="divide-y divide-dark-overlay4">

                            <!-- **************************************************
                            INI Data pERTAMA
                            ******************************************************* -->
                            <tr class="hover:bg-gray-50 transition border-b font-medium text-dark-overlay dark-overlay4ay-300">
                                <td class="px-4 py-3 text-left text-sm border-b font-medium text-dark-overlay border-dark-overlay4">1</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium text-dark-overlay border-dark-overlay4">8 November 2025</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium text-dark-overlay border-dark-overlay4">Ruang Lentera Edukasi</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium text-dark-overlay border-dark-overlay4">09:00 - 12:00</td>
                                <td class="px-4 py-3 text-left justify-center flex border-b font-medium text-dark-overlay border-dark-overlay4">
                                    <div
                                            class="flex bg-blue-overlay items-center justify-center text-white px-5 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                        <span>Menunggu</span>
                                    </div>
                                </td>
                            </tr>


                            <!-- **************************************************
                            INI Data KEDUA
                            ******************************************************* -->
                            <tr class="hover:bg-gray-50 transition border-b font-medium border-dark-overlay4">
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">1</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">8 November 2025</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">Ruang Lentera Edukasi</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">09:00 - 12:00</td>
                                <td class="px-4 py-3 text-left justify-center flex border-b font-medium border-dark-overlay4">
                                    <div
                                            class="flex bg-green1 items-center justify-center text-white px-5 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                        <span>Diterima</span>
                                    </div>
                                </td>
                            </tr>


                            <!-- **************************************************
                            INI Data pERTAMA
                            ******************************************************* -->
                            <tr class="hover:bg-gray-50 transition border-b font-medium border-dark-overlay4">
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">1</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">8 November 2025</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">Ruang Lentera Edukasi</td>
                                <td class="px-4 py-3 text-left text-sm border-b font-medium border-dark-overlay4">09:00 - 12:00</td>
                                <td class="px-4 py-3 text-left justify-center flex border-b font-medium border-dark-overlay4">
                                    <div
                                            class="flex bg-red1 items-center justify-center text-white px-5 py-2 rounded-sm text-xs font-medium shadow-md min-w-1/2">
                                        <span>Ditolak</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>