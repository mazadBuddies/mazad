// start of border-bottom input
$('div.border').append("<div class='bor'></div>");
$('div.menu-header').append("<div class='ponn'></div>");
if($('div.add-icon').children('input').data('show') === true){
    $('div.add-icon').append('<i class="fa fa-eye show"></i>');}
$('i.show').on('click', function(){
    if($(this).hasClass('fa-eye')){
        $(this).removeClass('fa-eye').addClass('fa-eye-slash').siblings('input').attr('type','text');
    }else{
        $(this).removeClass('fa-eye-slash').addClass('fa-eye').siblings('input').attr('type','password');
    }});
$("input").on('focus', function(){
   "use strict";
    $(this).parent().children('div.bor').animate({width:'100%',left:'0px'});
}).on('blur',function(){
    $(this).parent().children('div.bor').animate({width:'0%',left:'50%'});});
var chatcher;
$('input').on('focus',function(){
    "use strict";
    chatcher = $(this).attr('placeholder');
    $(this).attr('placeholder','');
}).on('blur',function(){
    $(this).attr('placeholder',chatcher);});

// aside auto hight & resize panel
var asideHeight = window.innerHeight - parseInt($('.nav-bar').css("height"));
$('.left-side').css({height:asideHeight});
$(window).on("resize", function(){
    "use strict";
    asideHeight = window.innerHeight - parseInt($('.nav-bar').css("height"));
    $('.left-side').css({height:asideHeight});});
$('div.img').on("click", function(){
    "use strict";
    if($("div.menu").css('display') === 'none')
        $("div.menu").fadeIn();
    else
        $("div.menu").fadeOut();});

$('div.menu li').on("click", function(){
    "use strict";
    $(this).addClass('active').siblings().removeClass('active');
    var color = $(this).data('color');
    $('div.menu-header div.ponn').css({"background-color": color});});
$('div.controls').append("<div class='after'></div>");

$('div.controls span').on("click", function(){
    "use strict";
    $(this).addClass("active").siblings().removeClass('active');
    if($(this).hasClass('first')){$("div.controls div.after").css({"right":"50%","width":"50%"});$("div.slide div.inner").animate({"left": "0%"});}
    else{$("div.controls div.after").css({"right":"6%","width":"35%"});$("div.slide div.inner").animate({"left": "-100%"});}    
});
$("div.following div.cir.f1").append("<div class='before'><span>Following</span></div><div class='after'>Following</div>");
$("div.following div.cir.f2").append("<div class='before'><span>Followers</span></div><div class='after'>Followers</div>");
//var_dump($("div.following div.cir").children("div.after").css("top");
// 
$("div.following div.cir").on("mouseenter", function(){
    "use strict";
    if($(this).data('open') === false){
        $(this).children("div.after").animate({"top":"-50%"});
        $(this).children("div.before").animate({"bottom":"-50%"});
        $(this).siblings("span.outter").animate({"opacity":"1"},1000);
        $(this).data('open', true);
    }
    else{
        $(this).children("div.after").animate({"top":"0%"});
        $(this).children("div.before").animate({"bottom":"0px"});
        $(this).siblings("span.outter").animate({"opacity":"0"},1000);
        $(this).data('open', false);
    }
});

//start of make stars of feedback and rate
var numOfStars = $("div.stars").data("rate")+1;
for(var i = 0; i< numOfStars ; i++){
    $("div.stars").children("i." + i).removeClass("far").addClass("fas");
}

// make fake ajax load content
$("section.content").children().css(({"display":"none", "opacity":"0"}));
$("section."+$("li.side").data("dir")).css({"display":"block"}).animate({"opacity":"1"});

function changeLink(){
    "use strict";
    if($(this).data("on") == true)
    {
        $("section.content").children().css(({"display":"none", "opacity":"0"}));
        var arrayLinks = ['','',''];
        /***************************************************************************/
        $("section."+$(this).data("dir")).css({"display":"block"}).animate({"opacity":"1"});
        $(this).addClass("active").siblings().removeClass("active");
    }
}

function OpenProfile(){
    $("section.content").children().css(({"display":"none", "opacity":"0"}));
    $("aside.left-side ul li.profileLink").addClass("active").siblings().removeClass("active");
    $("section."+$("aside.left-side ul li.profileLink").data("dir")).css({"display":"block"}).animate({"opacity":"1"});
}
function OpenDash(){
    $("section.content").children().css(({"display":"none", "opacity":"0"}));
    $("aside.left-side ul li.dash").addClass("active").siblings().removeClass("active");
    $("section."+$("aside.left-side ul li.dash").data("dir")).css({"display":"block"}).animate({"opacity":"1"});
}
function OpenAdmin(){
    $("section.content").children().css(({"display":"none", "opacity":"0"}));
    $("aside.left-side ul li.admin").addClass("active").siblings().removeClass("active");
    $("section."+$("aside.left-side ul li.admin").data("dir")).css({"display":"block"}).animate({"opacity":"1"});
}

$("aside.left-side ul li").on("click", changeLink);

// start of make rotated arrow
$(".rotate").on("click", function(){
    "use strict";
    (!$(this).hasClass("rotate-180"))?$(this).addClass("rotate-180"):$(this).removeClass("rotate-180");
});

// start of rotated arrow to show dropdown
$("i.ll").on("click", function(){
    "use strict";
    if($("div.info div.drop-down").css("opacity") == 0){
        $("div.info div.drop-down").css({"opacity":"1"});
        $(this).addClass("rotate-180");
    }
    else{
        $("div.info div.drop-down").css({"opacity":"0"});
        $(this).removeClass("rotate-180");
    }
});

// start of change theme of of website ----not finished---
var style = $("link.sepp");
function changeTheme(){
        "use strict";
        var STYLE_ROOT        = "/mazad/css/styles/";
        var themeCountNumber  = $("link.sepp").data('count');
        var currentTheme      = $("link.sepp").data('cur');
        var nextTheme         = currentTheme + 1;
        if(nextTheme > themeCountNumber){
            nextTheme = 1;
        }
        var nextThemePathName = STYLE_ROOT + "frontEnd" + nextTheme + ".css";
        $("link.sepp").attr('href', nextThemePathName);
        $("link.sepp").data('cur', nextTheme);
}
$("ul li.chng").on("click", changeTheme);

$(document).on("keydown", function(e){
    if(e.shiftKey  && e.which == 84){
        changeTheme();
    }
    if(e.shiftKey  && e.which == 80){
        OpenProfile();
    }
    if(e.shiftKey  && e.which == 68){
        OpenDash();
    }
    if(e.shiftKey  && e.which == 65){
        OpenAdmin();
    }
    console.log(e.which);
});

// start of append switch content to assig css
var switchName = $('.switch');
switchName.append('<div class="sig"><span class="off">OFF</span><span class="sp"> &nbsp;<span class="dot"> &nbsp;</span></span><span class="on">ON</span></div>');
var child = $(".switch").children('.sig');
$(".switch").each(function( index ) {
    $(this).children('.sig').css("left", $(this).data("off"));
  });

// start of switch code using input hidden 
switchName.append('<input type = "hidden" name=' + switchName.data("name") + ' value="0" class = "switchInput">');
$('.switch').on("click", function(){
    "use strict";
    var child = $(this).children('.sig');
    var val = (child.css('left') == $(this).data('off'))?$(this).data('on'):$(this).data('off');
    child.animate({'left':val}, 100);
    if($(this).data('tar') == false){
        $(this).children("input.switchInput").attr("value", 1);
        $(this).data('tar', true);
    }else{
        $(this).children("input.switchInput").attr("value", 0);
        $(this).data('tar',false);
    }
    //$(this).data('tar');
    //console.log($(this).children("input.switchInput").attr("value"));
});

// start of show value of range input
$('input[type="range"]').on("change", function(){
    "use strict";
    var value = document.getElementById('val');
    value.innerHTML = $('input[type="range"]').val();
});

// start of make tags
var tag = 0;
var tagVal = "";
$("input.tagsInput").on("keypress", function(e){
    if(tag === 0 && e.which == 43){
        $("div.tags").show(500);
        console.log("good");
    }
    if(e.which == 43) {
        tag++;
        $("div.tags").append("<div class='qur'></div>");
        tagVal += $(this).val() + "|";
        $("div.qur:last").text($(this).val());
        $("div.qur:last").animate({"opacity":"1"},500);
        $("input.setTags").attr("value", tagVal);
        $(this).val("");
        $("div.tags").show();
    }
    if($(this).val() == "+")
        $(this).val("");
});

// start of remove tags on double click
$("div.tags").on("dblclick", function(){
    "use strict";
    $("input.tagsInput").val("");
    $(this).hide(500, function(){
        $(this).text("");
        tagVal = "";
        tag=0;
    });
    
});

$("span.title").on("click", function(){
    "use strict";
    $(this).children("ul").fadeOut;
});


// start of toggle botton panel on click
var speedOfSwitchPanel = 200;// this var for speed of open panel
$('.open-panel').on("click", function(){
    "use strict";
    var dataTargetClassDirection = 'div.' + $(this).data('name');
    //console.log($(this).data('name'));
    if($(this).parent().siblings(dataTargetClassDirection).hasClass('hidden')){
        $(this).parent().siblings(dataTargetClassDirection).animate({"opacity":"0.6"},speedOfSwitchPanel).removeClass('hidden');
    }else{
        $(this).parent().siblings(dataTargetClassDirection).animate({"opacity":"0"},speedOfSwitchPanel).addClass('hidden');
    }//end of else 
});//end of toggle panel
/*
$('#get').on("click", function(){
    "use strict";
    console.log("good");
    var newRequest = new XMLHttpRequest();
    newRequest.onreadystatechange = function(){
        //"use strict";
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content2").innerHTML =
            this.responseText;
       }
    };
    newRequest.open("GET", "profile.php", true);
    newRequest.send();
});
*/

var trigger = false;
var myIncudeScripts = [
    "includes/TPL/pops/editProfile.pop.php"
    ,"includes/TPL/makeSession.php"];
// start of make overlay fadeToggle
$(".makeOverLay").on("click", function(){
    "use strict";
    trigger = true;
    var indexedLoadeContentFromArray = $(this).data('content');
    //$("body").css({"overflow-y":"hidden"});
    $(window).on("scroll", function(){
        "use strict";
        if($(window).scrollTop() > 450 && trigger == true)
            $(window).scrollTop(450);
    });
    $(".overlay").css({"display":"block"}).animate({"opacity":"1"},200, function(){
        $(".exit-icon").css({"display":"block"}).animate({"opacity":"1"},100);//will add new content here
        $(".edit").animate({"opacity":"1"},1000);
        $.get(myIncudeScripts[indexedLoadeContentFromArray], function(data, status){
            $(".edit").append(data);
            $(".edit").append("<script src='js/forms.js'></script>");
        });
        /*$.ajax({
            url:myIncudeScripts[indexedLoadeContentFromArray],
            dataType:"html",
            success: function(data){
                alert(data);
            }
        });*/
    });
});
$(".exit-icon").on("click", function(){
    "use strict";
    trigger = false;
    $(".edit").animate({"opacity":"0"},300, function(){
        $(".exit-icon").animate({"opacity":"0"},100, function(){
        $(".overlay").animate({"opacity":"0"},1000, function(){
            $("body").css({"overflow-y":"auto"});
            $(".overlay").css({"display":"none"});
            $(".exit-icon").css({"display":"none"});
            $(".edit").empty();
        });//will add new content here
    });
    });
});



function submitForm(form){
    var url = form.attr("action");
    var formData = $(form).serializeArray();
    $.post(url, formData).done(function (data) {
        alert(data);
    });
}
/*
$("form").on("submit", function(e){
    "use strict";
    e.preventDefault();
    submitForm($(this));
});
*/
$('div.followPup div.cir').on("mouseenter", function(){
    "use strict";
    if($(this).siblings('.controls').data('show') === false){
        $(this).siblings('.controls').data('show', true);
        $(this).siblings('.controls').css({"transform":"scale(1) rotateX(0deg)"});
    }else{
        $(this).siblings('.controls').data('show', false);
        $(this).siblings('.controls').css({"transform":"scale(0) rotateX(90deg)"});
    }
});

$('.closeP').on("click", function(){
    "use strict";
    $(this).parent().slideUp();
});

$("span.number").on("click", function(){
    "use strict";
    var elementName = "div"+ "." + $(this).data("open");
    $(elementName).slideDown();
});

$(".closeDbl").on("dblclick", function(){
    "use strict";
    $(this).fadeOut();
});

$("div.session-panel").on("mouseenter", function(){
    "use strict";
    $(this).children(".enter").animate({display:"block", opacity: "1"});
    $(this).children(".bottom-panel").animate({bottom:"0px"});
});
$("div.session-panel").on("mouseleave", function(){
    "use strict";
    $(this).children(".enter").animate({display:"none", opacity: "0"});
    $(this).children(".bottom-panel").animate({bottom:"-68px"});
});
$("div.session-panel").each(function(){
    $(this).css({"backgroundImage": "url('"+$(this).data("img") +"')"});
    console.log($(this).data("img"));
});
