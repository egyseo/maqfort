(function($){
  console.log('cookies bitch');
  function euSetCookie(cookieName, cookieValue, nDays) {
    var today = new Date();
    var expire = new Date();
    if (nDays==null || nDays==0) nDays=1;
    expire.setTime(today.getTime() + 3600000*24*nDays);
    document.cookie = cookieName+"="+escape(cookieValue)+ ";expires="+expire.toGMTString()+"; path=/";
  }

  function euReadCookie(cookieName) {
    var theCookie=" "+document.cookie;
    var ind=theCookie.indexOf(" "+cookieName+"=");
    if (ind==-1) ind=theCookie.indexOf(";"+cookieName+"=");
    if (ind==-1 || cookieName=="") return "";
    var ind1=theCookie.indexOf(";",ind+1);
    if (ind1==-1) ind1=theCookie.length;
    return unescape(theCookie.substring(ind+cookieName.length+2,ind1));
  }

  function euDeleteCookie(cookieName) {
    var today = new Date();
    var expire = new Date() - 30;
    expire.setTime(today.getTime() - 3600000*24*90);
    document.cookie = cookieName+"="+escape(cookieValue)+ ";expires="+expire.toGMTString();
  }

  function euAcceptCookiesWP() {
    euSetCookie('euCookiesAcc', true, 365);
    $("#eu-cookie-bar").animate( { bottom: "-70", opacity: 0 }, 600, function(){console.log("tem cok");});
    //$("html").css("margin-top","0");
  }

  $(document).ready(function() {
    if( !(euReadCookie("euCookiesAcc")) ){
      console.log("cookie not set");
      $("#eu-cookie-bar").animate( { bottom: "0", opacity: 1, display: "block" }, 600, function(){});
    }
  });

})(jQuery);
