/**
 * FULL LOGIC FILTER & SEARCH
 * File: public/js/filter.js
 */

// 1. TOGGLE DROPDOWN VISIBILITY
function toggleDropdown(dropdownId) {
    const menu = document.getElementById(dropdownId);
    if (!menu) return;

    // Tutup dropdown lain sebelum membuka yang baru (opsional)
    document.querySelectorAll('.filter-dropdown-menu').forEach(el => {
        if (el.id !== dropdownId) el.classList.add('hidden');
    });

    menu.classList.toggle('hidden');
}

// 2. TOGGLE CHECKBOX VALUE
// Dipanggil saat item di dropdown diklik
function toggleFilter(filterName, value, labelId, defaultLabel) {
    const hiddenInput = document.getElementById(filterName);
    const labelSpan = document.getElementById(labelId);
    
    if (!hiddenInput) return;

    // Ambil value saat ini, pecah jadi array
    let currentValues = hiddenInput.value ? hiddenInput.value.split(',') : [];

    // Cek apakah value sudah dipilih?
    if (currentValues.includes(value)) {
        // Jika sudah ada, hapus (Uncheck)
        currentValues = currentValues.filter(item => item !== value);
    } else {
        // Jika belum ada, tambah (Check)
        currentValues.push(value);
    }

    // Gabungkan kembali jadi string (contoh: "Selesai,Ditolak")
    hiddenInput.value = currentValues.join(',');

    // Update Label Tombol (UI Feedback)
    if (labelSpan) {
        if (currentValues.length > 0) {
            labelSpan.textContent = `${currentValues.length} ${defaultLabel}`;
            labelSpan.classList.add('text-blue-600', 'font-semibold');
        } else {
            labelSpan.textContent = defaultLabel;
            labelSpan.classList.remove('text-blue-600', 'font-semibold');
        }
    }

    // Update UI Checkbox/Warna di dalam dropdown (Opsional, perlu ID unik per item)
    // Logika sederhananya: cari elemen visual check dan toggle hidden/visible
    const checkIcon = document.getElementById(`check_${filterName}_${value.replace(/\s/g, '_')}`);
    if(checkIcon) {
        checkIcon.classList.toggle('opacity-0'); // Asumsi icon punya class opacity-0 jika unchecked
    }
}

// 3. RESET FORM
function resetForm() {
    const form = document.getElementById('mainForm');
    if (!form) return;

    // Bersihkan semua input text dan hidden
    form.querySelectorAll('input').forEach(input => {
        input.value = '';
    });

    // Submit form (akan reload halaman tanpa filter)
    form.submit();
}

// 4. EVENT LISTENER (Saat halaman selesai dimuat)
document.addEventListener('DOMContentLoaded', () => {
    
    // A. Klik di luar dropdown akan menutup dropdown
    document.addEventListener('click', (e) => {
        const isDropdown = e.target.closest('.relative'); // Asumsi container dropdown punya class relative
        if (!isDropdown) {
            document.querySelectorAll('.filter-dropdown-menu').forEach(menu => {
                if(!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                }
            });
        }
    });

    // B. (Opsional) Highlight Filter Button jika ada filter aktif
    const params = new URLSearchParams(window.location.search);
    const filterBtn = document.getElementById('filter-action-btn');
    let hasFilter = false;
    
    params.forEach((val, key) => {
        if(val && key !== 'page' && key !== 'search') hasFilter = true;
    });

    if (hasFilter && filterBtn) {
        filterBtn.classList.add('border-blue-500', 'text-blue-500');
    }
});