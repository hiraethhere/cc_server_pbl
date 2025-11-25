// public/js/modal.js
// Object untuk mengelola modal - menggunakan pola Singleton

const Modal = {
    // Fungsi untuk membuka modal
    open: function(options) {
        // Ambil element modal
        const modal = document.getElementById('reusableModal');
        const title = document.getElementById('modalTitle');
        const content = document.getElementById('modalContent');
        const buttons = document.getElementById('modalButtons');
        const iconContainer = document.getElementById('modalIcon');
        const iconImg = document.getElementById('modalIconImg');
        
        // Set title
        title.textContent = options.title || 'Informasi';
        
        // Set content (bisa text atau HTML)
        if (options.content) {
            content.innerHTML = options.content;
        }
        
        // Set icon (opsional)
        if (options.icon) {
            iconImg.src = options.icon;
            iconContainer.classList.remove('hidden');
        } else {
            iconContainer.classList.add('hidden');
        }
        
        // Clear buttons dulu
        buttons.innerHTML = '';
        
        // Buat buttons
        if (options.buttons && options.buttons.length > 0) {
            options.buttons.forEach(function(btn) {
                const button = document.createElement('button');
                button.textContent = btn.text;
                button.className = btn.className || 'px-6 py-2 rounded-lg font-semibold transition';
                
                // Jika ada link, buat sebagai anchor tag
                if (btn.link) {
                    const link = document.createElement('a');
                    link.href = btn.link;
                    link.className = btn.className || 'px-6 py-2 rounded-lg font-semibold transition';
                    link.textContent = btn.text;
                    link.style.display = 'inline-block';
                    link.style.width = '100%';
                    link.style.textAlign = 'center';
                    buttons.appendChild(link);
                } else {
                    // Jika ada onclick function
                    if (btn.onclick) {
                        button.onclick = btn.onclick;
                    }
                    buttons.appendChild(button);
                }
            });
        } else {
            // Default button (hanya tombol tutup)
            const closeBtn = document.createElement('button');
            closeBtn.textContent = 'Tutup';
            closeBtn.className = 'w-full px-6 py-2 bg-gray-500 text-white rounded-lg font-semibold hover:bg-gray-600 transition';
            closeBtn.onclick = Modal.close;
            buttons.appendChild(closeBtn);
        }
        
        // Tampilkan modal
        modal.classList.remove('hidden');
        
        // Prevent body scroll saat modal terbuka
        document.body.style.overflow = 'hidden';
    },
    
    // Fungsi untuk menutup modal
    close: function() {
        const modal = document.getElementById('reusableModal');
        modal.classList.add('hidden');
        
        // Kembalikan scroll body
        document.body.style.overflow = 'auto';
    },
    
    // Fungsi khusus untuk konfirmasi (shortcut)
    confirm: function(title, message, onConfirm, options) {
        options = options || {};
        
        this.open({
            title: title,
            content: message,
            icon: options.icon,
            buttons: [
                {
                    text: options.cancelText || 'Batalkan',
                    className: 'w-full px-6 py-2 bg-white text-black rounded-lg border border-gray-500 font-semibold hover:bg-gray-100 transition',
                    onclick: Modal.close
                },
                {
                    text: options.confirmText || 'Ya',
                    className: options.confirmClass || 'w-full px-6 py-2 bg-[#C90B0B] text-white rounded-lg font-semibold hover:bg-red-800 transition',
                    onclick: function() {
                        Modal.close();
                        if (onConfirm) onConfirm();
                    }
                }
            ]
        });
    },
    
    // Fungsi khusus untuk alert/info (shortcut)
    alert: function(title, message, options) {
        options = options || {};
        
        this.open({
            title: title,
            content: message,
            icon: options.icon,
            buttons: [
                {
                    text: options.buttonText || 'OK',
                    className: options.buttonClass || 'w-full px-6 py-2 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition',
                    onclick: Modal.close
                }
            ]
        });
    }
};

// Tutup modal dengan tombol ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        Modal.close();
    }
});