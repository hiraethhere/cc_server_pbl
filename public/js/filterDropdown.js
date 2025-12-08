// public/js/filter.js

// === 1. LOGIKA UTAMA DROPDOWN (TOGGLE) ===

/**
 * Mengubah visibilitas dropdown (menu opsi).
 * @param {string} dropdownId - ID unik dari elemen dropdown menu (misalnya: 'jenis_anggota_menu').
 */
function toggleDropdown(dropdownId) {
    const dropdownMenu = document.getElementById(dropdownId);
    if (dropdownMenu) {
        // Toggle class 'hidden' untuk menampilkan/menyembunyikan menu
        dropdownMenu.classList.toggle('hidden');
        
        // Logika untuk menutup dropdown lain saat dropdown ini dibuka (opsional tapi disarankan)
        document.querySelectorAll('.filter-dropdown-menu').forEach(menu => {
            if (menu.id !== dropdownId) {
                menu.classList.add('hidden');
            }
        });
    }
}

// === 2. LOGIKA STATE (CHECKBOX DAN HIDDEN INPUT) ===

/**
 * Logika untuk toggle checkbox, update hidden input, dan update label tombol.
 * @param {string} filterName - Nama filter (ID dari hidden input, e.g., 'jenis_anggota').
 * @param {string} value - Nilai yang dipilih/dihapus (e.g., 'Mahasiswa').
 * @param {string} labelId - ID dari elemen span label tombol (e.g., 'jenis_anggota_label').
 * @param {string} defaultLabel - Label default (e.g., 'Jenis Anggota').
 */
function toggleFilter(filterName, value, labelId, defaultLabel) {
    const hiddenInput = document.getElementById(filterName);
    const labelElement = document.getElementById(labelId);
    if (!hiddenInput || !labelElement) return;

    let values = hiddenInput.value.split(',').filter(v => v !== '');
    const index = values.indexOf(value);

    // Toggle nilai dalam array
    if (index > -1) {
        values.splice(index, 1); // Hapus (Uncheck)
    } else {
        values.push(value);      // Tambahkan (Check)
    }

    // Update hidden input
    hiddenInput.value = values.join(',');

    // Update label tombol
    updateButtonLabel(labelElement, values, defaultLabel);
    
    // PENTING: Panggil fungsi AJAX/Submit Form rekan Anda di sini
    // applyFilters(); 
    // from backend: no ajax no fetch fak yu
}

/**
 * Memperbarui teks pada tombol dropdown berdasarkan nilai yang dipilih.
 */
function updateButtonLabel(labelElement, values, defaultLabel) {
    const count = values.length;
    if (count > 0) {
        labelElement.textContent = `${count} Filter Aktif`;
    } else {
        labelElement.textContent = defaultLabel;
    }
}

function applyFilters() {
    const params = new URLSearchParams(window.location.search);

    const currentTab = params.get('tab');

    // ambil semua hidden input filter
    document.querySelectorAll('input[type="hidden"]').forEach(input => {
        params.delete(input.name);
        if (input.value.trim() !== '') {
            params.set(input.name, input.value);
        } else {
            // PENTING: Jika kosong, HAPUS dari URL agar tidak jadi parameter sampah (status=)
            params.delete(input.name);
        }
    });

    

    // reset page ke 1
    params.set('page', 1);

    window.location.href = window.location.pathname + '?' + params.toString();
}


// === 3. LOGIKA UNTUK MENJAGA STATE SETELAH REFRESH (OPSIONAL TAPI BAIK) ===
document.addEventListener('DOMContentLoaded', () => {
    // Cari semua hidden input yang merupakan filter dan inisialisasi label
    document.querySelectorAll('.filter-dropdown-container').forEach(container => {
        const filterName = container.getAttribute('data-filter-id');
        const defaultLabel = container.getAttribute('data-default-label');
        
        const hiddenInput = document.getElementById(filterName);
        const labelElement = document.getElementById(filterName + '_label');
        
        if (hiddenInput && labelElement) {
             const currentValues = hiddenInput.value.split(',').filter(v => v !== '');
             updateButtonLabel(labelElement, currentValues, defaultLabel);
             
             // Pastikan checkbox yang sesuai tercentang saat DOM dimuat
             currentValues.forEach(val => {
                const checkboxId = filterName + '_' + val.toLowerCase().replace(/[^a-z0-9]/g, '_');
                const checkbox = document.getElementById(checkboxId);
                if (checkbox) {
                    checkbox.checked = true;
                }
             });
        }
    });

    // Event listener untuk menutup dropdown saat klik di luar
document.addEventListener('click', (event) => {
        let isDropdown = event.target.closest('.filter-dropdown-container');
        if (!isDropdown) {
            document.querySelectorAll('.filter-dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    // === 4. FILTER ACTION BUTTON TOGGLE ICON (Check <-> Cross) ===
    (function() {
        const btn = document.getElementById('filter-action-btn');
        const iconContainer = document.getElementById('filter-action-icon');
        const form = document.getElementById('filterForm');

        if (!btn || !iconContainer) return;

        function filtersActiveFromURL() {
            const params = new URLSearchParams(window.location.search);
            for (const [k, v] of params) {
                if (v !== '' && k !== 'page' && k !== 'tab') return true;
            }
            return false;
        }

        function update() {
            const active = filtersActiveFromURL();
            const checkHTML = iconContainer.dataset.check || '';
            const crossHTML = iconContainer.dataset.cross || '';

            if (active) {
                // 🔴 MODE RESET
                if (crossHTML) iconContainer.innerHTML = crossHTML;

                btn.onclick = function(e) {
                    const url = new URL(window.location.href);
                    e.preventDefault();

                    // hapus semua filter kecuali search tertentu kalau mau
                    const filtersToDelete = ['page', 'jenis', 'Jenis', 'status', 'Status', 'jurusan', 'Jurusan', 'url'];

                    //Loop array di atas dan hapus dari URL
                    filtersToDelete.forEach(p => url.searchParams.delete(p));
                    // reset URL tanpa query
                    window.location.href = url.toString();
                };
                btn.classList.remove('text-dark-overlay5');
                btn.classList.add('text-red1');
            } else {
                // show check and make button apply/submit filters
                if (checkHTML) iconContainer.innerHTML = checkHTML;
                btn.onclick = function() {
                    applyFilters();
                };
                btn.classList.remove('text-red1');
                btn.classList.add('text-dark-overlay5');
            }
        }

        // Initial update and also watch for history changes (back/forward)
        update();
        window.addEventListener('popstate', update);
    })();
});
// Jangan lupa sertakan logika search dan clear filter Anda di file ini juga