self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open('first-app').then(function(cache) {
      return cache.addAll([
          '/index.php',
          '/navbar.php',
          '/highscore.php',
          '/src/css/styles.css',
          '/src/js/script.js',
          '/src/js/app.js',
          '/manifest.json',
          '/src/images/paper-btn.PNG',
          '/src/images/paper.png',
          '/src/images/rock-btn.PNG',
          '/src/images/rock.png',
          '/src/images/scissor-btn.PNG',
          '/src/images/scissor.png',
        // etc
      ]);
    })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    // Try the cache
    caches.match(event.request).then(function(response) {
      // Fall back to network
      return response || fetch(event.request);
    })
  );
});