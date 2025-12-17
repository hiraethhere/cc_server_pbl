<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/superAdmin" class="text-blue-overlay hover:text-blue-700">Data Admin</a>
            <span class="mx-2">
                <div class="text-dark-overlay6">
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
        <a href="/Admin/tambahAdmin" class="text-dark-overlay6 hover:text-blue-700">Tambah Admin</a>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-dark-overlay">Tambah Admin</h2>
    </div>

    <div class="bg-background2 rounded-2xl w-full shadow-xl p-6">
        <h3 class="text-xl font-semibold text-dark-overlay mb-6">Isi Data Admin</h3>
            
        <form class="space-y-4" id="formUbah" method="POST" action="/superadmin/handleUbahAdmin"> 
        <input type="hidden" name="id_user" value="<?= $admin['id_user'] ?>">
            <div>
                <label for="nama_lengkap" class="block text-sm font-medium text-dark-overlay mb-2">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" placeholder="Input nama" value="<?= htmlspecialchars($admin['username'] ?? '') ?>" name="username"
                        class="w-full px-4 py-2 border border-dark-overlay4 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-dark-overlay mb-2">Email</label>
                <input type="email" id="email" placeholder="Input Email" value="<?= htmlspecialchars($admin['email'] ?? '') ?>" name="email"
                        class="w-full px-4 py-2 border border-dark-overlay4 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>

            <div>
                <label for="nim_nip" class="block text-sm font-medium text-dark-overlay mb-2">NIP</label>
                <input type="text" id="nim_nip" placeholder="Input NIP" value="<?= htmlspecialchars($admin['nomor_induk'] ?? '-') ?>" name="nomor_induk"
                        class="w-full px-4 py-2 border border-dark-overlay4 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
                
            <div>
                <label for="status" class="block text-sm font-medium text-dark-overlay mb-2">Status</label>
                <select id="status" name="status">
                <option value="active">Aktif</option>
                <option value="suspended">Nonaktif</option>
                </select>
            </div>
            
            <div class="flex justify-between gap-8 mt-8">
                <button type="button" onclick="window.location.href='/superadmin'" class="px-6 py-2 border border-dark-overlay4 text-dark-overlay7 font-semibold rounded-lg hover:bg-dark-overlay1 transition shadow-sm w-full hover:cursor-pointer">
                    Batal
                </button>
                 <button onclick="konfirmasiHapusAdmin()" type="button" class="px-6 py-2 bg-red1 text-white font-semibold rounded-lg hover:bg-green-600 transition shadow-sm w-full hover:cursor-pointer">
                    Hapus Admin
                </button>
                <button onclick="konfirmasiUbahAdmin()" type="button" class="px-6 py-2 bg-green1 text-white font-semibold rounded-lg hover:bg-green-600 transition shadow-sm w-full hover:cursor-pointer">
                    Ubah Admin
                </button>
            
            </div>
        </form>
        <form id="formHapus" method="POST" action="/superadmin/hapusAdmin">
        <input type="hidden" name="id_user" value="<?= $admin['id_user'] ?>">
        </form>
    </div>
</main>

<script src="/js/togglePassword.js" defer></script> 
<script src="/js/modal.js" defer></script>
<script>
    function konfirmasiUbahAdmin() {
    Modal.confirm(
        'Ubah Admin?',
        'Anda yakin ingin ubah Admin?',
        function() {
            document.getElementById('formUbah').submit();
        },
        {
            icon: <?= json_encode(icon("usersAdmin", "w-24 h-24 text-green1")) ?>,
            confirmText: 'Tambah',
            confirmClass: 'w-full px-6 py-2 bg-green1 text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}

function konfirmasiHapusAdmin() {
    Modal.confirm(
        'Hapus Admin?',
        'Anda yakin ingin menghapus Admin ini?',
        function() {
            document.getElementById('formHapus').submit();
        },
        {
            icon: <?= json_encode(icon("usersAdmin", "w-24 h-24 text-green1")) ?>,
            confirmText: 'Hapus',
            confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>