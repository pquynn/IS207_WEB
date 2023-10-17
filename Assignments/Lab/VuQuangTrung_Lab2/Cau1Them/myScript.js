function Nhap($number) {
    if ($("#inputBox").text() == '0')
        $("#inputBox").text('');
    $("#inputBox").append($number.text());
}

$('#btnCE').click(function () {
    $('#inputBox').text(0);
    $('#resultBox').text(0);
});

$('#btnDel').click(function () {
    $('#inputBox').text($('#inputBox').text().slice(0, -1));
    if ($("#inputBox").text() == '')
        $("#inputBox").text('0');
});

$('#btnAdd, #btnSubtract, #btnMutiply, #btnDivide').click(function () {
    Nhap($(this));
});

$('#btnNine, #btnEight, #btnSeven, #btnSix, #btnFive, #btnFour, #btnThree, #btnTwo, #btnOne, #btnZero').click(function () {
    Nhap($(this));
});

$('#btnDot').click(function () {
    Nhap($(this));
});

$('#btnEqual').click(function () {
    $('#resultBox').text(eval($("#inputBox").text()));
});