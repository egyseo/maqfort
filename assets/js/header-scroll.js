(function($){

  $(document).ready(function() {
    $(window).on("scroll", function() {
      //console.log('yoyoyo');
      var fromTop = $(window).scrollTop();
      var vpW = $(window).width();
        if ( $( "body" ).is( ".page-template-page-home" ) ) {
          if ( vpW < 1024 ) {
            console.log("mais pequeno que 1024");
            $("#main-header").toggleClass("main-header-normal", (fromTop > 20));
          }
          else {
            console.log("maior que 1024");
            $("#main-header").toggleClass("main-header-normal", (fromTop > 100));
          }
        }
    });
  });

})(jQuery);
