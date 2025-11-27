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
                    <p class="text-gray-800 font-medium"><?= $_SESSION['user']['username']?></p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <div class="border-b border-gray-300 pb-2">
                    <p class="text-gray-800"><?= $_SESSION['user']['email'] ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <a href="#" onclick="konfirmasiLogout()"
                class="block w-full bg-[#C90B0B] text-white text-center py-2 rounded-lg
                        hover:bg-red-700 transition duration-200">
                    Logout
                </a>
                <a href="/Admin/gantiPassword"
                   class="bg-[#1E68FB] text-white text-center py-2 rounded-lg 
                          hover:bg-blue-700 transition duration-200">
                    Ganti Password
                </a>
            </div>
        </div>
    </div>
</main>


</body>
</html>