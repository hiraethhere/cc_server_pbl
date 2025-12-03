<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <nav class="mb-6 text-sm w-full">
        <a href="/Admin/Akun" class="text-dark-overlay7 hover:text-blue-overlay font-medium">Akun</a>
    </nav>

    <h2 class="text-3xl font-bold text-dark-overlay mb-10 text-center">Akun Admin</h2>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="rounded-xl p-6 md:p-8 space-y-6">
            <div>
                <label class="block text-sm font-medium text-dark-overlay7 mb-1">Nama</label>
                <div class="border-b border-dark-overlay4 pb-2">
                    <p class="text-dark-overlay font-medium"><?= $_SESSION['user']['username']?></p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-dark-overlay7 mb-1">Email</label>
                <div class="border-b border-dark-overlay4 pb-2">
                    <p class="text-dark-overlay font-medium"><?= $_SESSION['user']['email'] ?></p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <a href="#" onclick="konfirmasiLogout()"
                class="block w-full bg-red1 text-white text-center py-2 rounded-lg
                        hover:bg-red-700 transition duration-200">
                    Logout
                </a>
                <a href="/Admin/gantiPassword"
                   class="bg-blue-overlay text-white text-center py-2 rounded-lg 
                          hover:bg-blue-700 transition duration-200">
                    Ganti Password
                </a>
            </div>
        </div>
    </div>
</main>


</body>
</html>