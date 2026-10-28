import * as bootstrap from 'bootstrap';

// Rendre Bootstrap accessible globalement si besoin (data-bs-* fonctionne déjà)
window.bootstrap = bootstrap;

// Auto-fermeture des alertes flash
setTimeout(() => {
    document.querySelectorAll('.alert-auto-dismiss').forEach((el) => {
        const alert = bootstrap.Alert.getOrCreateInstance(el);
        alert.close();
    });
}, 6000);
