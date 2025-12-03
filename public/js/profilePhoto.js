// Fungsi untuk menampilkan modal pilih avatar
function showAvatarOptions() {
    const avatarContent = `
        <div class="space-y-4">
            <p class="text-sm text-dark-overlay7 mb-4 text-center">Pilih cara mengganti foto profil Anda</p>
            
            <!-- Option 1: Upload dari File -->
            <button onclick="uploadFromFile()" 
                    class="w-full flex items-center gap-4 p-4 border-2 border-dark-overlay5 rounded-lg hover:border-blue-overlay hover:bg-background2 transition group">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-overlay bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <svg class="w-6 h-6 text-blue-overlay" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </div>
                <div class="text-left">
                    <p class="font-semibold text-dark-overlay">Upload Foto</p>
                    <p class="text-xs text-dark-overlay7">Pilih foto dari perangkat Anda</p>
                </div>
            </button>
            
            <!-- Option 2: Pilih Avatar -->
            <button onclick="chooseAvatar()" 
                    class="w-full flex items-center gap-4 p-4 border-2 border-dark-overlay5 rounded-lg hover:border-blue-overlay hover:bg-background2 transition group">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-overlay bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <svg class="w-6 h-6 text-blue-overlay" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292 4 4 0 010-5.292M15 12H9m0 0a4 4 0 118 0 4 4 0 01-8 0z"></path></svg>
                </div>
                <div class="text-left">
                    <p class="font-semibold text-dark-overlay">Pilih Avatar</p>
                    <p class="text-xs text-dark-overlay7">Gunakan avatar dari koleksi kami</p>
                </div>
            </button>
            
            <!-- Option 3: Hapus Foto (Reset ke Default) -->
            <button onclick="resetToDefault()" 
                    class="w-full flex items-center gap-4 p-4 border-2 border-dark-overlay5 rounded-lg hover:border-red1 hover:bg-red1 hover:bg-opacity-10 transition group">
                <div class="flex-shrink-0 w-12 h-12 bg-red1 bg-opacity-20 rounded-full flex items-center justify-center group-hover:bg-opacity-30 transition">
                    <svg class="w-6 h-6 text-red1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </div>
                <div class="text-left">
                    <p class="font-semibold text-dark-overlay">Hapus Foto</p>
                    <p class="text-xs text-dark-overlay7">Kembali ke avatar default</p>
                </div>
            </button>
        </div>
    `;
    
    Modal.open({
        title: 'Ganti Foto Profil',
        content: avatarContent,
        extraClass: 'max-w-md',
        buttons: [
            {
                text: 'Batal',
                className: 'w-full px-6 py-2 bg-dark-overlay5 text-dark-overlay rounded-lg font-semibold hover:bg-dark-overlay6 transition',
                onclick: Modal.close
            }
        ]
    });
}

// Fungsi untuk upload dari file
function uploadFromFile() {
    Modal.close();
    
    // Trigger file input
    const fileInput = document.getElementById('profileFileInput');
    fileInput.click();
    
    // Handle file selection
    fileInput.onchange = function(e) {
        const file = e.target.files[0];
        if (!file) return;
        
        // Validasi file
        if (!file.type.match('image.*')) {
            alert('Harap pilih file gambar yang valid (JPG, PNG, GIF)');
            return;
        }
        
        // Validasi ukuran (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB');
            return;
        }
        
        // Preview image
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('avatarPreview').innerHTML = 
                `<img src="${ev.target.result}" alt="preview" class="w-full h-full object-cover" />`;
        };
        reader.readAsDataURL(file);
        
        // Submit form
        document.getElementById('profilePhotoForm').submit();
    };
}

// Fungsi untuk memilih avatar
function chooseAvatar() {
    Modal.close();
    
    const avatarListContent = `
        <div class="space-y-4">
            <p class="text-sm text-dark-overlay7 mb-4 text-center">Pilih salah satu avatar di bawah ini</p>
            
            <!-- Avatar Grid -->
            <div class="grid grid-cols-3 gap-4">
                <!-- Avatar 1 -->
                <button onclick="selectAvatar('/img/avatars/avatar1.svg', 1)" 
                        class="avatar-choice p-4 rounded-lg bg-background2 hover:bg-blue-50 border-2 border-transparent hover:border-blue-overlay transition">
                    <img src="/img/avatars/avatar1.svg" alt="avatar1" class="w-16 h-16 mx-auto rounded-full">
                    <p class="text-xs text-center mt-2 text-dark-overlay7">Avatar 1</p>
                </button>
                
                <!-- Avatar 2 -->
                <button onclick="selectAvatar('/img/avatars/avatar2.svg', 2)" 
                        class="avatar-choice p-4 rounded-lg bg-background2 hover:bg-blue-50 border-2 border-transparent hover:border-blue-overlay transition">
                    <img src="/img/avatars/avatar2.svg" alt="avatar2" class="w-16 h-16 mx-auto rounded-full">
                    <p class="text-xs text-center mt-2 text-dark-overlay7">Avatar 2</p>
                </button>
                
                <!-- Avatar 3 -->
                <button onclick="selectAvatar('/img/avatars/avatar3.svg', 3)" 
                        class="avatar-choice p-4 rounded-lg bg-background2 hover:bg-blue-50 border-2 border-transparent hover:border-blue-overlay transition">
                    <img src="/img/avatars/avatar3.svg" alt="avatar3" class="w-16 h-16 mx-auto rounded-full">
                    <p class="text-xs text-center mt-2 text-dark-overlay7">Avatar 3</p>
                </button>
                
                <!-- Avatar 4 -->
                <button onclick="selectAvatar('/img/avatars/avatar4.svg', 4)" 
                        class="avatar-choice p-4 rounded-lg bg-background2 hover:bg-blue-50 border-2 border-transparent hover:border-blue-overlay transition">
                    <img src="/img/avatars/avatar4.svg" alt="avatar4" class="w-16 h-16 mx-auto rounded-full">
                    <p class="text-xs text-center mt-2 text-dark-overlay7">Avatar 4</p>
                </button>
                
                <!-- Avatar 5 -->
                <button onclick="selectAvatar('/img/avatars/avatar5.svg', 5)" 
                        class="avatar-choice p-4 rounded-lg bg-background2 hover:bg-blue-50 border-2 border-transparent hover:border-blue-overlay transition">
                    <img src="/img/avatars/avatar5.svg" alt="avatar5" class="w-16 h-16 mx-auto rounded-full">
                    <p class="text-xs text-center mt-2 text-dark-overlay7">Avatar 5</p>
                </button>
                
                <!-- Avatar 6 -->
                <button onclick="selectAvatar('/img/avatars/avatar6.svg', 6)" 
                        class="avatar-choice p-4 rounded-lg bg-background2 hover:bg-blue-50 border-2 border-transparent hover:border-blue-overlay transition">
                    <img src="/img/avatars/avatar6.svg" alt="avatar6" class="w-16 h-16 mx-auto rounded-full">
                    <p class="text-xs text-center mt-2 text-dark-overlay7">Avatar 6</p>
                </button>
            </div>
        </div>
    `;
    
    Modal.open({
        title: 'Pilih Avatar',
        content: avatarListContent,
        extraClass: 'max-w-lg',
        buttons: [
            {
                text: 'Batal',
                className: 'w-full px-6 py-2 bg-dark-overlay5 text-dark-overlay rounded-lg font-semibold hover:bg-dark-overlay6 transition',
                onclick: Modal.close
            }
        ]
    });
}

// Fungsi untuk memilih avatar tertentu
function selectAvatar(avatarPath, avatarId) {
    Modal.close();
    
    // Update preview
    document.getElementById('avatarPreview').innerHTML = 
        `<img src="${avatarPath}" alt="avatar" class="w-full h-full object-cover" />`;
    
    // Set hidden input
    document.getElementById('selectedAvatarInput').value = avatarPath;
    
    // Submit form
    document.getElementById('profilePhotoForm').submit();
}

// Fungsi untuk reset ke default
function resetToDefault() {
    Modal.confirm(
        'Hapus Foto Profil',
        'Apakah Anda yakin ingin menghapus foto profil dan kembali ke avatar default?',
        function() {
            // Set avatar ke kosong
            document.getElementById('selectedAvatarInput').value = '';
            
            // Update preview ke default
            document.getElementById('avatarPreview').innerHTML = `
                <div class="w-full h-full bg-purple-700 flex items-center justify-center">
                    <svg class="w-20 h-20 text-white1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5" /><path d="M4 20c0-4 4-6 8-6s8 2 8 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                </div>
            `;
            
            // Submit form
            document.getElementById('profilePhotoForm').submit();
        },
        {
            confirmText: 'Hapus',
            confirmClass: 'w-full px-6 py-2 bg-red1 text-white1 rounded-lg font-semibold hover:bg-red-800 transition',
            cancelText: 'Batal'
        }
    );
}
