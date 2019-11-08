(function($){
  $(document).ready(function() {
    /*
    * Setup tabs for products.
    */
    /*if ( $('.tabs').children().length && $('.tabcontent').length >= 0 ) {
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
    });*/

    /*
    * Setup tabs for products.
    */
    $(".tab-content").hide();
    $(".tab-content:first").show();

    /* if in tab mode */
    $("ul.tabs li").click(function() {
      $(".tab-content").hide();
      var activeTab = $(this).attr("rel");
      $("#"+activeTab).fadeIn();

      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

      $(".tab-drawer-heading").removeClass("d-active");
      $(".tab-drawer-heading[rel^='"+activeTab+"']").addClass("d-active");
    });

    /* if in drawer mode */
    $(".tab-drawer-heading").click(function() {
      $(".tab-content").hide();
      var d_activeTab = $(this).attr("rel");
      $("#"+d_activeTab).fadeIn();

      $(".tab-drawer-heading").removeClass("d-active");
      $(this).addClass("d-active");

      $("ul.tabs li").removeClass("active");
      $("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });

    /* Extra class "tab_last" to add border to right side of last tab */
    $('ul.tabs li').last().addClass("tab-last");

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
			autoSize : false,
	    arrows: true,
			animationEffect: 'zoom',
			transitionEffect: 'fade',
     });

    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
    $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();

    // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using [gallery link="file"] so that a Lightbox Gallery exists
    $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('data-fancybox','gallery').fancybox();

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


    /*
    *  Setup swiper on home page.
    */
    var productSwiper = new Swiper ('.products-slider', {
      // Optional parameters
      speed: 900,
      spaceBetween: 10,
      slidesPerView: 1,
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      autoHeight: true,
      autoplay: {
        delay: 8000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 10
        },
        // when window width is >= 480px
        567: {
          slidesPerView: 2,
          slidesPerGroup: 2,
          spaceBetween: 10
        },
        // when window width is >= 640px
        1024: {
          slidesPerView: 3,
          slidesPerGroup: 3,
          spaceBetween: 10
        }
      }
    });
		var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryFrame = new Swiper('.gallery-frame', {
      spaceBetween: 10,
      autoHeight: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });


  });
})(jQuery);
