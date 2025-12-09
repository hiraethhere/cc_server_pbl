// register.js

document.addEventListener('DOMContentLoaded', function() {
    // Ambil data dari PHP
    const registerDataJurusan = json_encode($dataJurusan); 
    const registerDataProdi = json_encode($dataProdi);
    
    const roleSelect = document.getElementById('jenis_anggota');
    const jurusanSelect = document.getElementById('jurusan_select');
    const jurusanText = document.getElementById('jurusan_text');
    
    const prodiContainer = document.getElementById('container_prodi');
    const prodiSelect = document.getElementById('prodi');

    // --- 1. Logic Ganti Role (Mahasiswa/Dosen/Staff) ---
    roleSelect.addEventListener('change', function() {
        const selectedRole = this.value;

        // Reset Form
        jurusanSelect.value = "";
        jurusanText.value = "";
        prodiSelect.innerHTML = '<option value="" disabled selected hidden>Pilih Prodi</option>';

        if (selectedRole === 'mahasiswa') {
            // Tampilkan Mode Mahasiswa (Dropdown Jurusan & Prodi)
            jurusanSelect.classList.remove('hidden');
            jurusanText.classList.add('hidden');
            prodiContainer.classList.remove('hidden');

            // Isi Dropdown Jurusan
            populateJurusan();
        } else {
            // Tampilkan Mode Staff/Dosen (Input Text Jurusan)
            jurusanSelect.classList.add('hidden');
            jurusanText.classList.remove('hidden');
            prodiContainer.classList.add('hidden');
        }
    });

    // --- 2. Fungsi Mengisi Dropdown Jurusan ---
    function populateJurusan() {
        jurusanSelect.innerHTML = '<option value="" disabled selected hidden>Pilih Jurusan</option>';
        
        // Loop array biasa
        registerDataJurusan.forEach(namaJurusan => {
            const option = document.createElement('option');
            // Value kita set sama dengan Text agar bisa dipakai untuk kunci ambil data Prodi
            option.value = namaJurusan; 
            option.textContent = namaJurusan;
            jurusanSelect.appendChild(option);
        });
    }

    // --- 3. Logic Ganti Jurusan (Mengisi Prodi) ---
    jurusanSelect.addEventListener('change', function() {
        const selectedJurusan = this.value; // Contoh: "Teknik Mesin"

        // Bersihkan prodi lama
        prodiSelect.innerHTML = '<option value="" disabled selected hidden>Pilih Prodi</option>';

        // Ambil array prodi langsung dari Object berdasarkan Key (Nama Jurusan)
        // Cek apakah data prodi untuk jurusan tersebut ada?
        if (registerDataProdi[selectedJurusan]) {
            
            const listProdi = registerDataProdi[selectedJurusan];

            listProdi.forEach(namaProdi => {
                const option = document.createElement('option');
                option.value = namaProdi; 
                option.textContent = namaProdi;
                prodiSelect.appendChild(option);
            });
            
            prodiSelect.disabled = false;
        } else {
            // Handle jika jurusan tidak punya prodi di data JSON
            const option = document.createElement('option');
            option.textContent = "Data prodi tidak ditemukan";
            prodiSelect.appendChild(option);
            prodiSelect.disabled = true;
        }
    });
});
