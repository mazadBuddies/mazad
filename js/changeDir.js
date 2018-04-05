/* global $, console */
//setCookie("dire", "dash", 1);

var directionValue = (getCookie("dire") === undefined)?getCookie("dire"):"";
directionValue = getCookie("dire");
if (directionValue == "dashboard"){
    OpenDash();
}else if(directionValue == "profile"){
    OpenProfile();
}else if(directionValue == "admin-panel"){
    OpenAdmin();
}

