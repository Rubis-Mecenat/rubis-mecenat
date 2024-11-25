

	const header = qs('#masthead');

	console.log('navigation');

  /*------------------------------------*\
      STICKY MENU
  \*------------------------------------*/

  let didScroll;
  let lastScrollTop = 0;
  let delta = 20;

  const documentIsScrolling = function () {
      didScroll = true;

      setInterval(function() {
          if (didScroll) {
              handleScrollForMenu();
              didScroll = false;
          }
      }, 250);
  }

  const handleScrollForMenu = function () {
      var st = window.scrollY;

      // Make sure they scroll more than delta
      if (Math.abs(lastScrollTop - st) <= delta)
          return;
      
      if ( st < 100 ) {
          //console.log('documentIsScrolling BACKTOTHETOP');
          cl(header).remove('-out');
          cl(header).remove('-reduced');
      }
      else if (st > lastScrollTop ){
          //console.log('documentIsScrolling DOWN');
          cl(header).add('-out');
          cl(header).add('-reduced');
      } 
      else {
          //console.log('documentIsScrolling UP');
          cl(header).remove('-out');
          cl(header).add('-reduced');
      }

      lastScrollTop = st;
  }

  document.addEventListener("scroll", documentIsScrolling, false);
