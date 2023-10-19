var input = $('.input-line input');
var result = $('.output-line input');

$('.ce').click(function () {
    input.val(0);
    result.val(0);
});

$('.del').click(function () {
    input.val(input.val().slice(0, -1));

    if (input.val() == "")
        input.val(0);
});

$(".number, .operation, .decimal-point").click(function () {
    if (input.val() == "0") {
        input.val($(this).text());
    }
    else {
        input.val(input.val() + $(this).text());
    }
});


$('.equal').click(function () {
    result.val(eval(input.val()));
});