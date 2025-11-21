class togglePassword {
    static init() {
        document.querySelectorAll('[data-toggle-password]').forEach(container => {
            const button  = container.querySelector('button[type="button"]');
            const input   = container.querySelector('input[type="password"], input[type="text"]');
            const iconImg = button?.querySelector('img');

            if (!button || !input || !iconImg) return;

            button.addEventListener('click', () => {
                if (input.type === 'password') {
                    input.type = 'text';
                    iconImg.src = '/icon/eye-off.svg';
                } else {
                    input.type = 'password';
                    iconImg.src = '/icon/eye-on.svg';
                }
            });
        });
    }
}

// Jalankan otomatis
if (!window.togglePasswordInitialized) {
    document.addEventListener('DOMContentLoaded', togglePassword.init);
    window.togglePasswordInitialized = true;
}