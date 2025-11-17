<main class="flex-1 p-8 overflow-y-auto bg-[#F3F5FA]">
    <nav class="mb-6 text-sm w-full">
        <a href="/Admin/Akun" class="text-gray-900 hover:text-[#1E68FB]">Akun</a>
    </nav>

    <h2 class="text-3xl font-bold text-[#171E29] mb-10 text-center">Akun Admin</h2>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="rounded-xl p-6 md:p-8 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Nama</label>
                <div class="border-b border-gray-300 pb-2">
                    <p class="text-gray-800 font-medium">Muhammad Reza Arifin</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <div class="border-b border-gray-300 pb-2">
                    <p class="text-gray-800">Reza@example.com</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <a href="/Admin/gantiPassword"
                   class="bg-[#1E68FB] text-white text-center py-2 rounded-lg 
                          hover:bg-blue-700 transition duration-200">
                    Ganti Password
                </a>
                <a href="/Admin/hapusAkun"
                   class="bg-[#1E68FB] text-white text-center py-2 rounded-lg 
                          hover:bg-blue-700 transition duration-200">
                    Hapus Akun
                </a>
            </div>

            <a href="Auth/handleLogout" id="logout-btn"
               class="block w-full bg-[#C90B0B] text-white text-center py-2 rounded-lg
                      hover:bg-red-700 transition duration-200">
                Logout
            </a>
        </div>
    </div>

    <div id="logoutModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-6 md:p-8 w-full max-w-sm mx-4 text-center shadow-xl">
            <div class="mb-4">
                <svg class="w-12 h-12 text-[#C90B0B] mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Logout</h3>
            <p class="text-sm text-gray-600 mb-6">Apakah Anda yakin ingin logout?</p>
            <div class="flex justify-center gap-3">
                <button id="cancel-logout"
                        class="flex-1 px-4 py-2 bg-white text-gray-800 border border-gray-400 rounded-lg 
                               font-medium hover:bg-gray-50 transition">
                    Batalkan
                </button>
                <a href="/Auth/handleLogout"
                   class="flex-1 px-4 py-2 bg-[#C90B0B] text-white rounded-lg font-medium 
                          hover:bg-red-700 transition">
                    Logout
                </a>
            </div>
        </div>
    </div>
</main>
</body>
</html>