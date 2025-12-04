<main class="flex-1 p-8 max-w-7xl mx-auto">
    <nav class="mb-6 text-sm">
        <a href="/Admin/Feedback" class="text-dark-overlay6 hover:text-blue-overlay">Data Feedback</a>
    </nav>
    <h2 class="text-xl font-bold text-dark-overlay mb-6">Data Feedback</h2>
    

    <div class="flex items-center gap-3 pb-2">
        <?php 
            $filter_id = 'Ruangan'; 
            $label = 'Ruangan'; 
            $options = ['Ruang Duta' => 'Ruang Duta', 'Ruang Meeting Kecil' => 'Ruang Meeting Kecil']; 
            $current_values = $_GET[$filter_id] ?? ''; 
            include __DIR__ . '/../../template/filterDropDown.php';
            ?>

        <?php 
            $filter_id = 'Bulan'; 
            $label = 'Bulan'; 
            $options = ['Januari' => 'Januari', 'Februari' => 'Februari']; 
            $current_values = $_GET[$filter_id] ?? ''; 
            include __DIR__ . '/../../template/filterDropDown.php';
            ?>

        <?php 
            $filter_id = 'Tahun'; 
            $label = 'Tahun'; 
            $options = ['2025' => '2025', '2024' => '2024']; 
            $current_values = $_GET[$filter_id] ?? ''; 
            include __DIR__ . '/../../template/filterDropDown.php';
            ?>

        <button type="button" id="filter-action-btn"
                class="p-2 text-dark-overlay5 hover:text-dark-overlay7 hover:bg-dark-overlay1 rounded-lg transition border border-dark-overlay5 bg-white">
            <div id="filter-action-icon" class="text-dark-overlay5"
                    data-check="<?= htmlspecialchars(icon('check', 'w-4 h-4 text-blue-overlay'), ENT_QUOTES) ?>"
                    data-cross="<?= htmlspecialchars(icon('cross', 'w-4 h-4 text-red1'), ENT_QUOTES) ?>">
                <?= icon('check', 'w-4 h-4 text-blue-overlay') ?>
            </div>
        </button>
    </div>

    <!-- Feedback Cards Grid -->
    <div id="feedbackGrid" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <!-- Feedback Card -->
        <div class="feedback-card card-hover bg-background2 rounded-lg shadow-md p-6">
            
            <!-- Header -->
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-lg font-bold text-dark-overlay">Ruang Lentera Edukasi</h3>
                <span class="bg-blue-overlay-15 text-sm px-2 py-1 rounded-full text-dark-overlay7 font-medium">Kode: 123456</span>
            </div>

            <!-- Date & Time -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-2">
                <?= icon('calendar', 'w-4 h-4') ?>
                <span>30 November 2025, 12:00 - 15:00</span>
            </div>

            <!-- Rater -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-3">
                <?= icon('user', 'w-4 h-4') ?>
                <span>Penanggung Jawab: <strong>Muhammad Reza Arifin</strong></span>
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <div class="flex items-center gap-1">
                    <span class="text-sm text-dark-overlay mr-2">Rating:</span>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-dark-overlay5') ?>
                    <span class="text-sm text-dark-overlay ml-2">(4/5)</span>
                </div>
            </div>

            <!-- Comment -->
            <div class="">
                <p class="text-sm text-dark-overlay mb-1">Komentar/Pesan:</p>
                <textarea id="feedbackText" readonly
                          placeholder="Data menyusul" 
                          class="w-full px-4 py-3 text-sm rounded-lg focus:outline-none resize-none bg-blue-overlay-15" 
                          rows="5"></textarea>
            </div>
        </div>



        <!-- Feedback Card -->
        <div class="feedback-card card-hover bg-background2 rounded-lg shadow-md p-6">
            
            <!-- Header -->
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-lg font-bold text-dark-overlay">Ruang Lentera Edukasi</h3>
                <span class="bg-blue-overlay-15 text-sm px-2 py-1 rounded-full text-dark-overlay7 font-medium">Kode: 123456</span>
            </div>

            <!-- Date & Time -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-2">
                <?= icon('calendar', 'w-4 h-4') ?>
                <span>30 November 2025, 12:00 - 15:00</span>
            </div>

            <!-- Rater -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-3">
                <?= icon('user', 'w-4 h-4') ?>
                <span>Penanggung Jawab: <strong>Muhammad Reza Arifin</strong></span>
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <div class="flex items-center gap-1">
                    <span class="text-sm text-dark-overlay mr-2">Rating:</span>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-dark-overlay5') ?>
                    <span class="text-sm text-dark-overlay ml-2">(4/5)</span>
                </div>
            </div>

            <!-- Comment -->
            <div class="">
                <p class="text-sm text-dark-overlay mb-1">Komentar/Pesan:</p>
                <textarea id="feedbackText" readonly
                          placeholder="Data menyusul" 
                          class="w-full px-4 py-3 text-sm rounded-lg focus:outline-none resize-none bg-blue-overlay-15" 
                          rows="5"></textarea>
            </div>
        </div>



        <!-- Feedback Card -->
        <div class="feedback-card card-hover bg-background2 rounded-lg shadow-md p-6">
            
            <!-- Header -->
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-lg font-bold text-dark-overlay">Ruang Lentera Edukasi</h3>
                <span class="bg-blue-overlay-15 text-sm px-2 py-1 rounded-full text-dark-overlay7 font-medium">Kode: 123456</span>
            </div>

            <!-- Date & Time -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-2">
                <?= icon('calendar', 'w-4 h-4') ?>
                <span>30 November 2025, 12:00 - 15:00</span>
            </div>

            <!-- Rater -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-3">
                <?= icon('user', 'w-4 h-4') ?>
                <span>Penanggung Jawab: <strong>Muhammad Reza Arifin</strong></span>
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <div class="flex items-center gap-1">
                    <span class="text-sm text-dark-overlay mr-2">Rating:</span>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-dark-overlay5') ?>
                    <span class="text-sm text-dark-overlay ml-2">(4/5)</span>
                </div>
            </div>

            <!-- Comment -->
            <div class="">
                <p class="text-sm text-dark-overlay mb-1">Komentar/Pesan:</p>
                <textarea id="feedbackText" readonly
                          placeholder="Data menyusul" 
                          class="w-full px-4 py-3 text-sm rounded-lg focus:outline-none resize-none bg-blue-overlay-15" 
                          rows="5"></textarea>
            </div>
        </div>



        <!-- Feedback Card -->
        <div class="feedback-card card-hover bg-background2 rounded-lg shadow-md p-6">
            
            <!-- Header -->
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-lg font-bold text-dark-overlay">Ruang Lentera Edukasi</h3>
                <span class="bg-blue-overlay-15 text-sm px-2 py-1 rounded-full text-dark-overlay7 font-medium">Kode: 123456</span>
            </div>

            <!-- Date & Time -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-2">
                <?= icon('calendar', 'w-4 h-4') ?>
                <span>30 November 2025, 12:00 - 15:00</span>
            </div>

            <!-- Rater -->
            <div class="flex items-center gap-2 text-sm text-dark-overlay mb-3">
                <?= icon('user', 'w-4 h-4') ?>
                <span>Penanggung Jawab: <strong>Muhammad Reza Arifin</strong></span>
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <div class="flex items-center gap-1">
                    <span class="text-sm text-dark-overlay mr-2">Rating:</span>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-yellow1') ?>
                    <?= icon('starFill', 'w-5 h-5 text-dark-overlay5') ?>
                    <span class="text-sm text-dark-overlay ml-2">(4/5)</span>
                </div>
            </div>

            <!-- Comment -->
            <div class="">
                <p class="text-sm text-dark-overlay mb-1">Komentar/Pesan:</p>
                <textarea id="feedbackText" readonly
                          placeholder="Data menyusul" 
                          class="w-full px-4 py-3 text-sm rounded-lg focus:outline-none resize-none bg-blue-overlay-15" 
                          rows="5"></textarea>
            </div>
        </div>
    </div>
</main>