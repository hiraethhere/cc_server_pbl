<?php Flasher::Flash() ?>
<?php Flasher::modalInfo(); ?>
       
    </section>
    
    <footer class="bg-background2 py-8 shadow-top shadow-3xl">
        <div class="mx-8 md:px-6 lg:px-6 px-1">
            <div class="grid grid-cols-1 gap-5 text-sm">

                <!-- Logo & Tagline -->
                <div class="flex flex-col lg:flex-row items-center justify-between w-full">
                    <div class="flex flex-col items-center space-x-2">
                        <div class="w-full flex items-center space-x-2 mb-1 px-2">
                            <img src="/img/LOGO PNJ FIX 1.png" alt="Logo" class="w-auto h-7">
                            <span class="text-xl font-bold text-dark-overlay">ruanginPNJ</span>
                        </div>
                        <p class="text-dark-overlay">Temukan, pinjam, dan nikmati bacaan favoritmu dengan mudah.</p>
                    </div>

                    <!-- Contact Info -->
                    <div class="space-y-2 text-dark-overlay flex flex-col md:items-end items-start justify-end w-full">
                        <div class="flex items-center space-x-2 hover:text-green1 transition text-dark-overlay">
                            <div>
                                <?= icon('phone', 'w-4 h-4') ?>
                            </div>
                            <a href="#" class="">+62 87886260131</a>
                        </div>
                        <div class="flex items-center space-x-2 hover:text-green1 transition text-dark-overlay">
                            <div>
                                <?= icon('instagram', 'w-4 h-4') ?>
                            </div>
                            <a href="#" class="">@instagramperpus</a>
                        </div>
                        <div class="flex items-center space-x-2 hover:text-green1 transition text-dark-overlay">
                            <div>
                                <?= icon('email', 'w-4 h-4') ?>
                            </div>
                            <a href="mailto:emailperpus@gmail.com" class="">emailperpus@gmail.com</a>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 grid-rows-1 gap-5 pt-6 border-t border-dark-overlay">
                    <div class>
                        <h3 class="font-bold text-dark-overlay mb-2 text-xs">Jam Kerja</h3>
                        <p class="mb-1 text-xs">Senin-Kamis: 08:00-18:00</p>
                        <p class="mb-1 text-xs">Jumat: 08:00-16:00</p>
                    </div>
                    <div class="md:w-5/6">
                        <h3 class="font-bold text-dark-overlay mb-2 text-xs">Tentang Kami</h3>
                        <p class="mb-2 text-justify text-xs">
                            Kami adalah Perpustakaan PNJ, pusat informasi dan pembelajaran di Politeknik Negeri Jakarta, menyediakan koleksi lengkap dan layanan digital yang mendukung pendidikan dan penelitian.
                        </p>
                    </div>
                    <div class="md:w-5/6">
                        <h3 class="font-bold text-dark-overlay mb-2 text-xs">Alamat</h3>
                        <p class="text-justify text-xs">
                        Universitas Indonesia Gedung Perpustakaan Politeknik
                        Negeri Jakarta, Jl. Mini, Bali, People City, West Java
                        18425
                        </p>                        
                    </div>
                </div>

                <!-- Copyright -->
                <div class="pt-6 border-t border-dark-overlay text-center">
                    <p class="text-xs font-light text-dark-overlay7">© 2025 ruanginPNJ. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>