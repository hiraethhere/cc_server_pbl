// Fungsi untuk toggle accordion
function toggleAccordion(id) {
    const content = document.getElementById(`content-${id}`);
    const icon = document.getElementById(`icon-${id}`);
    
    // Toggle visibility
    if (content.classList.contains('hidden')) {
        // Tutup semua accordion lain
        document.querySelectorAll('.accordion-content').forEach(item => {
            item.classList.add('hidden');
        });
        
        // Reset semua icon
        document.querySelectorAll('[id^="icon-"]').forEach(item => {
            item.classList.remove('rotate-180');
        });
        
        // Buka accordion yang diklik
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        // Tutup accordion yang diklik
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}

// Optional: Auto-scroll ke accordion yang dibuka
document.querySelectorAll('[onclick^="toggleAccordion"]').forEach(button => {
    button.addEventListener('click', function() {
        setTimeout(() => {
            this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 300);
    });
});
