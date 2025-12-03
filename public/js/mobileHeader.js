// public/js/navbar.js

// Toggle Mobile Menu
const hamburgerBtn = document.getElementById('hamburger-btn');
const mobileMenu = document.getElementById('mobile-menu');
const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

if (hamburgerBtn && mobileMenu && mobileMenuOverlay) {
    
    // Function to open menu
    function openMenu() {
        mobileMenu.classList.remove('hidden');
        mobileMenuOverlay.classList.remove('hidden');
        
        // Add slide-in animation
        setTimeout(() => {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenuOverlay.classList.remove('opacity-0');
        }, 10);
        
        // Change icon to X
        const icon = hamburgerBtn.querySelector('svg');
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
    }
    
    // Function to close menu
    function closeMenu() {
        mobileMenu.classList.add('translate-x-full');
        mobileMenuOverlay.classList.add('opacity-0');
        
        // Wait for animation to finish before hiding
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
            mobileMenuOverlay.classList.add('hidden');
        }, 300);
        
        // Change icon back to hamburger
        const icon = hamburgerBtn.querySelector('svg');
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
    }
    
    // Toggle menu on hamburger click
    hamburgerBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        
        if (mobileMenu.classList.contains('hidden')) {
            openMenu();
        } else {
            closeMenu();
        }
    });

    // Close menu when clicking on overlay
    mobileMenuOverlay.addEventListener('click', closeMenu);

    // Close menu when menu item is clicked
    const mobileMenuLinks = mobileMenu.querySelectorAll('a, button');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Close menu with ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
            closeMenu();
        }
    });
    
    // Initialize menu with translate-x-full for slide animation
    mobileMenu.classList.add('translate-x-full');
    mobileMenuOverlay.classList.add('opacity-0');
}