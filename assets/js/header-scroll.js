(function($){

  $(document).ready(function() {

    $(window).on("scroll", function() {

      var fromTop = $(window).scrollTop();

      var vpW = $(window).width();

        if ( $( "body" ).is( ".page-template-page-home" ) ) {

          if ( vpW < 1024 ) {
            $("#main-header").toggleClass("main-header-normal", (fromTop > 20));
          } else {
            $("#main-header").toggleClass("main-header-normal", (fromTop > 100));
          }

        }

        if ( vpW < 1024 ) {
          $("#main-header").toggleClass("main-header-small", (fromTop > 20));
        } else {
          $("#main-header").toggleClass("main-header-small", (fromTop > 60));
        }
    });

  });

})(jQuery);
