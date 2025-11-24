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
});
// Jangan lupa sertakan logika search dan clear filter Anda di file ini juga