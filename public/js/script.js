const flashMsg = document.getElementById("flash-message");
            
    // Animasi masuk
    setTimeout(() => {
        flashMsg.classList.remove("opacity-0", "translate-x-10");
        flashMsg.classList.add("opacity-100", "translate-x-0");
    }, 100);
    
    // Auto-hide setelah 3 detik
    setTimeout(() => {
        flashMsg.classList.add("opacity-0", "translate-x-10");
        setTimeout(() => flashMsg.remove(), 500);
    }, 3000);


    // js/popup.js
class ModalManager {
    constructor() {
        this.modals = new Map();
        this.init();
    }

    init() {
        document.querySelectorAll('[data-modal]').forEach(trigger => {
            const targetId = trigger.dataset.modal;
            trigger.addEventListener('click', () => this.show(targetId));
        });

        this.bindAllModals();
    }

    bindAllModals() {
        document.querySelectorAll('.modal').forEach(modal => {
            const id = modal.id;
            this.modals.set(id, modal);

            // Close button
            modal.querySelectorAll('[data-dismiss="modal"]').forEach(btn => {
                btn.addEventListener('click', () => this.hide(id));
            });

            // Overlay click
            modal.addEventListener('click', (e) => {
                if (e.target === modal) this.hide(id);
            });
        });
    }

    show(id) {
        const modal = this.modals.get(id);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('modal-open'); // cegah scroll
        }
    }

    hide(id) {
        const modal = this.modals.get(id);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('modal-open');
        }
    }
}

// Inisialisasi otomatis
document.addEventListener('DOMContentLoaded', () => {
    window.modal = new ModalManager();
});