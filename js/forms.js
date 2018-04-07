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
$('input[type="range"]').on("click", function(){
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

function submitForm(form){
    var url = form.attr("action");
    var formData = {};
    $(form).find("input[name]").each(function (index, node) {
        formData[node.name] = node.value;
    });
    $.post(url, formData).done(function (data) {
        alert(data);
    });
}/*
function submitForm(form){
    var url = form.attr("action");
    var formData = $(form).serializeArray();
    $.post(url, formData).done(function (data) {
        alert(data);
    });
}
*/

function uploadImage(form){
    "use strict";
    $.ajax({
        type:'POST',
        url: $(form).attr('action'),
        data: new FormData($('#mkSession')[0]),
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log("success");
            console.log(data);
        },
        error: function(data){
            console.log("error");
            console.log(data);
        }
    });
}

function uploadeFile(fileId, fileName, urlDir, form_data, func){
    var property = document.getElementById(fileId).files[0];
    var imageName = property.name;
    var image_exetension = imageName.split('.').pop().toLowerCase();
    if(jQuery.inArray(image_exetension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
        alert("invalid Image");
    }
    var imageSize = property.size;
    if(imageSize > 2000000){
        alert("Image File Size is Very big");
    }else{
        form_data.append(fileName, property);
        $.ajax({
            url: urlDir,
            method: "POST",
            data: form_data,
            contentType:false,
            cache: false,
            processData: false,
            success: func,
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }
}

function makeInsertArray(array, dataForm){
    for(var i=0;i<array.length;i++){
        dataForm.append(array[i].name, array[i].value);
    }
    //console.debug(dataForm);
    return dataForm;
}
/* zzzz */
function ajaxFileSubmit(e){
    "use strict";
    e.preventDefault();
    var url = $(this).data("url");
    var formData = $(this).serializeArray();
    var method   = $(this).data('method');
    var accept   = String($(this).data('accept'));
    formData = makeInsertArray(formData, new FormData());
    formData.append("ACTION", $(this).data('action'));
    uploadeFile("images", "images", url, formData, function (data){
        console.log(data);
        if(data == accept)//here
        {
            $("form#mkSession").fadeOut(500, function(){
                $(".overlay").fadeOut(500, function(){
                    $(".noti-suc").children("span").text("SESSION ADDED SUCCESSFULLY");
                    $(".noti-suc").animate({right:"0%"}, 1000, function(){
                        $(this).animate({right:"0%"}, 2000, function(){
                            $(this).animate({right:"-100%"}, 1000);
                        });// end of small animate
                    });// end of big animate
                });// end of small fadeOut
            });// end of big fadeOut
        }// end of ig
    });// end of accept action function
}// end of function
function defaultAjaxFunction(data){
    return 0;
}
var ajaxSuccessFunctions = [defaultAjaxFunction ,addedNewOfferSuc]; // this array for ajax success functions

function ajaxSubmit(e){
    e.preventDefault();
    var url      = $(this).data("url");
    var formData = $(this).serializeArray();
    var method   = $(this).data('method');
    var accept   = String($(this).data('accept'));
    var action   = $(this).data('action');
    var functionIndex = 0;
    mkOfferValue();
    if($(this).data('values') != undefined){
        var dataAsString = $(this).data('values');
        var splitedArrayOfDataValue = dataAsString.split('|');
    }
    formData = makeInsertArray(formData, new FormData());
    formData.append("ACTION", action);
    if($(this).data('values') != undefined){
        for(var i = 0; i < splitedArrayOfDataValue.length; i++){
            var currentIndexKeyValue = splitedArrayOfDataValue[i].split("=>");
            formData.append(currentIndexKeyValue[0],currentIndexKeyValue[1]);
        }// end of for
    }//end of if
    if($(this).data('function') != undefined){
        functionIndex = parseInt($(this).data('function'));
    }
    
    $.ajax({
        url: url,
        method: method,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: ajaxSuccessFunctions[functionIndex],
        error: function(data){
            console.log("error");
            alert(data);
        }
    });
}

$(".ajax.click").on("click", ajaxSubmit);
$(".ajax_file.submit").on("submit", ajaxFileSubmit);
$(".ajax.submit").on("submit", ajaxSubmit);