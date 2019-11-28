(function($) {
  // $.noConflict();
  // $('.search-field').attr('tabindex', '1');
  $(document).on('click', '.fa-search', function() {
    // alert('click detected!');
    $('.search-field')
      .css({
        display: 'block',
        transition: '0.5s ease-in-out'
      })
      .attr('tabindex', '0')
      .focus();
  });

  // $('.fa-search').click(function() {
  //   alert('click detected!');
  // });

  $(document).on('blur', '.search-field', function() {
    $(this).css('display', 'none');
  });

  //*******CLICK event at FOOTER PAGE */
  $(document).on('click', '.footer-logo', function(e) {
    // window.location.href = window.location.orign;
    location.replace(window.location.origin + '/inhabitent');
    e.preventDefault();
  });
  $(document).on('click', '.logo-head', function(e) {
    location.replace(window.location.origin + '/inhabitent');
    e.preventDefault();
  });

  let tmpBool = false;
  $(document).on('scroll', document, function(e) {
    if ($(this).scrollTop() >= 500) {
      if (!tmpBool) {
        $('.main-navigation').css({
          //******************for FRONT PAGE NAV */
          position: 'fixed',
          background: ' hsla(0, 0%, 100%, 0.85)',
          color: '#248a83'
        });
        $('.main-navigation  a').css({
          color: '#248a83',
          'text-shadow': 'none'
        });
        // ************** for head nav
        $('.head-navigation').css({
          position: 'fixed',
          background: ' hsla(0, 0%, 100%, 0.85)',
          color: '#248a83'
        });
        $('.head-navigation  a').css({
          color: '#248a83',
          'text-shadow': 'none'
        });
        tmpBool = true;
        return;
      }
    } else {
      $('.main-navigation').css({
        position: 'absolute',
        background: ' transparent'
      });
      $('.main-navigation  a').css({
        color: '#fff',
        'text-shadow': '1px 2px rgba(0, 0, 0, 0.459)'
      });

      // $('.head-navigation').css({
      //   position: 'absolute',
      //   background: ' transparent'
      // });
      // $('.head-navigation  a').css({
      //   color: '#fff',
      //   'text-shadow': '1px 2px rgba(0, 0, 0, 0.459)'
      // });
      tmpBool = false;
    }
    e.preventDefault();
  });

  $('.search-field').attr('placeholder','Type and Hit Enter...');

})(jQuery);
