<main class="flex-1 p-8 overflow-y-auto bg-[#F9FAFC]">
    <nav class="mb-6 text-sm text-dark-overlay/60 flex">
        <a href="/Admin/Anggota" class="text-[#1E68FB]">Data Anggota</a>
        <span class="mx-2">
            <img src="/icon/arrow.svg" class="w-5 h-5">
        </span>
        <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Tambah Anggota</span>
    </nav>

    <h2 class="text-xl font-bold text-[#171E29] mb-6">Tambah Anggota</h2>

    <div class="bg-[#FBFCFF] rounded-2xl w-full shadow-xl p-6">
        <h3 class="text-xl font-semibold text-[#171E29] mb-6">Isi Data Anggota</h3>
            
            <form class="space-y-4"> 
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-[#171E29] mb-2">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" placeholder="Input nama"
                           class="w-full px-4 py-2 border border-[#171E2950] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#171E29] mb-2">Email</label>
                        <input type="email" id="email" placeholder="Input Email"
                               class="w-full px-4 py-2 border border-[#171E2950] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                    
                    <div>
                        <label for="jenis_anggota" class="block text-sm font-medium text-[#171E29] mb-2">Jenis Anggota</label>
                        <select id="jenis_anggota"
                                class="w-full px-4 py-2 border border-[#171E2950] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition appearance-none">
                            <option value=""disabled selected hidden>Pilih Jenis Anggota</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>

                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-[#171E29] mb-2">Jurusan/Unit Kerja</label>
                        <select id="jurusan"
                                class="w-full px-4 py-2 border border-[#171E2950] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition appearance-none">
                            <option value=""disabled selected hidden>Pilih Jurusan</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="prodi" class="block text-sm font-medium text-[#171E29] mb-2">Prodi (Untuk Mahasiswa)</label>
                        <select id="prodi"
                                class="w-full px-4 py-2 border border-[#171E2950] text-sm rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 outline-none transition appearance-none">
                            <option value="">Pilih Prodi</option>
                            </select>
                    </div>

                    <div>
                        <label for="nim_nip" class="block text-sm font-medium text-[#171E29] mb-2">NIM/NIP</label>
                        <input type="text" id="nim_nip" placeholder="Input NIM/NIP"
                               class="w-full px-4 py-2 border border-[#171E2950] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-5" data-toggle-password>
                        <label class="block text-sm font-medium text-[#171E29] mb-2">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="new-password"
                                class="w-full px-4 py-2 border border-[#171E2950] rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                <img src="/icon/eye-on.svg" alt="Show Password" class="w-5 h-5 hover:cursor-pointer">
                            </button>
                        </div>
                    </div>
                    
                </div>
                
                <div class="flex justify-between gap-8">
                    <button type="button" class="px-6 py-2 border border-[#171E2950] text-[#171E2970] font-semibold rounded-lg hover:bg-gray-200 transition shadow-sm w-full hover:cursor-pointer">
                        Batal
                    </button>
                    <button onclick="konfirmasiTambahAnggota()" type="button" class="px-6 py-2 bg-[#38C55C] text-white font-semibold rounded-lg hover:bg-green-600 transition shadow-sm w-full hover:cursor-pointer">
                        Tambah Anggota
                    </button>
                </div>
                
            </form>
    </div>
</main>
<?php include __DIR__ . '/../../template/modal.php'; ?>

<script src="/js/togglePassword.js" defer></script> 
<script src="/js/modal.js" defer></script>
<script>
function konfirmasiTambahAnggota() {
    Modal.confirm(
        'Tambah Anggota?',
        'Anda yakin ingin Tambah Anggota?',
        function() {
            window.location.href = '#';
        },
        {
            icon: '/icon/userDashboard.svg',
            confirmText: 'Approve',
            confirmClass: 'w-full px-6 py-2 bg-[#38C55C] text-white rounded-lg font-semibold hover:bg-green-600 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>