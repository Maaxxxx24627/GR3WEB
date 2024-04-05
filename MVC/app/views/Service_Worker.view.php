<?php
header('Content-Type: application/javascript');
?>
const assets = [
    // URL des pages et scripts, pas des chemins de système de fichiers
    '/Home', 


    
];
// Code de Service Worker pour la mise en cache
self.addEventListener('install', evt => {
    evt.waitUntil(caches.open('v1').then(cache => {
        return cache.addAll(assets);
    }));
});

self.addEventListener('activate', evt => {
    console.log('Service Worker has been installed');
});

self.addEventListener('fetch', evt => {
    evt.respondWith(caches.match(evt.request).then(response => {
        return response || fetch(evt.request).then(response => {
            return caches.open('v1').then(cache => {
                cache.put(evt.request, response.clone());
                return response;
            });
        });
    }));
});
