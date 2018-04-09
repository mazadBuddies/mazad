
function isNumber(){
    var numberPatt1 = /[^1-9]/g;
    var result      = offer.match(numberPatt1);
    return result.length;
}