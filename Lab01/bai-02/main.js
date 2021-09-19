const form = document.querySelector("form");
const fromInput = document.getElementById("from");
const toInput = document.getElementById("to");
const resultBox = document.getElementById("result-box");

const state = {
  from: 0,
  to: 0,
};

fromInput.addEventListener("input", function (e) {
  state.from = e.target.value * 1;
  toInput.setAttribute("min", state.from + 1);

  renderTableResult();
});

toInput.addEventListener("input", function (e) {
  state.to = e.target.value * 1;
  renderTableResult();
});

form.addEventListener("submit", function (e) {
  e.preventDefault();
});

function renderTableResult() {
  if (state.from >= state.to) {
    hideResultBox();
    return null;
  }

  const numbers = [];
  for (var i = state.from; i <= state.to; i++) {
    numbers.push(i);
  }

  const html = numbers.map((number) => {
    return `
      <tr>
          <td>${number}</td>
          <td>${number * number}</td>
          <td>${number * number * number}</td>
      </tr>
    `;
  });

  const resultHTML = `
    <h2>Results</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Square</th>
                <th scope="col">Cube</th>
            </tr>
        </thead>
        <tbody>
          {{%tbody%}}
        </tbody>
    </table>
  `;

  resultBox.innerHTML = resultHTML.replace("{{%tbody%}}", html.join(""));

  showResultBox();
}

function hideResultBox() {
  resultBox.style.opacity = 0;
}

function showResultBox() {
  resultBox.style.opacity = 100;
}
