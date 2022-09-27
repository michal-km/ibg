function domReady(fn) {
  document.addEventListener("DOMContentLoaded", fn);
  if (document.readyState === "interactive" || document.readyState === "complete" ) {
    fn();
  }
}

domReady(() => {
  const menu = new MmenuLight( document.querySelector( '#menu' ), 'all');
  var navigator = menu.navigation({
    // selectedClass: 'Selected',
    // slidingSubmenus: true,
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
  //navigator.openPanel(
  //  menu.querySelector( "ul" );
  //);
  console.log ('started');
});

