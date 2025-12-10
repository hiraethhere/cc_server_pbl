document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const clearBtn = document.getElementById('clear-search');

    if (searchInput && clearBtn) {
        // Inisialisasi: Tentukan visibilitas tombol Hapus saat halaman dimuat
        clearBtn.classList.toggle('hidden', searchInput.value === '');
        
        // Listener saat user mengetik
        searchInput.addEventListener('input', () => {
            clearBtn.classList.toggle('hidden', searchInput.value === '');
        });

        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault(); // Mencegah form submit default (agar tidak reload page biasa)
                
                // Panggil fungsi applyFilters() yang ada di filter.js
                if (typeof applyFilters === 'function') {
                    applyFilters(); 
                } else {
                    console.error('Fungsi applyFilters tidak ditemukan! Pastikan filter.js sudah di-load.');
                }
            }
        });

        // Listener saat tombol Hapus diklik
        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            searchInput.focus();
            clearBtn.classList.add('hidden');
        });
    }
});