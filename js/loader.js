/*
***********************************************
* this script for loader anmiations v.1.0     *
*    using HTML - CSS - JS 26 MAR 2018        *
***********************************************
*/
/*			  ____________________________________________
 HTML CONTENT | <span class="loader" data-kind="1"></span>|
 			  ---------------------------------------------*/
var loaderHtmlContentIndexed = 
['<div class="spinner1"></div>',
 '<div class="spinner2"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>',
 '<div class="spinner3"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div></div>',
 '<div class="spinner4"><div class="cube1"></div><div class="cube2"></div></div>',
 '<div class="spinner5"></div>',
 '<div class="spinner6"><div class="dot1"></div><div class="dot2"></div></div>',
 '<div class="spinner7"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>',
 '<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>',
 '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>',
 '<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>',
 '<div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div>'
];// this var to catch spinner content max 11

$('.loader').each( function(index){
	"use strict";
	$(this).append(loaderHtmlContentIndexed[$(this).data('kind')-1]);
});

