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
$(document).on('click','.footer-logo',function(e){
  window.location.href = window.location.href;
  e.preventDefault();
});







})(jQuery);


