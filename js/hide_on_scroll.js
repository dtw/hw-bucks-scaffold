// SHOW / HIDE NAV MENU ON SCROLL
window.addEventListener("scroll", function() {
  if (window.scrollY > 100) {
    $('.hide-on-scroll').fadeOut('slow swing');
  } else {
    $('.hide-on-scroll').fadeIn('slow swing');
  }
},false);
