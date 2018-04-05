/*
    ************** this file include session js functions ***********
    *           this V.1.1.1 of mazad website at 3 abr 2018         *
    *          this file contains js for broadcastring chat         *
    *****************************************************************
*/
function setChatBottom(){
    /*
        setChatBottom - Function _- VOID
        ::TARGET:: make chat scroll side in bottom when refreash page or requestIt
        @params:: no
    */
    $('.messages').scrollTop($(this).height());
}// end of function setChatBottom

$(document).ready(function(){
    "use strict";
    setChatBottom();
});

function mkOfferValue(){
    /*
        mkOfferValue - Function _- VOID
        ::TARGET:: get data-values from offer value and split it and send value
        @params:: no
    */
    var values = $('button.myBtn.ajax').data('values');
    $('button.myBtn.ajax').data('values'," ");
    values = "|"+"offer=>"+String(pressPlusToAddLastValue());
    $('button.myBtn.ajax').data('values', values);
}// end of function mkOfferValue


function addedNewOfferSuc(data){
    /*
        addedNewOfferSuc - Function _- VOID
        ::TARGET:: show new data added in data base in active user
        @params:: **data** from ajax request
    */
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

$('div.sessionOffers table tr.head').after(newTableRow); // append values in table
}// end of addedNewOfferSuc function

var currentOffer = parseInt($("th.offfer:first-of-type").text())+1;

function showNewOffers(data){
    /*
        showNewOffers - Function - VOID
        ::TARGET:: show new offer form data base which it not displayed in view
        use php script -class/session.class.php- and $_POST->Action is *GET_NEW_OFFERS*
        onSuccess -> use **showNewOffers** SCRIPT_SELF
        @params:: no
    */
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
//    console.log(currentOffer);
}// end of showNewOffers function

function getNewOffers(){
    /*
        getNewOffers - Function _- VOID
        ::TARGET:: get new offer form data base which it not displayed in view
        use php script -class/session.class.php- and $_POST->Action is *GET_NEW_OFFERS*
        onSuccess -> use **showNewOffers** SCRIPT_SELF
        @params:: no
    */

    var formDataInfo = new FormData(); // create new form data
    formDataInfo.append("ACTION", "GET_NEW_OFFERS"); // send which block of code will be executed
    formDataInfo.append("curOffer", currentOffer); // send last offer in session page arrived to it

    $.ajax({
        url: "class/session.class.php",
        method: "POST",
        data: formDataInfo,
        contentType:false,
        cache:      false,
        processData:false,
        success:    showNewOffers,
        error:      function(data){
                    console.log("error");
                    alert(data);
        }// end of error function
    });// end of ajax request
}//end of function

setInterval(getNewOffers, 2000);

