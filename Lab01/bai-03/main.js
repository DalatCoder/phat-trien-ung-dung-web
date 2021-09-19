const textInput = document.getElementById("text");
const textResult = document.getElementById("text-result");
const numberInput = document.getElementById("number");
const numberResult = document.getElementById("number-result");

textInput.addEventListener("input", function (event) {
  if (event.target.value) {
    const location = getLeftMostVowelPosition(event.target.value);
    if (location === -1) {
      textResult.innerText = "Not found";
    } else {
      textResult.innerText = location;
    }
  } else {
    textResult.innerHTML = "&nbsp;";
  }
});

numberInput.addEventListener("input", function (event) {
  if (event.target.value) {
    const result = getReversedNumber(event.target.value * 1);
    if (Number.isNaN(result)) {
      numberResult.innerText = "Not a number";
    } else {
      numberResult.innerText = result;
    }
  } else {
    numberResult.innerHTML = "&nbsp;";
  }
});

function getLeftMostVowelPosition(str) {
  const vowels = ["a", "e", "i", "o", "u"];
  return str.split("").findIndex((ch) => vowels.includes(ch));
}

function getReversedNumber(number) {
  if (!Number.isInteger(number)) {
    return NaN;
  }

  return number.toString().split("").reverse().join("") * 1;
}
