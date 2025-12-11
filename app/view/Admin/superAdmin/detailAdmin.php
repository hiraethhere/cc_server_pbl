<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="flex mb-6 text-sm">
        <a href="/Admin/superAdmin" class="text-blue-overlay hover:text-blue-700">Data Admin</a>
            <span class="mx-2">
                <div class="text-dark-overlay6">
                    <?= icon('arrowRight', 'w-5 h-5') ?>
                </div>
            </span>
        <a href="/Admin/detailAdmin" class="text-dark-overlay6 hover:text-blue-700">Detail Admin</a>
    </nav>

    <!-- Header dengan Title dan Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-dark-overlay">Detail Admin</h2>
    </div>

    <div class="bg-background2 rounded-2xl w-full shadow-xl p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-2 justify-start items-start border border-dark-overlay7 p-4 rounded-md">
            <div class="border-dark-overlay7 py-4">  

                <p class="text-dark-overlay7 text-sm">Nama</p>
                <div class="max-w-3/6">
                    <h2 class="text-xl inline-block font-semibold pr-2 1y-1 text-dark-overlay rounded-lg mt-2">Lele</h2>
                </div>           
            </div>

            <div class="py-4">         
                <p class="text-dark-overlay7 text-sm">NIP</p>
                <div class="max-w-3/6">
                    <h2 class="text-lg inline-block pr-2 1y-1 text-dark-overlay rounded-lg mt-2">212312</h2>
                </div>           
            </div>

            <div class="py-4">         
                <p class="text-dark-overlay7 text-sm">Email</p>
                <div class="max-w-3/6">
                    <h2 class="text-lg inline-block pr-2 1y-1 text-dark-overlay rounded-lg mt-2">@stu,pnj.ac.id</h2>
                </div>           
            </div>

            <div class="py-4">         
                <p class="text-dark-overlay7 text-sm">Status</p>
                <a class="inline-flex justify-start items-center bg-green-overlay-25 mt-2 rounded-lg py-2 px-4">
                    <div class="text-green1">
                        <?= icon('circleFill', 'w-4 h-4 mr-2') ?>
                    </div>
                    <h2 class="text-sm inline-block font-semibold text-green1">Aktif</h2>
                </a>           
            </div>
        </div>


        <div class="flex flex-col sm:flex-row justify-between gap-8 mt-6">
                
            <button id="buttonNonAktif" class="flex-1 bg-red1 hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                Nonaktifkan
            </button>
            
            <button onclick="konfirmasiSuspend()" class="flex-1 bg-red1 hover:bg-red-800 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                Suspend
            </button>
            
            <button id="buttonAktifkan" class="flex-1 bg-green1 hover:bg-green-600 text-white font-semibold py-3 rounded-xl transition duration-150 shadow-md hover:cursor-pointer">
                Aktifkan
            </button>
            
        </div>
    </div>
</main>

<script src="/js/modal.js" defer></script>
<script>

    const buttonAktifkan = document.getElementById('buttonAktifkan');
    const buttonNonAktif = document.getElementById('buttonNonAktif');
    if (buttonAktifkan) {
        buttonAktifkan.addEventListener('click', function () {document.getElementById('approveForm').submit();});
}


    function konfirmasiSuspend() {
        Modal.confirm(
            'Suspend Admin?',
            'Apakah yakin ingin suspend?',
            function() {
                document.getElementById('suspendForm').submit();
            },
            {
                icon: <?= json_encode(icon("suspend", "w-12 h-12 text-red1")) ?>,
                confirmText: 'Suspend',
                confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-red-800 transition hover:cursor-pointer',
                cancelText: 'Batalkan'
            }
        );
    }

    function konfirmasiNonAktif() {
        Modal.confirm(
            'Nonaktifkan Admin?',
            'Apakah yakin ingin Menonaktifkan Admin?',
            function() {
                document.getElementById('non-activateForm').submit();
            },
            {
                icon: <?= json_encode(icon("usersAdmin", "w-24 h-24 text-red1")) ?>,
                confirmText: 'NonAktifkan',
                confirmClass: 'w-full px-6 py-2 bg-red1 text-white rounded-lg font-semibold hover:bg-red-800 transition hover:cursor-pointer',
                cancelText: 'Batalkan'
            }
        );
    }

    if(buttonNonAktif) {
        buttonNonAktif.addEventListener('click', konfirmasiNonAktif);
    }

</script>