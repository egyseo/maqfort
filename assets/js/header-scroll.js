(function($){

  $(document).ready(function() {
    $(window).on("scroll", function() {
      console.log('yoyoyo');
      var fromTop = $(window).scrollTop();
        if ( $( "body" ).is( ".page-template-page-home" ) ) {
          $("#main-header").toggleClass("normal", (fromTop > 200));
        }
    });
  });

})(jQuery);
