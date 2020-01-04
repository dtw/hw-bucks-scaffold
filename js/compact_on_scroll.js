window.addEventListener("scroll", function() {
  var navbarBrand = document.getElementById('navbar-brand'); // selects the element by Id
  var tagline = document.getElementById('tagline'); // selects the element by Id
  var navbar = document.getElementById('nav'); // selects the element by tag
  if (window.scrollY > 100) {
    navbarBrand.className = ('navbar-brand navbar-brand-compact');
    tagline.className = ('row tagline tagline-compact');
    navbar.className = ('navbar navbar-fixed-top navbar-compact');
  } else {
    navbarBrand.className = ('navbar-brand');
    tagline.className = ('row tagline');
    navbar.className = ('navbar navbar-fixed-top');
  }
},false);
