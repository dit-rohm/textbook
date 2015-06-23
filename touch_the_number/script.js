var nextNumber = 1;
var second = 0;
var timer;

function startGame() {
  createButtons();
  startTimer();
  document.getElementById('start').style.display = "none";
}

function createButtons() {
  var numbersArray = getNumbersArray(25).sort(shuffle);
  var arrayLength = numbersArray.length;

  for (var i = 1; i <= arrayLength; i++) {
    var target = document.getElementById('numbers');
    var li = document.createElement('button');
    var number = numbersArray.pop();

    li.onclick = judge;
    li.className = 'button';
    li.appendChild(document.createTextNode(number));
    target.appendChild(li);
  }
}

function getNumbersArray(num) {
  var array = [];
  for (var i = 1; i <= num; i++) {
    array.push(i)
  }
  return array;
}

function startTimer() {
  timer = setInterval(function() {
    document.getElementById('second').innerHTML = ++second;
  }, 1000);
}

function stopTimer() {
  clearInterval(timer);
}

function shuffle() {
  return Math.random()-.5;
}

function judge() {
  var buttons = document.getElementsByClassName('button');
  if (this.innerHTML == nextNumber) {
    nextNumber++;
    this.style.visibility = "hidden";
  }
  if (nextNumber === (buttons.length + 1)) {
    stopTimer();
    alert('clear');
  }
}
