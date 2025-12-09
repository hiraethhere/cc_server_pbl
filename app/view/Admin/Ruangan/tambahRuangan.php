<main class="flex-1 p-8 overflow-y-auto bg-background2">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/Ruangan" class="text-blue-overlay hover:text-blue-700">Data Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <a href="#" class="text-dark-overlay6 hover:text-blue-overlay">Tambah Ruangan</a>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Tambah Ruangan</h2>
    <form id="addRoomForm" action="<?= BASEURL; ?>/admin/handleAddRoom" method="POST" enctype="multipart/form-data">
    <div class="grid lg:grid-cols-1 xl:grid-cols-2 gap-10 mt-6">
        <!-- KOLOM KIRI – Foto + Form Utama -->
        <div class="space-y-8 bg-background2 shadow-xl rounded-xl">

            <!-- Foto + Rating + Upload -->
            <div class="relative rounded-t-2xl overflow-hidden mb-0">
                <img src="/img/DefaultRuangan.jpg" id="preview-image"
                    alt="Ruangan" class="w-full h-72 object-cover">

        
                <!-- Overlay Rating (mirip gambar) -->
                <div id="default-badge" class="absolute top-6 left-6 flex items-center gap-3 px-5 py-1
                                bg-dark-overlay4
                                rounded-lg
                                animate-in fade-in slide-in-from-bottom duration-500">
                    
                    <p class="text-white font-semibold">INI FOTO DEFAULT</p>
                </div>
        

                <!-- Upload Foto Baru -->
                <div class="flex justify-between items-center absolute bottom-0 left-0 right-0 p-6 bg-linear-to-t from-black/70 to-transparent">
                    <label class="flex items-center gap-3 text-white cursor-pointer transition">
                        <span class="flex items-center font-medium py-2 px-3 rounded-full text-xs bg-blue-overlay hover:bg-blue-overlay7">Ganti Foto
                            <div>
                                <?= icon('uploadFoto', 'h-5 w-5 ml-2') ?>
                            </div>
                        </span>
                        <input type="file" id="input-foto" name="roomPhoto" accept=".png,.jpg,.jpeg" class="hidden">
                    </label>
                    <p class="font-medium py-2 px-3 rounded-full text-xs bg-blue-overlay text-white">.png, .jpg, .jpeg</p>
                </div>
            </div>

            <!-- Form Input -->
            <div class="space-y-4 p-8 rounded-xl">

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Nama Ruangan</label>
                    <input type="text" placeholder="Ruangan Lentera Edukasi" name="room_name"
                            class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Lokasi (lantai)</label>
                    <input type="text" placeholder="2" name="floor"
                            class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay">
                </div>

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay">
                        <option value="active">Tersedia</option>
                        <option value="non-active">Tidak Tersedia</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Kapasitas Ruangan</label>
                    <div class="flex justify-between items-center gap-4">
                        <input type="number" name="min_capacity" placeholder="4" min="1" class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg text-center">
                            <span class="text-dark-overlay7">Sampai</span>
                        <input type="number" name="max_capacity" placeholder="8" min="1" class="w-full px-4 py-2 border border-dark-overlay4 rounded-lg text-center">
                    </div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN – Deskripsi + Tombol Aksi -->
        <div class="space-y-4 bg-background2 shadow-xl rounded-xl p-8 self-start">

        <div>
            <label class="block text-sm font-medium text-dark-overlay7 mb-2">
            Deskripsi Lengkap
            </label>
            <textarea rows="6" placeholder="Tuliskan deskripsi lengkap ruangan..." name="description"
                    class="w-full px-5 py-4 border border-dark-overlay4 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-dark-overlay7 mb-2">
            Deskripsi Singkat
            </label>
            <textarea rows="3" placeholder="Tuliskan deskripsi singkat yang muncul di kartu ruangan..." name="short_description"
                class="w-full px-5 py-4 border border-dark-overlay4 rounded-lg resize-none focus:ring-2 focus:ring-blue-500 outline-none placeholder:text-dark-overlay"></textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex gap-8 pt-2">
            <button type="button" onclick="window.location.href='/admin/ruangan'" class="flex-1 bg-background2 hover:bg-dark-overlay2 border border-dark-overlay5 text-dark-overlay5 font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
                Batal
            </button>
            <button type="button" onclick="konfirmasiTambah()" class="flex-1 bg-green1 hover:bg-green-700 text-white font-semibold py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:cursor-pointer">
                Tambah
            </button>
        </div>

        </div>
        </form>
    </div>
</main> 

<?php include __DIR__ . '/../../template/modal.php'; ?>

<script src="/js/modal.js" defer></script>
<script>
    const inputFoto = document.getElementById('input-foto');
    const previewImage = document.getElementById('preview-image');
    const defaultBadge = document.getElementById('default-badge');

    inputFoto.addEventListener('change', function(e) {
        const file = e.target.files[0];

        // Cek apakah ada file yang dipilih
        if (file) {
            const reader = new FileReader();

            // Saat file selesai dibaca, update src gambar
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                
                // Opsional: Sembunyikan badge "INI FOTO DEFAULT" jika user upload foto baru
                if(defaultBadge) {
                    defaultBadge.style.display = 'none';
                }
            }

            // Membaca file sebagai URL data (base64)
            reader.readAsDataURL(file);
        }
    });

function konfirmasiTambah() {
    Modal.confirm(
        'Tambah Ruangan?',
        'Anda yakin ingin menambah ruagan?',
        function() {
            document.getElementById('addRoomForm').submit();
        },
        {
            icon: <?= json_encode(icon("calendar", "w-12 h-12", "green1")) ?>,
            confirmText: 'Taambah',
            confirmClass: 'w-full px-6 py-2 bg-green1 text-white rounded-lg font-semibold hover:bg-green-700 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>