// public/js/uploadFile.js
class UploadFile {
    static init() {
        const input = document.getElementById('buktiKubaca');
        const display = document.getElementById('fileNameDisplay');
        if (!input || !display) return;

        const label = input.closest('label');
        const clearBtn = label.querySelector('.clear-file');

        input.addEventListener('change', () => {
            if (input.files && input.files[0]) {
                display.textContent = input.files[0].name;
                display.classList.remove('text-dark-overlay6');
                display.classList.add('text-blue-overlay', 'font-semibold', 'underline');

                // Munculin tombol silang + kasih ruang
                clearBtn.classList.remove('opacity-0', 'pointer-events-none');
                clearBtn.classList.add('opacity-100', 'pointer-events-auto');
                label.classList.add('pr-12');  // ← JS yang handle
            } else {
                display.textContent = 'Belum ada file yang dipilih';
                display.classList.remove('text-blue-overlay', 'font-semibold', 'underline');
                display.classList.add('text-dark-overlay6');

                clearBtn.classList.add('opacity-0', 'pointer-events-none');
                clearBtn.classList.remove('opacity-100', 'pointer-events-auto');
                label.classList.remove('pr-12'); // ← JS yang hapus lagi
            }
        });

        clearBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            input.value = '';
            input.dispatchEvent(new Event('change'));
        });
    }
}

document.addEventListener('DOMContentLoaded', UploadFile.init);