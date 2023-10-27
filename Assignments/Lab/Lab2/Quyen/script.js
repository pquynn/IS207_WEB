var input = $('#input-line'); 
var output = $('#output-line');

//click button not having class: btn-equal, btn-ce, btn-del
//--> change the input value
$('button:not(.btn-equal, .btn-ce, .btn-del)').click(
    function(){
        if(input.val() == '0')
            input.val('');

        input.val(input.val() + $(this).text());
    }
);

//click button has class 'btn-del'
//--> delete the lastest character of input value
$('.btn-del').click(
    function(){
        input.val(input.val().slice(0,-1));
        
        if(input.val() == '')
            input.val('0');
    }
);

//click button has class 'btn-ce'
//--> set input, output value to 0
$('.btn-ce').click(
    function(){
        input.val('0');
        output.val('0');
    }
);

//click button has class 'btn-equal'
//-->calculate the input value and add to output value
$('.btn-equal').click(
    function(){
        output.val(eval(input.val()));
    }
);

