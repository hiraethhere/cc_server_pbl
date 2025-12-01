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

        // Listener saat tombol Hapus diklik
        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            searchInput.focus();
            clearBtn.classList.add('hidden');
        });
    }
});