/*
 ************** this file include cookie functions ***************
 *           this V.1.0.0 of mazad website at 4 MAR 2018         *
 *         this file cookies main functions addNew - check - get *
 *****************************************************************
*/

function setCookie(cookieName, cookieValue, cookieExDays) {
    /* 
        setCookie - Function - VOID
        ::TARGET:: add new cookie in your mashine
        @params :
            cookieName   => cookie name in array used as key -> value
            cookieValue  => save cookie value for new cookie
            cookieExDays => remove cookie after this time
    */
    var dateForCookieUse = new Date();
    dateForCookieUse.setTime(dateForCookieUse.getTime() + (cookieExDays * 24 * 60 * 60 * 1000));
    var expires = "expires="+ dateForCookieUse.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + cookieExDays + ";path=/";
}//end of function setCookie

function checkCookie(cookieCheckerName, cookieValue) {
    /* 
        checkCookie - Function - BOOLEAN
        ::TARGET::  check cookie found or not in your mashine ,
                    inCase not found, setCookieValuel
        @params :
            cookieCheckerName   => cookie name in array used as key -> value
            cookieValue         => save cookie value to add new
    */
    var cookieGetter = getCookie(cookieCheckerName);
    if (cookieGetter != "") {
        alert("Welcome again " + cookieGetter);
        return true;
    } else {
        //username = prompt("Please enter your name:", "");
        if (cookieValue != "" && cookieValue != null) {
            setCookie("username", cookieValue, 365);
            return false;
        }//end of if
    }// end of else
}// end of function checkCookie


function getCookie(cookieName) {
    /* 
        setCookie - Function - STRING
        ::TARGET:: get cookie value by name
        @params :
            cookieName   => cookie name in array used as key -> value
    */
    var name = cookieName + "=";
    var decodedCookieToString = decodeURIComponent(document.cookie);
    var splitedDecodedCookies = decodedCookieToString.split(';');
    for(var i = 0; i <splitedDecodedCookies.length; i++) {
        var iteratorSplitor = splitedDecodedCookies[i];
        while (iteratorSplitor.charAt(0) == ' ') {
            iteratorSplitor = iteratorSplitor.substring(1);
        }// end of while
        if (iteratorSplitor.indexOf(name) == 0) {
            return iteratorSplitor.substring(name.length, iteratorSplitor.length);
        }// end of if
    }//end of for
    return "";
}//end of function getCookie