(function($){

  $( document ).ready(function() {

    //Menu off canvas

    // Calling the function
    $(function() {
        $('.toggle-nav').click(function() {
            toggleNavigation();
        });
    });

    // The toggleNav function itself
    function toggleNavigation() {
        if ($('#site-wrapper').hasClass('display-nav')) {
            // Close Nav
            $('#site-wrapper').removeClass('display-nav');
        } else {
            // Open Nav
            $('#site-wrapper').addClass('display-nav');
        }
    }


    //Mobile Menu

      $("#menu-toggle > li > .sub-menu").hide();

      $('#menu-toggle > li > a').click(function () {
      	var $ul = $(this).siblings('ul');
        console.log('click bait');
      	if ($ul.length > 0) {
      			$ul.slideToggle(500);
      			$("#menu-toggle > li > .sub-menu").not($ul).slideUp(200);
      			return false;
      	}
      });

  });

})(jQuery);
