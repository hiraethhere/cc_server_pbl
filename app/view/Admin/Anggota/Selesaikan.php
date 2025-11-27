    <main class="flex-1 p-8 overflow-y-auto bg-[#F3F5FA]">
        <nav class="mb-6 text-sm text-dark-overlay/60">
            <a href="/Admin/Anggota" class="text-gray-900 hover:text-[#1E68FB]">Data Anggota</a>
            <span class="mx-2">></span>
            <a href="/Admin/Anggota" class="text-gray-900 hover:text-[#1E68FB]">Daftar Anggota</a>
            <span class="mx-2">></span>
            <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Detail Data</span>
        </nav>

        <h2 class="text-xl font-bold text-[#171E29] mb-6">Detail Data</h2>

        <div class="flex flex-row gap-16">
            <div class="bg-[#F3F5FA] rounded-2xl w-full">
                <!-- Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="grid gap-4">
                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <div class="relative">
                                <input type="Text" id="Nama" name="Nama" placeholder="<?= htmlspecialchars($user['username']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" placeholder="<?= htmlspecialchars($user['role_name']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIM/NIP/apapun itu</label>
                            <div class="relative">
                                <input type="Text" id="NIM" name="NIM" placeholder="<?= htmlspecialchars($user['nomor_induk']) ?? '-'?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="relative">
                                <input type="Email" id="Email" name="Email" placeholder="<?= htmlspecialchars($user['email']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
                            <div class="relative">
                                <input type="Text" id="Jurusan" name="Jurusan" placeholder="<?= htmlspecialchars($user['jurusan_unit']) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>

                        <div class="mb-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Daftar</label>
                            <div class="relative">
                                <input type="text" id="TanggalDaftar" name="Tanggal Daftar" placeholder="<?= htmlspecialchars($createdDate) ?? '-' ?>" readonly
                                    class="w-full bg-white px-4 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            </div>
                        </div>
                        <?php var_dump(BASEURL)?>

                        <div class="grid grid-cols-2 gap-12 mt-2">
                            <form action="<?= BASEURL ?>Admin/handleDecline" method="post">
                                <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                                <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                                <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                            <button type="submit" class="px-4 py-2 bg-[#C90B0B] text-white rounded-lg font-medium hover:bg-red-800 transition hover:cursor-pointer">Decline</button>
                            </form>
                            <form action="<?= BASEURL ?>Admin/handleApprove" method="post">
                                <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" >
                                <input type="hidden" name="email" value="<?= $user['email'] ?>" >
                                <input type="hidden" name="username" value="<?= $user['username'] ?>" >
                            <button type="submit" class="px-4 py-2 bg-[#38C55C] text-white rounded-lg font-medium hover:bg-green-600 transition hover:cursor-pointer">Approve</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>


            <div class="flex flex-col bg-white justify-center items-center rounded-2xl w-1/2 py-4">
                <p class="text-xs">Bukti foto akun KubacaPNJ</p>
                <div>
                    <img src="<?= !empty($user['kubaca_photo']) 
                    ? BASEURL . 'File/showBukti/' . $user['kubaca_photo'] : BASEURL . 'img/Profil-Kubaca_Contoh.jpg' ?>"
                    class="mt-2 w-auto h-124 object-cover rounded-lg border border-gray-300">
                </div>
            </div>
        </div>
    </main>