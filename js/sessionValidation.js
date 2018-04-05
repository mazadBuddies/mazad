/*
    ****** this file include session js validation functions ********
    *           this V.1.0.0 of mazad website at 5 abr 2018         *
    *          this file contains js validation session offers      *
    *****************************************************************
*/

/*  
    session offer input for press + and number to get last
    number and increament it 
*/
function pressPlusToAddLastValue(){
    "use strict";
    if($(".offerPanel").val().charAt(0) == '+'){
        return parseInt($(".offerPanel").val().substr(1, $(".offerPanel").val().length)) + (currentOffer-1);
    }//end of if
    return $(".offerPanel").val();
}// end pressPlusToAddLastValue function

function offerIsFitWithIncreamentValue(offer, increament){
    var arrayOfErrors = [];
    if(isNumber(offer) != 0){
        arrayOfErrors.unshift("This Not Number");
    }

    
}// end of offerIsFitWithIncreamentValue fuction

//$('.addNewOffer.myBtn').on("click", );
