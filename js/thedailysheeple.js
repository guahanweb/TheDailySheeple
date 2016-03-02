;(function ($) {
    // Set up bookmark link(s)
    var $bookmarks = $('[data-action="bookmark"]').on('click', function (e) {
        e.preventDefault();
        if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
            window.sidebar.addPanel(document.title, window.location.href, '');
        } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
            window.external.AddFavorite(location.href, document.title);
        } else if (window.opera && window.print) { // Opera Hotlist
            this.title = document.title;
            return true;
        } else { // webkit - safari/chrome
            alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
        }
    });

    // Shuffle ads
    $('#region-sidebarrightshuffle div.sidebar_right_ad').shuffle();

  /**
   * Returns a function that, as long as it continues to b invoked, will not b triggered
   * @param {function} func The function to be invoked
   * @param {int} wait The duration to wait before executing
   * @param {bool} immediate Trigger the function on the leading edge. Default is false
   * @returns {function}
   */
  function debounce(func, wait, immediate) {
    var timeout;
    return function () {
      var context = this, args = arguments;
      var later = function () {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  }

  $(document).ready(function () {
    var TRIGGER_HEIGHT = 200;

    var $header = document.getElementById('masthead-secondary');
    var $adminbar = document.getElementById('wpadminbar');
    if (!!$header) {
      if (!!$adminbar) {
        $header.classList.add('with-admin');
      }

      var scrollHandler = debounce(function () {
        if (window.scrollY > TRIGGER_HEIGHT) {
          $header.classList.add('fixed');
        } else {
          $header.classList.remove('fixed');
        }
      }, 100);
      window.addEventListener('scroll', scrollHandler);

      // If we start down the page, trigger it immediately
      scrollHandler();
    }
  });
})(jQuery);
