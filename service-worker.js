// service-worker.js — Visionário Template
const CACHE_NAME = 'visionario-cache-v1';
const urlsToCache = [
  '/',
  '/index.php',
  '/templates/visionario/template.css',
  '/templates/visionario/template.js',
  '/templates/visionario/images/logo.png'
];

// Instala e pré-cacheia
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => {
      return cache.addAll(urlsToCache);
    })
  );
});

// Ativa e limpa caches antigos
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(keys => {
      return Promise.all(
        keys.filter(k => k !== CACHE_NAME).map(k => caches.delete(k))
      );
    })
  );
});

// Intercepta requisições e serve do cache
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request);
    })
  );
});
