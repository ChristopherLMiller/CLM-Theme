// register the service worker
/**if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
      // Registration was successful
      console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }, function(err) {
      // registration failed :(
      console.log('ServiceWorker registration failed: ', err);
    });
  });
}**/

// things that require the doc to be loaded before beginning
jQuery(document).ready(function( $ ) {
  $('.hamburger').on('click', function() {
    $(this).toggleClass('is-active');
    $('.mobile-navigation nav').toggleClass('is-active');
  })
});