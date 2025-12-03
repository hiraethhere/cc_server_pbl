<!-- Main Content -->
<main class="container mx-auto px-6 pt-8 pb-22 w-97/100 flex-1 flex flex-col justify-center items-center min-h-9/10 bg-cover">

    <nav class="flex text-sm text-dark-overlay6 w-full mb-12">
        <a href="/Akun" class="text-blue-overlay hover:text-blue-700">Akun</a>
        <span class="mx-2">
            <div>
                <?= icon('arrowRight', 'h-5 w-5') ?>
            </div>
        </span>
        <span class="text-dark-overlay/60 font-medium hover:cursor-pointer">Ganti Password</span>
    </nav>
    
    <h2 class="text-2xl sm:text-3xl text-center font-bold text-dark-overlay mb-5 left-align">Ganti Password</h2>

    <div class="rounded-2xl w-full max-w-2xl p-8">

        <!-- Form -->
        <form action="<?= BASEURL ?>/akun/handlePasswordChange" method="POST" enctype="multipart/form-data">
            <div class="grid gap-4">
                <!-- Password -->
                <div class="mb-4" data-toggle-password>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Password Lama</label>
                    <div class="relative">
                        <input type="password" id="password" name="passwordLama" placeholder="••••••••"
                            class="w-full bg-white px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-overlay5">
                            <img src="/icon/eye-on.svg" class="w-5 h-5 hover:cursor-pointer">
                        </button>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-4" data-toggle-password>
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Password Baru</label>
                    <div class="relative">
                        <input type="password" id="password" name="passwordBaru" placeholder="••••••••"
                            class="w-full bg-white px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-overlay5">
                            <img src="/icon/eye-on.svg" class="w-5 h-5 hover:cursor-pointer">
                        </button>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-1">
                    <label class="block text-sm font-medium text-dark-overlay7 mb-2">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <input type="password" id="password" name="passwordBaruConfirm" placeholder="••••••••"
                            class="w-full bg-white px-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-dark-overlay5">
                            <img src="/icon/eye-on.svg" class="w-5 h-5 hover:cursor-pointer">
                        </button>
                    </div>
                </div>

                <div class="text-sm mb-2">
                    <a href="/Auth/ForgetPassword" class="text-blue-overlay hover:text-blue-700 hover:underline font-medium">Lupa password lama?</a>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <a  href="/akun" type="button" class="px-4 py-2 text-center bg-white text-dark-overlay4 rounded-md font-medium hover:bg-dark-overlay1 border border-dark-overlay4 transition hover:cursor-pointer">Batal</a>
                    <button type="button" onclick="konfirmasiGantiPassword()" class="px-4 py-2 bg-blue-overlay text-white rounded-lg font-medium hover:bg-blue-700 transition shadow-sm hover:cursor-pointer">Konfirmasi</button>
                </div>
            </div>
        </form>
        
    </div>
</main>

<script src="/js/togglePassword.js"></script>
<script src="/js/modal.js" defer></script>
<script>
function konfirmasiGantiPassword() {
    Modal.confirm(
        'Ubah Password',
        'Apakah anda yakin ingin mengubah Password?',
        function() {
            window.location.href = '#';
        },
        {
            icon: '<?php echo icon("key", "text-red-500", "24", "w-8 h-8 mx-auto"); ?>',
            confirmText: 'Konfirmasi',
            confirmClass: 'w-full px-6 py-2 bg-blue-overlay text-white rounded-lg font-semibold hover:bg-blue-700 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
        }
    );
}
</script>