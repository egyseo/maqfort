(function($){

  $( document ).ready(function() {

    $(".btn-search-top").click(function(){
      $("#searchform-top").slideToggle("500", "swing");
  		$( ".btn-search-top > .fa" ).toggleClass( "fa-times" );
    });

  });

})(jQuery);
