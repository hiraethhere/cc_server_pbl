document.addEventListener('DOMContentLoaded', function() {
    // Variabel untuk menyimpan rating
    window.currentRating = 0;

    // Fungsi set rating
    window.setRating = function(rating) {
        console.log('Rating dipilih:', rating); // Debug
        window.currentRating = rating;
        const hiddenInput = document.getElementById('ratingInput');

        //ini buat ngubah value input rating di form
        if (hiddenInput) {
            hiddenInput.value = rating;
        }
        
        const starButtons = document.querySelectorAll('.star-btn');
        starButtons.forEach((btn, index) => {
            if (index < rating) {
                btn.textContent = '★';
                btn.style.color = '#FDDF30';
            } else {
                btn.textContent = '☆';
                btn.style.color = '#D1D5DB';
            }
        });
        
        const ratingValueEl = document.getElementById('ratingValue');
        if (ratingValueEl) {
            ratingValueEl.textContent = `Rating: ${rating}/5 bintang`;
        }
    };

    // Fungsi kirim feedback
    window.kirimFeedback = function(bookingId, userId) {
        console.log('kirimFeedback dipanggil untuk booking:', bookingId); // Debug

        const actionUrl = `${BASEURL}/History/submitFeedback`;
        
        const feedbackContent = `
            <form id="feedbackForm" action="${actionUrl}" method="POST" class="text-center">
                <input type="hidden" name="id_booking" value="${bookingId}">
                
                <input type="hidden" name="rating" id="ratingInput" value="0">

                <label class="block text-center text-sm text-dark-overlay7 mb-3">
                    Input kamu sangat berharga dalam meningkatkan kualitas ruangan di perpustakaan kami.
                </label>
                <div id="ratingStars" class="flex gap-6 mb-6 justify-center">
                    <button type="button" onclick="setRating(1)" class="star-btn text-7xl cursor-pointer transition hover:scale-110" data-rating="1">☆</button>
                    <button type="button" onclick="setRating(2)" class="star-btn text-7xl cursor-pointer transition hover:scale-110" data-rating="2">☆</button>
                    <button type="button" onclick="setRating(3)" class="star-btn text-7xl cursor-pointer transition hover:scale-110" data-rating="3">☆</button>
                    <button type="button" onclick="setRating(4)" class="star-btn text-7xl cursor-pointer transition hover:scale-110" data-rating="4">☆</button>
                    <button type="button" onclick="setRating(5)" class="star-btn text-7xl cursor-pointer transition hover:scale-110" data-rating="5">☆</button>
                </div>
                <div id="ratingValue" class="text-center text-sm text-dark-overlay7 mb-4">Pilih rating (1-5 bintang)</div>
                
                <label class="block text-sm font-semibold text-dark-overlay7 mb-2 text-left">Ulasan (Opsional):</label>
                <textarea id="feedbackText" name = "comment"
                          placeholder="Bagikan pengalaman Anda menggunakan ruangan ini..." 
                          class="w-full px-4 py-3 text-sm border border-dark-overlay5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" 
                          rows="4"></textarea>
            </form>
        `;
        
        // Icon star untuk modal header
        const starIcon = `<?= icon('star', 'w-12 h-12') ?>`;
        
        Modal.open({
            title: 'Bagaimana Pengalamanmu memakai ruangan kami?',
            content: feedbackContent,
            // icon: starIcon,
            extraClass: 'max-w-xl',
            buttons: [
                {
                    text: 'Batalkan',
                    className: 'w-full px-6 py-2 bg-white text-dark-overlay7 rounded-lg border border-dark-overlay4 font-semibold hover:bg-dark-overlay1 transition hover:cursor-pointer',
                    onclick: Modal.close
                },
                {
                    text: 'Kirim Penilaian',
                    className: 'w-full px-6 py-2 bg-blue-overlay text-white rounded-lg font-semibold hover:bg-blue-700 transition hover:cursor-pointer',
                    onclick: function() {
                        const rating = window.currentRating || 0;
                        const ulasan = document.getElementById('feedbackText').value.trim();
                        
                        if (rating === 0) {
                            alert('Silakan pilih rating terlebih dahulu!');
                            return; 
                        }
                        
                        console.log(`Feedback untuk Booking ${bookingId}:`);
                        console.log(`Rating Bintang: ${rating}`);
                        console.log(`Ulasan: ${ulasan}`);
                        document.getElementById('feedbackForm').submit();
                        
                        // Tampilkan modal sukses
                        // Modal.alert(
                        //     'Terima Kasih!',
                        //     'Penilaian Anda telah diterima. Feedback Anda sangat membantu kami!',
                        //     {
                        //         buttonText: 'OK',
                        //         buttonClass: 'w-full px-6 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700 transition'
                        //     }
                        // );
                        
                        // Reset rating
                        window.currentRating = 0;
                        
                        // TODO: AJAX untuk kirim ke server
                        // fetch('/Booking/submitFeedback', { 
                        //     method: 'POST', 
                        //     headers: { 'Content-Type': 'application/json' },
                        //     body: JSON.stringify({ bookingId, ulasan, rating }) 
                        // })
                    }
                }
            ]
        });
    };
});
