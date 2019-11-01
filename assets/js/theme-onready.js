(function($){
  $(document).ready(function() {

    /*
    * Setup tabs for products.
    */
    if ( $('.tabs').children().length && $('.tabcontent').length >= 0 ) {
      $('.tabs .tablinks').first().addClass('active');
      $('.tabcontent').first().css('display', 'block');
    }
    $('.tablinks').click(function(){
       var tabID = $(this).attr('id');
        if(!$(this).hasClass('active')){
          $('.tablinks').removeClass('active');
          $('.tabcontent').css('display', 'none');
          $(this).addClass('active');
          $('#'+tabID+'-tab').css('display', 'block');
        }
    });

    /*
    * Slide search form, from top.
    */
    $(".btn-search-top").click(function(){
      $("#searchform-top").slideToggle("500", "swing");
      $( ".btn-search-top > .fa" ).toggleClass( "fa-times" );
    });

    /*
    * Setup scroll to top button.
    */
    $(window).scroll(function(){
      if ( $(this).scrollTop() >= 200) {    // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
      } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
      }
    });
    $('#return-to-top').click(function() {  // When arrow is clicked
      $('body,html').animate({
          scrollTop : 0                     // Scroll to top of body
      }, 700);
    });

    /*
    * Change header on scroll.
    */
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

    /*
    * Setup mobile menu.
    */
    // Calling the function to show moblile menu.
    $('.toggle-nav, #mobile-grey-back').click(function() {
      toggleNavigation();
    });

    // The mobile menu function.
    function toggleNavigation() {
      if ($('#site-wrapper').hasClass('display-nav')) {
        // Close nav.
        $('#site-wrapper').removeClass('display-nav');
        $('#mobile-grey-back').fadeOut('fast');
        $('.toggle-nav .fa').removeClass('fa-times').addClass( 'fa-bars' );
      } else {
        // Open nav.
        $('#site-wrapper').addClass('display-nav');
        $('#mobile-grey-back').fadeIn('fast');
        $('.toggle-nav .fa').removeClass('fa-bars').addClass( 'fa-times' );
      }
    }

    // The mobile sub menu setup.
    $("#menu-toggle > li > .sub-menu").hide();
    $('#menu-toggle > li > a').click(function () {
      var $ul = $(this).siblings('ul');
      if ($ul.length > 0) {
        $ul.slideToggle('600');
        $("#menu-toggle > li > .sub-menu").not($ul).slideUp('300');
        return false;
      }
    });

    /*
    * Setup fancybox
    * Initialize the Lightbox for any links with the 'fancybox' class.
    */
    $(".fancybox").fancybox();

    $("[data-fancybox]").fancybox({
    // Options will go here
     });

    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
    $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();

    // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using [gallery link="file"] so that a Lightbox Gallery exists
    $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('data-fancybox','group').fancybox();

    // Initalize the Lightbox for any links with the 'video' class and provide improved video embed support
    $(".video").fancybox({
      maxWidth        : 800,
      maxHeight       : 600,
      fitToView       : false,
      width           : '70%',
      height          : '70%',
      autoSize        : false,
      closeClick      : false,
      openEffect      : 'none',
      closeEffect     : 'none'
    });

    $(".button-getquote").fancybox({
      fitToView	: true,
      width		: '80%',
      height		: '80%',
      autoSize	: true,
      closeClick	: false,
      openEffect	: 'none',
      closeEffect	: 'none'
    });

  });
})(jQuery);
