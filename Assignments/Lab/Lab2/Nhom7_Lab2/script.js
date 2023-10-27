var input = $('.input-line input');
var result = $('.output-line input');

/*click button has class 'ce'
--> set input, output value to 0*/
$('.ce').click(function () {
    input.val(0);
    result.val(0);
});

/*click button has class 'del'
--> delete the lastest character of input value*/
$('.del').click(function () {
    input.val(input.val().slice(0, -1));

    if (input.val() == "")
        input.val(0);
});

/*click button has class: number, operation, decimal-point
--> change the input value*/
$(".number, .operation, .decimal-point").click(function () {
    if (input.val() == "0") {
        input.val($(this).text());
    }
    else {
        input.val(input.val() + $(this).text());
    }
});

/*click button has class 'equal'
--> calculate the input value and add to output value*/
$('.equal').click(function () {
    result.val(eval(input.val()));
});