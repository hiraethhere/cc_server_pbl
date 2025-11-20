// public/js/register.js
class RegisterForm {
    static init() {
        // Toggle Password (sudah dari togglePassword.js)
        // Upload File (sudah dari uploadFile.js)
        // Sekarang kita tambah logic Jurusan → Prodi

        const dataKampus = window.registerDataProdi; // Data dari PHP akan kita inject di HTML

        const jurusanSelect = document.getElementById('jurusan');
        const prodiSelect = document.getElementById('prodi');

        if (!jurusanSelect || !prodiSelect || !dataKampus) return;

        jurusanSelect.addEventListener('change', function () {
            const selectedJurusan = this.value;
            const listProdi = dataKampus[selectedJurusan];

            // Reset Prodi
            prodiSelect.innerHTML = '<option value="" disabled selected hidden>Pilih Prodi</option>';
            prodiSelect.disabled = true;
            prodiSelect.classList.add('disabled:opacity-50');

            if (listProdi && Array.isArray(listProdi)) {
                listProdi.forEach(prodiName => {
                    const option = document.createElement('option');
                    option.value = prodiName;
                    option.textContent = prodiName;
                    prodiSelect.appendChild(option);
                });
                prodiSelect.disabled = false;
                prodiSelect.classList.remove('disabled:opacity-50');
            }
        });
    }
}

// Jalankan otomatis
document.addEventListener('DOMContentLoaded', RegisterForm.init);