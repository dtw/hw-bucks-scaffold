window.onload = function(){
  var navbarBrand = document.getElementById('navbar-brand'); // selects the element by Id
  var tagline = document.getElementById('tagline'); // selects the element by Id
  var navbar = document.getElementById('nav'); // selects the element by tag
  // store the classes
  var navbarBrandClasses = navbarBrand.className;
  var taglineClasses = tagline.className;
  var navbarClasses = navbar.className;

  window.addEventListener("scroll", function() {
    if (window.scrollY > 100) {
      navbarBrand.className = ('navbar-brand navbar-brand-compact');
      tagline.className = ('row tagline tagline-compact');
      navbar.className = ('navbar navbar-fixed-top navbar-compact');
      navbarBrand.className = navbarBrandClasses.concat(' navbar-brand-compact');
      tagline.className = taglineClasses.concat(' tagline-compact');
      navbar.className = navbarClasses.concat('  navbar-compact');
    } else {
      navbarBrand.className = navbarBrandClasses;
      tagline.className = taglineClasses;
      navbar.className = navbarClasses;
    }
  },false);
};
