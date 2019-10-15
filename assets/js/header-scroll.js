(function($){

  $(document).ready(function() {

    $(window).on("scroll", function() {

      var fromTop = $(window).scrollTop();

      var vpW = $(window).width();

        if ( vpW < 1024 ) {
          $("#main-header").toggleClass("main-header-small", (fromTop > 30));
          $("#search-top").toggleClass("no-search-top", (fromTop > 30));
        } else {
          $("#main-header").toggleClass("main-header-small", (fromTop > 100));
          $("#search-top").toggleClass("no-search-top", (fromTop > 100));
        }
    });

  });

})(jQuery);
