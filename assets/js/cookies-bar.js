jQuery(document).ready(function( $ ) {
  if(!euReadCookie("euCookiesAcc")){
    $("#eu-cookie-bar").slideDown();
  }
});

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
  euSetCookie("euCookiesAcc", true, 365);
  jQuery("#eu-cookie-bar").slideUp();
}


function mfNextTable(evt, tableName) {
  let i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tableName).style.display = "block";
  evt.currentTarget.className += " active";
}
