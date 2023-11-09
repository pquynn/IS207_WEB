const display_in = document.querySelector(.input-line);
const display_out = document.querySelector(.output-line);
const buttons = document.querySelectorAll(.button);
const operators = ["+", "-", "*", "/", "="]
let output = "";
const caculate = (btnValue) => {
if (btnValue === "=" && output !== "") {
    output = eval(output.replace("%", "/100"));
} else if (btnValue === "ce") {
    output = "";
} else if (btnValue === "DEL") {
    output = output.toString().slice(0, -1);
} else {
    if(output === "" && operators.includes(btnValue)) return;
    output += btnValue;
   
}
display_out.value = output;
};
buttons.forEach(function(button)) {
    button.addEventListener('click', function(e)) {
        let value = e.target.dataset.num;
        display_in.value += value;
    }
}
buttons.forEach((button) {
    button.addEventListener('click', (e) => caculate(e.target.dataset.value));

});