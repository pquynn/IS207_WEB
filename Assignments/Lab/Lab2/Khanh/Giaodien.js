/** @format */

// **********SELECT**********
// select number
const numberArray = document.querySelectorAll(".number");

// select operator
const operatorArray = document.querySelectorAll(".operation");

// digit
const decimalPoint = document.querySelector(".decimal-point");

// equal
const equal = document.querySelector(".equal");

// CE, DEL button
const ce = document.querySelector(".ce");
const del = document.querySelector(".del");

//input, output
const input = document.querySelector(".input-line input");
const output = document.querySelector(".output-line input");

// variable
// let result;
let firstNum;
let secondNum;
let currentNumString = "";
let currentOperator;
let expression = "";

//Number
numberArray.forEach((number) => {
  number.addEventListener("click", function () {
    expression += number.textContent;
    currentNumString += number.textContent;

    // display
    input.value = expression;
  });
});

// Operator
operatorArray.forEach((operator) => {
  operator.addEventListener("click", function () {
    expression += operator.textContent;
    input.value = expression;

    firstNum = Number(currentNumString);
    currentOperator = operator.textContent;
    currentNumString = "";
  });
});

// equal
equal.addEventListener("click", function () {
  secondNum = Number(currentNumString);

  let result = 0;

  result = currentOperator === "+" ? firstNum + secondNum : result;
  result = currentOperator === "-" ? firstNum + secondNum : result;
  result = currentOperator === "*" ? firstNum + secondNum : result;
  result = currentOperator === "/" ? firstNum + secondNum : result;

  output.value = result;

  // }
});

// ce
ce.addEventListener("click", function () {
  input.value = output.value = 0;
  firstNum = secondNum = 0;
  currentNumString = "";
  currentOperator = "";
  expression = "";
});
