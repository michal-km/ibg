function domReady(fn) {
  document.addEventListener("DOMContentLoaded", fn);
  if (document.readyState === "interactive" || document.readyState === "complete" ) {
    fn();
  }
}

domReady(() => {
  var splide = new Splide( '.splide', {
    type   : 'loop',
    perPage: 4,
    arrows: false,
    pagination: false,
    autoPlay: true,
    lazyLoad: true,
    breakpoints: {
      768: {
        perPage: 2,
      },
      599: {
        perPage: 1,
      },
    },
  });
  splide.mount();
  const menu = new MmenuLight( document.querySelector( '#menu' ), 'all');
  var navigator = menu.navigation({
     selectedClass: 'Selected',
     slidingSubmenus: true,
    // theme: 'dark',
    // title: 'Menu'
  });
  var drawer = menu.offcanvas({
    position: 'left'
  });
  document.querySelector( 'a[href="#menu"]' )
    .addEventListener( 'click', evnt => {
      evnt.preventDefault();
      drawer.open();
  });
});
