(function($){

  function getGridSize() {
    return (window.innerWidth < 420) ? 420 : 320;
  }

  $(window).load(function() {

    // The slider being synced must be initialized first
    $('#product-carousel-galerie').flexslider({
      animation: "slide",
      slideshow: false,
      itemWidth: 100,
      itemMargin: 5,
      maxItems: 5,
      prevText: "",
      nextText: ""
    });

    $('#product-featured-imgs').flexslider({
      animation: "slide",
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
