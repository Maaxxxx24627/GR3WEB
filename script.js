// Appel du service worker
if ('serviceWorker' in navigator) { 
    navigator.serviceWorker.register('/var/www/douvinaigrette/MVC/public/service-worker.js').then(function(registration) {
        console.log('Service worker registration succeeded:', registration);
    }).catch(function(error) {
        console.log('Service worker registration failed:', error);
    });
}