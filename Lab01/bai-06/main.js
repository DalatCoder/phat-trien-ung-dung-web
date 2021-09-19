const textInput = $("#text");
const textResult = $("#text-result");
const numberInput = $("#number");
const numberResult = $("#number-result");

textInput.on("keyup", function (event) {
  if (textInput.val()) {
    const location = getLeftMostVowelPosition(textInput.val());
    if (location === -1) {
      textResult.html("Not found");
    } else {
      textResult.html(location);
    }
  } else {
    textResult.html("&nbsp;");
  }
});

numberInput.on("keyup", function (event) {
  if (numberInput.val()) {
    const result = getReversedNumber(numberInput.val() * 1);
    if (Number.isNaN(result)) {
      numberResult.html("Not a number");
    } else {
      numberResult.html(result);
    }
  } else {
    numberResult.html("&nbsp;");
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
