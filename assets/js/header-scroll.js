(function($){

  $(document).ready(function() {

    $(window).on("scroll", function() {

      var fromTop = $(window).scrollTop();

      var vpW = $(window).width();

        if ( vpW < 1024 ) {
          $("#main-header").toggleClass("main-header-small", (fromTop > 20));
        } else {
          $("#main-header").toggleClass("main-header-small", (fromTop > 60));
        }
    });

  });

})(jQuery);
