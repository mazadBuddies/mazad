/*
***********************************************
* this script for loader anmiations v.1.0     *
*    using HTML - CSS - JS 26 MAR 2018        *
***********************************************
*/

function loadContent( loadFromLink , appendContent , method){
		"use strict";
		 var xhttp = new XMLHttpRequest(); 
	 	xhttp.onreadystatechange = function() {
  		if (this.readyState == 4 && this.status == 200) {
    		document.getElementById("demo").innerHTML = this.responseText;
  		}	
	};
	xhttp.open("GET", "ajax_info.txt", true);
	xhttp.send(); 
	 document.getElementById("getProfile").innerHTML = xhttp.responseText; 
	 console.log(xhttp.responseText);
}// end of function loadContent
/*
function loadDoc(url, cFunction) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      cFunction(this);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}
*/

$("#getProfile").on("click", function(){
	"use strict";
	loadContent("profile.inc.php", "getProfile","GET");
});