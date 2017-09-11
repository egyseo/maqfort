(function($){

  //$( document ).ready(function() {

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
      //console.log('click bait');
    	if ($ul.length > 0) {
    			$ul.slideToggle('600');
    			$("#menu-toggle > li > .sub-menu").not($ul).slideUp('300');
    			return false;
    	}
    });

  //});

})(jQuery);
