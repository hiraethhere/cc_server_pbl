<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Ruangan" class="text-blue-overlay hover:text-blue-700">Data Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <a href="#" class="text-dark-overlay6 hover:text-blue-overlay">Edit Tata Tertib</a>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Edit Tata Tertib</h2>

    <form action="<?= BASEURL ?>/admin/updateTataTertib" method="POST">
    <div class="space-y-4 bg-background2 shadow-xl rounded-xl p-6 mt-8">

        <input value="<?= $tatib['id_announcement'] ?>" name="id_announcement" hidden>

        <div>
            <label class="block text-sm font-medium text-dark-overlay7 mb-2">
            Tata Tertib (maksimal 500 karakter)
            </label>
            <textarea rows="6" placeholder="Tuliskan deskripsi lengkap ruangan..." maxlength="500" name="tata_tertib"
                    class="w-full px-5 py-4 border border-dark-overlay4 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay"><?= (htmlspecialchars($tatib['announcement_content'])) ?></textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-8 pt-2">
            <button type="submit" class="flex-1 bg-green1 hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
            Edit Tata Tertib
            </button>
        </div>
    </div>
    </form>

</main>