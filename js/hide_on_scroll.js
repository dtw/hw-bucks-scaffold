// SHOW / HIDE NAV MENU ON SCROLL
window.addEventListener("scroll", function() {
  if (window.scrollY > 100) {
    jQuery(function($){
      $('.hide-on-scroll').fadeOut('slow swing');
    });
  } else {
    jQuery(function($){
      $('.hide-on-scroll').fadeIn('slow swing');
    });
  }
},false);
