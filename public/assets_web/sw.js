var cacheName = "Fuzzy";
var filesToCache = [
  "./",
  "./index.html",
  "./assets/css/vendors/bootstrap.min.css",
  "./assets/css/vendors/bootstrap.rtl.min.css",
  "./assets/css/vendors/swiper-bundle.min.css",
  "./assets/css/vendors/dropzone.min.css",
  "assets/css/vendors/iconsax.css",
  "./assets/css/style.css",
  "./assets/js/bootstrap.bundle.min.js",
  "./assets/js/custom-swiper.js",
  "./assets/js/dropzone-min.js",
  "./assets/js/iconsax.js",
  "./assets/js/homescreen-popup.js",
  "./assets/js/offcanvas-popup.js",
  "./assets/js/onload-modal.js",
  "./assets/js/otp.js",
  "./assets/js/range-slider.js",
  "./assets/js/script.js",
  "./assets/js/swiper-bundle.min.js",
];

/* Start the service worker and cache all of the app's content */
self.addEventListener("install", function (e) {
  e.waitUntil(
    caches.open(cacheName).then(function (cache) {
      return cache.addAll(filesToCache);
    })
  );
  self.skipWaiting();
});
