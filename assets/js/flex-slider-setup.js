(function($){

  function getGridSize() {
    return (window.innerWidth < 420) ? 420 : 320;
  }

  $(window).load(function() {

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
