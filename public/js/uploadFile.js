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
                display.classList.remove('text-gray-500');
                display.classList.add('text-blue-600', 'font-medium');

                // Munculin tombol silang + kasih ruang
                clearBtn.classList.remove('opacity-0', 'pointer-events-none');
                clearBtn.classList.add('opacity-100', 'pointer-events-auto');
                label.classList.add('pr-12');  // ← JS yang handle
            } else {
                display.textContent = 'Belum ada file yang dipilih';
                display.classList.remove('text-blue-600', 'font-medium');
                display.classList.add('text-gray-500');

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