
var get = document.getElementById('get');
get.onclick = function(){
    var xhttp = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");
    xhttp.open("GET", "profile.inc.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("demo").innerHTML = xhttp.responseText;
    }
    get.style.opacity = '0';
  };
}

/*

  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
  */