(function($){
  $(document).ready(function() {

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

  });
})(jQuery);


/*(function($){
  function tabBtn(event, tabName) {

    let i, tabContent, tabLinks;

    tabContent = $('.tabcontent');

    for (i = 1; i < tabContent.length; i++) {
      tabContent[i].css('display', 'none');
    }

    tabLinks = $('.tablinks');

    for (i = 0; i < tabLinks.length; i++) {
      tabLinks[i].className = tabLinks[i].toggleClass('active');
    }

    $(tabName).css('display', 'block');

    event.currentTarget.className += " active";

  }
})(jQuery);*/
