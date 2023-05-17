self.addEventListener("install", function (event) {
    event.waitUntil(
        caches.open("pwa").then(function (cache) {
            return cache.addAll([
                "/",
                "/css/style.css",
                "/css/bootstrap.min.css",
                "/css/sidebar.css",
                "/js/jquery-1.11.3.min.js",
                "/js/bootstrap.min.js",
                "/js/jPushMenu.js",
                "/js/counter.js",
                "/js/jquery.scrollUp.min.js"
            ]);
        })
    );
});

self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          // Add any cache names that need to be cleared when a new service worker is activated
          // You can remove caches that are no longer needed or have changed versions
        }).map(function(cacheName) {
          return caches.delete(cacheName);
        })
      );
    })
  );
});

self.addEventListener("fetch", function (event) {
    event.respondWith(
        caches.open("pwa").then(function (cache) {
            return cache.match(event.request).then(function (response) {
                cache.addAll([event.request.url]);

                if (response) {
                    return response;
                }

                return fetch(event.request);
            });
        })
    );
});