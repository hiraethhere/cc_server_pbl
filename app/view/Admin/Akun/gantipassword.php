<!-- Main Content -->
<main class="flex-1 p-8 overflow-y-auto bg-background1">

    <nav class="flex text-sm text-dark-overlay6 font-medium w-full mb-12">
        <a href="/Admin/Akun" class="text-blue-overlay hover:text-blue-700">Akun</a>
        <span class="mx-2">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="hover:cursor-pointer">Ganti Password</span>
    </nav>
    
    <h2 class="text-2xl sm:text-3xl text-center font-bold text-dark-overlay mb-5 left-align">Ganti Password</h2>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="rounded-xl p-6 md:p-8 space-y-6">

            <form action="/admin/handlePasswordChange" method="POST" enctype="multipart/form-data">
                <div class="grid gap-4">
                    <!-- Password -->
                    <div class="mb-3" data-toggle-password>
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Password Lama</label>
                        <div class="relative">
                            <input type="password" id="passwordLama" name="password" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-overlay5">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3" data-toggle-password>
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Password Baru</label>
                        <div class="relative">
                            <input type="password" id="passwordBaru" name="passwordBaru" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-overlay5">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3" data-toggle-password>
                        <label class="block text-sm font-medium text-dark-overlay7 mb-2">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <input type="password" id="konfirmasiPassword" name="passwordBaruConfirm" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-overlay5">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>

                    <div class="text-sm mb-2">
                        <a href="/Auth/ForgetPassword" class="text-blue-overlay hover:text-blue-700 hover:underline font-medium">Lupa password lama?</a>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" onclick="window.history.back()"
                            class="px-4 py-2 bg-background2 text-dark-overlay4 rounded-lg font-medium hover:bg-dark-overlay1 border border-dark-overlay4 transition hover:cursor-pointer">Batalkan</button>
                        <button class="px-4 py-2 bg-blue-overlay text-white rounded-lg font-medium hover:bg-blue-700 transition shadow-sm hover:cursor-pointer">Konfirmasi</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
    <script src="/js/togglePassword.js" defer></script>
</main>
</body>
</html>