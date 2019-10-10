(function($){

  //$( document ).ready(function() {

    // Calling the function
    $(function() {
        $('.toggle-nav, #mobile-grey-back').click(function() {
            toggleNavigation();
        });
    });

    // The toggleNav function itself
    function toggleNavigation() {
        if ($('#site-wrapper').hasClass('display-nav')) {
            // Close Nav
            $('#site-wrapper').removeClass('display-nav');
            $('#mobile-grey-back').fadeOut('fast');
            $('.toggle-nav .fa').removeClass('fa-times').addClass( 'fa-bars' );
        } else {
            // Open Nav
            $('#site-wrapper').addClass('display-nav');
            $('#mobile-grey-back').fadeIn('fast');
            $('.toggle-nav .fa').removeClass('fa-bars').addClass( 'fa-times' );
        }
    }

    //Mobile Menu
    $("#menu-toggle > li > .sub-menu").hide();

    $('#menu-toggle > li > a').click(function () {
    	var $ul = $(this).siblings('ul');
      //console.log('click bait');
    	if ($ul.length > 0) {
    			$ul.slideToggle('600');
    			$("#menu-toggle > li > .sub-menu").not($ul).slideUp('300');
    			return false;
    	}
    });

  //});

})(jQuery);
