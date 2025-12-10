<main class="flex-1 p-8 overflow-y-auto bg-background1">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm flex">
        <a href="/Admin/Peminjaman" class="text-blue-overlay hover:text-blue-700">Data Peminjaman Ruangan</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <a href="/Admin/buatBooking" class="text-blue-overlay hover:text-blue-700">Buat Peminjaman</a>
        <span class="mx-2 text-dark-overlay6">
            <div>
                <?= icon('arrowRight', 'w-5 h-5') ?>
            </div>
        </span>
        <span class="font-medium text-dark-overlay6">Booking</span>
    </nav>

    <h2 class="text-2xl font-bold text-dark-overlay">Booking</h2>

    <div class="flex flex-col gap-8 lg:grid lg:grid-cols-3 lg:gap-8 mt-4">
        <div class="order-2 lg:order-0 lg:col-span-2">
            <div class="bg-background2 rounded-xl shadow-xl p-6 md:p-8">

                <form id="bookingForm" action="/admin/handleBooking" method="POST">
                    <input type="hidden" id="id_room" name="id_room" value="<?= $detailRuangan['id_room'] ?>">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-dark-overlay7 mb-2 flex items-center">
                                Tanggal Pinjam
                            </label>
                            <input type="date" id="tanggalPinjam" name="tanggalPinjam" required
                                class="w-full p-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-sm">
                        </div>
                        <div class="flex items-end">
                            <div class="w-full">
                                <label class="block text-sm font-semibold text-dark-overlay7 mb-2 flex items-center">
                                    Total Jam
                                </label>
                                <div id="totalTime" class="inline-flex items-center py-2 text-dark-overlay font-bold rounded-full text-xl">
                                    0 Jam 0 Menit
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="relative">
                            <label class="block text-sm font-semibold text-dark-overlay7 mb-2 flex items-center">
                                Jam Mulai
                            </label>
                            <select id="jamMulai" name="jamMulai" disabled required class="w-full p-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none text-sm">
                                <option value="" disabled selected hidden>Pilih jam mulai</option>
                            </select>
                        </div>
                        <div class="relative">
                            <label class="block text-sm font-semibold text-dark-overlay7 mb-2 flex items-center">
                                Jam Selesai
                            </label>
                            <select id="jamSelesai" name="jamSelesai" disabled required class="w-full p-4 py-2 border border-dark-overlay4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none text-sm">
                                <option value="" disabled selected hidden>Pilih jam selesai</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-dark-overlay7 mb-4 flex items-center">
                            Daftar Anggota
                        </label>
                        <div id="membersContainer" class="space-y-4">
                            <div class="member-card p-4 bg-blue-overlay1 rounded-xl border border-dark-overlay4">
                                <div class="flex items-center mb-2">
                                    <span class="inline-flex items-center justify-center w-7 h-7 bg-blue-overlay text-white rounded-full text-xs font-bold">1</span>
                                    <span class="ml-2 font-medium text-sm text-blue-overlay">Penanggung Jawab</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <input type="text" maxlength="10" max="10" placeholder="NIM/NIP Ketua" name="nim[]"
                                        class="nim-input w-full px-4 py-2.5 border border-dark-overlay4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-background2">
                                    <input type="text" name="nama[] " placeholder="Nama Lengkap Ketua"
                                        class="nama-input w-full px-4 py-2.5 border border-dark-overlay4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm bg-background2">
                                </div>
                            </div>
                            <!-- anggota booking -->
                            <?php for ($p= 0; $p < $detailRuangan['min_capacity'] - 1 ; $p++) :?>
                            <div class="member-card p-4 bg-background2 rounded-xl border border-dark-overlay4">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center w-7 h-7 bg-dark-overlay7 text-white rounded-full text-xs font-bold"><?= $p + 2 ?></span>
                                        <span class="ml-2 font-medium text-sm text-dark-overlay7">Anggota</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <input type="text" maxlength="10" placeholder="NIM/NIP Anggota *" name="nim[]" required
                                        class="nim-input w-full px-4 py-2.5 border border-dark-overlay4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                                    <input type="text" placeholder="Nama Lengkap Anggota" name="nama[]" readonly
                                        class="nama-input w-full px-4 py-2.5 border border-dark-overlay4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                                </div>
                            </div>
                            <?php endfor ?>
                        </div>
                        <button type="button" onclick="addMember()" id="addMember"
                                class="rounded-md mt-4 flex items-center bg-blue-overlay1 text-blue-overlay hover:text-blue-700 hover:bg-blue-200 hover:cursor-pointer text-sm font-medium transition px-4 py-1">
                            Tambah Anggota
                            <div class="ml-2 font-semibold">
                                <?= icon('plus', 'w-4 h-4') ?>
                            </div>
                        </button>
                    </div>

                    <div id="errorMessage" class="hidden mb-6 p-4 bg-red-50 border border-red-300 text-red1 rounded-xl flex items-start text-sm">
                        <div class="ml-2 font-semibold">
                            <?= icon('warning', 'w-4 h-4') ?>
                        </div>
                        <span></span>
                    </div>

                    <div class="flex flex-row justify-between gap-6">
                        <button type="button" onclick="window.location.href='<?= BASEURL . 'admin/buatBooking' ?>'"
                                class="w-full py-3 hover:cursor-pointer text-dark-overlay4 border border-dark-overlay4 font-bold rounded-xl hover:bg-dark-overlay1 transition shadow-sm text-base">
                            Batal
                        </button>
                        <button type="button" onclick="konfirmasiBooking()"
                                class="w-full py-3 hover:cursor-pointer bg-green1 text-white font-bold rounded-xl hover:bg-green-600 transition shadow-sm text-base">
                            Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="order-1 lg:order-0 lg:col-span-1 space-y-6 lg:sticky">
    
            <!-- KARTU RUANGAN (TIDAK STICKY) -->
            <div class="bg-background2 rounded-xl shadow-lg overflow-hidden">
                <?php 
                    // Ambil URL gambar dari array PHP
                    //$imageUrl = "/img/" . $detailRuangan['img_room'];
                ?>

                <div class="h-56 relative overflow-hidden bg-background2" 
                    style="background-image: url('/img/DefaultRuangan.jpg'); 
                            background-size: cover; 
                            background-position: center;">
                    <!-- Overlay Rating (mirip gambar) -->
                    <div class="absolute bottom-2 left-2 flex items-center gap-3 px-5 py-1
                                    bg-dark-overlay5
                                    rounded-lg
                                    animate-in fade-in slide-in-from-bottom duration-500">
                        
                        <!-- Bintang -->
                        <div class="flex items-center gap-1">
                             <?php 
                            $max = 5;
                            for ($i = 1; $i <= $max; $i++):
                            if ($i <= $detailRuangan['avg_rating']) {
                                echo icon('starFill', 'w-5 h-5 text-yellow1');   // bintang terisi
                            } else {
                                echo icon('starFill', 'w-5 h-5 text-dark-overlay5'); // bintang kosong/gelap
                            }
                                endfor; ?>  
                        </div>

                        <!-- Teks rating -->
                        <div class="text-white">
                            <span class="text-xl font-bold"><?= round($detailRuangan['avg_rating']) ?>/5</span>
                            <span class="text-sm font-medium text-white ml-2">(<?= $detailRuangan['total_review'] ?> Respon)</span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                        <h3 class="font-bold text-2xl text-black mb-4"><?= htmlspecialchars($detailRuangan['room_name'] ?? '-') ?></h3>
                        <div class="space-y-3 text-sm text-black3 mb-2 gap-4">
                            <div class="flex items-center">
                                <div class="flex items-center text-black2">
                                    <?= icon('location', 'w-5 h-5 mr-3') ?> 
                                </div>    
                                <p class="">Lantai <?= htmlspecialchars($detailRuangan['floor'] ?? '-')  ?></p>
                            </div>
    
                            <div class="flex items-center text-black">
                                <div class="flex items-center text-black2">
                                    <?= icon('userOutline', 'w-5 h-5 mr-3') ?> 
                                </div>    
                                <p ><?= htmlspecialchars($detailRuangan['min_capacity'] ?? '-') . '-' . htmlspecialchars($detailRuangan['max_capacity'] ?? '-')   ?>orang</p>
                            </div>
                            
                        </div>
                        <details class="text-dark-overlay8 mt-4">
                            <summary class="text-base cursor-pointer text-dark-overlay8 flex items-center">
                                Deskripsi Ruangan
                                <div class="flex items-center">
                                    <?= icon('arrowDown', 'w-6 h-6 ml-2') ?> 
                                </div>
                            </summary>
                            <p class="mt-3 text-sm leading-relaxed text-justify">
                                <?= htmlspecialchars($detailRuangan['short_description'] ?? '-')  ?>
                            </p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script> const BASEURL = '<?= BASEURL ?>'</script>    
<script>
    // Add member (WAJIB JS)
    const addButton = document.getElementById('addMember');
    addButton.addEventListener('click', addMember)
    let memberCount = <?= $p + 1?>;
    function addMember() {
        memberCount++;
        const container = document.getElementById('membersContainer');
        const newCard = document.createElement('div');
        newCard.className = 'member-card p-4 bg-white1 rounded-xl border border-dark-overlay5';
        newCard.innerHTML = `
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center">
                    <span class="inline-flex items-center justify-center w-7 h-7 bg-dark-overlay7 text-white rounded-full text-xs font-bold">${memberCount}</span>
                    <span class="ml-2 font-medium text-sm text-dark-overlay7">Anggota</span>
                </div>
                <button type="button" onclick="removeMember(this)" class="text-red1 hover:text-red-800 transition hover:cursor-pointer">
                    <div>
                        <?= icon('trash', 'w-6 h-6') ?>
                    </div>
                </button>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <input type="text" maxlength="10" placeholder="NIM/NIP Anggota" name="nim[]" required
                    class="nim-input w-full px-4 py-2.5 border border-dark-overlay5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-dark-overlay bg-white text-sm">
                <input type="text" placeholder="Nama Lengkap Anggota" name="nama[]" readonly
                    class="nama-input w-full px-4 py-2.5 border border-dark-overlay5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-dark-overlay bg-white text-sm">
            </div>
        `;
        container.appendChild(newCard);
        if (memberCount == <?= $detailRuangan['max_capacity'] ?>) {
        addButton.classList.add('hidden'); // sembunyikan tombol
        return; // hentikan eksekusi fungsi 
        }
    }

    // Remove member (WAJIB JS)
    function removeMember(button) {
        const cards = document.querySelectorAll('.member-card');
        if (cards.length <= 2) {
            // Mengganti showError() dengan alert sederhana
            alert('Minimal harus ada 2 orang (perwakilan + 1 anggota).');
            return;
        }
        button.closest('.member-card').remove();
        document.querySelectorAll('.member-card').forEach((card, i) => {
            card.querySelector('span.rounded-full').textContent = i + 1;
        });
        memberCount = document.querySelectorAll('.member-card').length;
        addButton.classList.remove('hidden')
    }

    function konfirmasiBooking() {
        Modal.confirm(
            'Konfirmasi Booking',
            'Apakah anda yakin data yang anda input sudah benar?',
            function() {
            // ini yang benar untuk POST form, bukan window.location.href
            document.getElementById('bookingForm').submit();
            },
            {
            icon: <?= json_encode(icon("calendar", "w-12 h-12", "green1")) ?>,
            confirmText: 'Booking',
            confirmClass: 'w-full px-6 py-2 bg-green1 text-white rounded-lg font-semibold hover:bg-green-700 transition hover:cursor-pointer',
            cancelText: 'Batalkan'
            }
        );
    }
</script>
<script src="/js/bookingRoom.js"></script>