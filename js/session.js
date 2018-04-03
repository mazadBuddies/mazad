/*
    ************** this file include session js functions ***********
    *           this V.1.1.1 of mazad website at 3 abr 2018         *
    *          this file contains js for broadcastring chat         *
    *****************************************************************
*/
function setChatBottom(){
    $('.messages').scrollTop($(this).height());
}
$(document).ready(function(){
    "use strict";
    setChatBottom();
});

function mkOfferValue(){
    var values = $('button.myBtn.ajax').data('values');
    $('button.myBtn.ajax').data('values'," ");
    values = "|"+"offer=>"+String($('.offerPanel').val());
    $('button.myBtn.ajax').data('values', values);
    console.log(values);
}


function addedNewOfferSuc(data){
    var userInfo = JSON.parse(data);

    var newTableRow =
                '<tr class="animated zoomInDown">' +
                    '<th>' + 
                        userInfo.offer + '<sup>EGP</sup>' +
                    '</th>' + 
                    '<th>' +
                        '<div class="cir">' + 
                            '<img class="img-responsive" src="' +
                                userInfo.photo + 
                            '">' +
                        '</div>' +
                    '</th>' + 
                    '<th>' +
                        userInfo.name + 
                    '</th>'+
                    '<th>' +
                        userInfo.time + 
                    '</th>' +
                '</tr>';
$('div.sessionOffers table tr.head').after(newTableRow);
}
var currentOffer = parseInt($("th.offfer:first-of-type").text())+1;

function showNewOffers(data){
    var newOffersAsJsonObiect = JSON.parse(data);
    var newOffersSize = newOffersAsJsonObiect.length;
    if(newOffersSize > 0){
        for(var i = 0; i < newOffersSize; i++){
            var newTableRow =
                '<tr class="animated zoomInDown">' +
                    '<th>' + 
                        newOffersAsJsonObiect[i].offer + '<sup>EGP</sup>' +
                    '</th>' + 
                    '<th>' +
                        '<div class="cir">' + 
                            '<img class="img-responsive" src="' +
                            newOffersAsJsonObiect[i].photo + 
                            '">' +
                        '</div>' +
                    '</th>' + 
                    '<th>' +
                        newOffersAsJsonObiect[i].name + 
                    '</th>'+
                    '<th>' +
                        newOffersAsJsonObiect[i].time + 
                    '</th>' +
                '</tr>';
        $('div.sessionOffers table tr.head').after(newTableRow);

            currentOffer = parseInt(newOffersAsJsonObiect[i].offer);
        }//end of for
    }//end of if
}

function getNewOffers(){
    var formDataInfo = new FormData();
    formDataInfo.append("ACTION", "GET_NEW_OFFERS");
    formDataInfo.append("curOffer", currentOffer);
    console.log(currentOffer);


    $.ajax({
        url: "class/session.class.php",
        method: "POST",
        data: formDataInfo,
        contentType: false,
        cache: false,
        processData: false,
        success: showNewOffers,
        error: function(data){
            console.log("error");
            alert(data);
        }
    });
}//end of function

setInterval(getNewOffers, 2000);

