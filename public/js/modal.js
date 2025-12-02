// public/js/modal.js

const Modal = {
    // Fungsi untuk membuka modal
    open: function(options) {
        // Ambil element modal
        const modal = document.getElementById('reusableModal');
        const container = document.getElementById('modalContainer'); // Gunakan ID yang baru
        
        // Reset ke default width (max-w-sm) setiap kali modal dibuka
        container.className = 'bg-white rounded-2xl p-8 w-full mx-4 relative z-10 border border-dark-overlay4 max-w-sm';
        
        // Jika ada extraClass, replace max-w-sm dengan extraClass
        if (options.extraClass) {
            // Hapus semua class max-w-* yang mungkin ada
            container.classList.remove('max-w-xs', 'max-w-sm', 'max-w-md', 'max-w-lg', 'max-w-xl', 'max-w-2xl', 'max-w-3xl');
            // Tambahkan class baru
            container.classList.add(options.extraClass);
        }
        
        const title = document.getElementById('modalTitle');
        const content = document.getElementById('modalContent');
        const buttons = document.getElementById('modalButtons');
        const iconContainer = document.getElementById('modalIcon');
        const iconContent = document.getElementById('modalIconContent');
        
        // Set title
        title.textContent = options.title || 'Informasi';
        
        // Set content (bisa text atau HTML)
        if (options.content) {
            content.innerHTML = options.content;
        }
        
        // Set icon (opsional)
        if (options.icon) {
            iconContent.innerHTML = ''; // Clear dulu
            
            // Jika icon adalah path file (string dengan .svg atau dimulai dengan /)
            if (typeof options.icon === 'string' && (options.icon.includes('.svg') || options.icon.startsWith('/'))) {
                // Buat img element untuk icon dari file
                const img = document.createElement('img');
                img.src = options.icon;
                img.alt = 'icon';
                img.style.width = '48px';
                img.style.height = '48px';
                iconContent.appendChild(img);
            } else {
                // Icon adalah HTML string (dari PHP function atau inline SVG)
                iconContent.innerHTML = options.icon;
            }
            
            iconContainer.classList.remove('hidden');
        } else {
            iconContent.innerHTML = '';
            iconContainer.classList.add('hidden');
        }
        
        // Clear buttons dulu
        buttons.innerHTML = '';
        
        // Buat buttons
        if (options.buttons && options.buttons.length > 0) {
            options.buttons.forEach(function(btn) {
                const button = document.createElement('button');
                button.textContent = btn.text;
                button.className = btn.className || 'px-6 py-2 rounded-lg font-semibold transition hover:cursor-pointer';
                
                // Jika ada link, buat sebagai anchor tag
                if (btn.link) {
                    const link = document.createElement('a');
                    link.href = btn.link;
                    link.className = btn.className || 'px-6 py-2 rounded-lg font-semibold transition hover:cursor-pointer';
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
            closeBtn.className = 'w-full px-6 py-2 bg-dark-overlay5 text-white1 rounded-lg font-semibold hover:bg-dark-overlay6 transition hover:cursor-pointer';
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
            extraClass: options.extraClass || 'max-w-sm', // Default small untuk confirm
            buttons: [
                {
                    text: options.cancelText || 'Batalkan',
                    className: 'w-full px-6 py-2 bg-white1 text-dark-overlay rounded-lg border border-dark-overlay5 font-semibold hover:bg-dark-overlay1 transition hover:cursor-pointer',
                    onclick: Modal.close
                },
                {
                    text: options.confirmText || 'Ya',
                    className: options.confirmClass || 'w-full px-6 py-2 bg-red1 text-white1 rounded-lg font-semibold hover:bg-dark-overlay transition hover:cursor-pointer',
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
            extraClass: options.extraClass || 'max-w-sm', // Default small untuk alert
            buttons: [
                {
                    text: options.buttonText || 'OK',
                    className: options.buttonClass || 'w-full px-6 py-2 bg-blue-overlay text-white1 rounded-lg font-semibold hover:bg-blue-overlay8 transition hover:cursor-pointer',
                    onclick: Modal.close
                }
            ]
        });
    },

    // Method untuk modal dengan input field (DENGAN RATING)
    prompt: function(title, message, onSubmit, options) {
        options = options || {};
        
        // --- HTML Template Bintang ---
        const starRatingHtml = `
            <div id="starRatingContainer" class="flex justify-center flex-row-reverse space-x-1 space-x-reverse text-3xl mb-4 text-gray-300">
                <input type="radio" id="rating-5" name="rating" value="5" class="star-radio" hidden /><label for="rating-5" class="rating-star cursor-pointer transition">★</label>
                <input type="radio" id="rating-4" name="rating" value="4" class="star-radio" hidden /><label for="rating-4" class="rating-star cursor-pointer transition">★</label>
                <input type="radio" id="rating-3" name="rating" value="3" class="star-radio" hidden /><label for="rating-3" class="rating-star cursor-pointer transition">★</label>
                <input type="radio" id="rating-2" name="rating" value="2" class="star-radio" hidden /><label for="rating-2" class="rating-star cursor-pointer transition">★</label>
                <input type="radio" id="rating-1" name="rating" value="1" class="star-radio" hidden /><label for="rating-1" class="rating-star cursor-pointer transition">★</label>
            </div>
        `;
        
        // Gabungkan rating dan konten prompt
        const promptContent = `
            ${starRatingHtml}
            <p class="text-sm text-gray-700 mb-4 text-center">${message}</p>
            
            <div class="text-left mb-4">
                <label class="block text-sm font-semibold text-gray-800 mb-2">${options.label || 'Ulasan'}</label>
                <textarea id="promptInput" 
                          placeholder="${options.placeholder || 'Tulis ulasan/feedback Anda disini'}" 
                          class="w-full px-4 py-3 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" 
                          rows="${options.rows || 4}"
                          ${options.required ? 'required' : ''}></textarea>
            </div>
        `;
        
        this.open({
            title: title,
            content: promptContent,
            icon: options.icon,
            extraClass: options.extraClass || 'max-w-lg', // Default large untuk prompt/form
            buttons: [
                {
                    text: options.cancelText || 'Batalkan',
                    className: 'w-full px-6 py-2 bg-white1 text-dark-overlay rounded-lg font-medium hover:bg-dark-overlay1 border border-dark-overlay5 transition hover:cursor-pointer',
                    onclick: Modal.close
                },
                {
                    text: options.confirmText || 'Kirim',
                    className: options.confirmClass || 'w-full px-6 py-2 bg-blue-overlay text-white1 rounded-lg font-semibold hover:bg-blue-overlay8 transition hover:cursor-pointer', 
                    onclick: function() {
                        const inputValue = document.getElementById('promptInput').value.trim();
                        const ratingInput = document.querySelector('input[name="rating"]:checked');
                        const ratingValue = ratingInput ? parseInt(ratingInput.value) : 0;
                        
                        if (options.minRating && ratingValue === 0) {
                            alert('Harap berikan penilaian bintang terlebih dahulu.');
                            return;
                        }

                        if (options.required && !inputValue) {
                            alert('Harap isi ulasan terlebih dahulu.');
                            return;
                        }
                        
                        Modal.close();
                        if (onSubmit) {
                            onSubmit(inputValue, ratingValue); 
                        }
                    }
                }
            ]
        });

        // --- Logika Visual Bintang ---
        setTimeout(() => { // Tunggu modal ter-render dulu
            const stars = document.querySelectorAll('#starRatingContainer .rating-star');
            
            function updateStarVisuals(target) {
                const allStars = document.querySelectorAll('#starRatingContainer .rating-star');
                
                allStars.forEach(s => {
                    s.classList.remove('text-yellow-400');
                });
                
                let highlight = false;
                for (let i = allStars.length - 1; i >= 0; i--) {
                    const star = allStars[i];
                    if (star === target || highlight) {
                        star.classList.add('text-yellow-400');
                        highlight = true;
                    }
                }
            }

            stars.forEach(star => {
                star.addEventListener('mouseover', function() {
                    updateStarVisuals(this);
                });
                
                star.addEventListener('mouseout', function() {
                    const checkedStar = document.querySelector('input[name="rating"]:checked');
                    stars.forEach(s => s.classList.remove('text-yellow-400'));

                    if (checkedStar) {
                        const checkedLabel = document.querySelector(`label[for="rating-${checkedStar.value}"]`);
                        updateStarVisuals(checkedLabel);
                    }
                });
                
                star.addEventListener('click', function() {
                    updateStarVisuals(this); 
                });
            });
        }, 100);
    }
};

// Expose Modal to global
window.Modal = Modal;

// Tutup modal dengan tombol ESC
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        Modal.close();
    }
});