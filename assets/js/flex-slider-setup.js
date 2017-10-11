(function($){

  function getGridSize() {
    return (window.innerWidth < 420) ? 420 : 320;
  }

  $(window).load(function() {

    // The slider being synced must be initialized first
    $('#product-carousel-galerie').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: 100,
      itemMargin: 5,
      minItems: 1,
      maxItems: 5,
      asNavFor: '#product-featured-imgs'
    });

    $('#product-featured-imgs').flexslider({
      animation: "slide",
      controlNav: true,
      animationLoop: true,
      slideshow: true,
      keyboard: false,
      prevText: "",
      nextText: "",
    });

    $('.flex-products').flexslider({
      animation: "slide",
      slideshowSpeed: 4000,
      animationSpeed: 600,
      animationLoop: true,
      slideshow: true,
      controlNav: false,
      directionNav: true,
      prevText: "",
      nextText: "",
      itemWidth: getGridSize(),
      touch: true,
      itemMargin: 30,
      minItems: 1,
      maxItems: 3,
    });

  });

})(jQuery);
