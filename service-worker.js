const assets = [
    // Pages et scripts

    'Service_Worker',
    '/var/www/douvinaigrette/MVC/views/home.php',

    // Images
    'https://assets.douvinaigrette.sbihel.fr/logo.png',
];

//Installation du service worker
self.addEventListener('install', evt => {
    evt.waitUntil(caches.open('v1').then(cache => {
        cache.addAll(assets);
    })
    )
});

//Activation du service worker
self.addEventListener('activate', evt => {
    console.log('le Service Worker a Ã©tÃ© installÃ© ');
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.open('v1').then(function (cache) {
            return cache.match(event.request).then(function (response) {
                return response || fetch(event.request).then(function (response) {
                    cache.put(event.request, response.clone());
                    return response;
                });
            });
        })
    );
});