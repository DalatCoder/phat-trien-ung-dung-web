const form = $("form");
const fromInput = $("#from");
const toInput = $("#to");
const resultBox = $("#result-box");

const state = {
  from: 0,
  to: 0,
};

fromInput.on("change", function (e) {
  state.from = fromInput.val() * 1;
  toInput.attr("min", state.from + 1);

  renderTableResult();
});

toInput.on("change", function (e) {
  state.to = toInput.val() * 1;
  renderTableResult();
});

form.on("submit", function (e) {
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

  resultBox.html(resultHTML.replace("{{%tbody%}}", html.join("")));

  showResultBox();
}

function hideResultBox() {
  resultBox.css("opacity: 0");
}

function showResultBox() {
  resultBox.css("opacity: 100");
}
