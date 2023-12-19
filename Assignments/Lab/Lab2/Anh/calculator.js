$(document).ready(function() {
    var input = $('#input');
    var result = $('#result');

    //Click to input number
    $('button.number').click(function (){
        if(input.val() == "0")
            input.val("");
        var number = $(this).val();        
        input.val(input.val() + number);
    });

    //Click to input opreration
    $('button.operation').click(function () {
        var operator = $(this).val();
        input.val(input.val() + operator);
    });

    //Click to input dot
    $('#dot').click(function () {
        var dot = $(this).val();
        input.val(input.val() + dot);
    });

    //Click to show result
    $('#equal').click(function () {
        result.val(eval(input.val()));
    });

    //Click to clear the screen
    $('#ce').click(function () {
        input.val("0");
        result.val("0");
    });

    //Spaceback
    $('#del').click(function () {
        var CurrentInput = input.val();
        input.val(CurrentInput.slice(0,-1));
    });

});