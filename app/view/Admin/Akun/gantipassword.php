<!-- Main Content -->
<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">

    <nav class="text-sm text-dark-overlay/60 w-full mb-12">
        <a href="/Admin/Akun" class="text-gray-900 hover:text-[#1E68FB]">Akun</a>
        <span class="mx-2">></span>
        <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Ganti Password</span>
    </nav>
    
    <h2 class="text-2xl sm:text-3xl text-center font-bold text-[#171E29] mb-5 left-align">Ganti Password</h2>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="rounded-xl p-6 md:p-8 space-y-6">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="grid gap-4">
                    <!-- Password -->
                    <div class="mb-3" data-toggle-password>
                        <label class="block text-xs font-medium text-gray-700 mb-2">Password Lama</label>
                        <div class="relative">
                            <input type="password" id="passwordLama" name="password" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-xs">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3" data-toggle-password>
                        <label class="block text-xs font-medium text-gray-700 mb-2">Password Baru</label>
                        <div class="relative">
                            <input type="password" id="passwordBaru" name="password" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-xs">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3" data-toggle-password>
                        <label class="block text-xs font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <input type="password" id="konfirmasiPassword" name="password" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-xs">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>

                    <div class="text-sm mb-2">
                        <a href="/Auth/ForgetPassword" class="text-blue-600 hover:underline font-medium">Lupa password lama?</a>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" onclick="window.history.back()"
                            class="px-4 py-2 bg-white text-gray-800 rounded-lg font-medium hover:bg-gray-100 border border-gray-400 transition hover:cursor-pointer">Batalkan</button>
                        <button class="px-4 py-2 bg-[#1E68FB] text-white rounded-lg font-medium hover:bg-blue-700 transition shadow-sm hover:cursor-pointer">Konfirmasi</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
    <script src="/js/togglePassword.js" defer></script>
</main>
</body>
</html>