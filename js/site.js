function domReady(fn) {
  document.addEventListener("DOMContentLoaded", fn);
  if (document.readyState === "interactive" || document.readyState === "complete" ) {
    fn();
  }
}

domReady(() => {
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
  testJSON();
});

var getJSON = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
  xhr.responseType = 'json';
  xhr.onload = function() {
    var status = xhr.status;
    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };
  xhr.send();
};

function testJSON() {
  var url='https://preview.wgrygranie.pl/js/instatest.json';
  fetch(url)
  .then(res => res.json())
  .then(out =>
      console.log('Checkout this JSON! ', out))
  .catch(err => { throw err });
}
