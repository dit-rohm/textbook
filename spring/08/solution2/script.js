var nextNumber = 1;
var second = 0;
var timer;

function startGame() {
  createButtons();
  startTimer();
}

function createButtons() {
  var numbersArray = getNumbersArray(25).sort(shuffle);
  var arrayLength = numbersArray.length;

  for (var i = 1; i <= arrayLength; i++) {
    var button = document.createElement('input');
    button.onclick = hantei;
    button.className = 'button';
    button.type = 'button';
    button.value = numbersArray.pop();
    document.getElementById('numbers').appendChild(button);
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
    second++;
    document.getElementById('second').innerHTML = second;
  }, 1000);
}

function stopTimer() {
  clearInterval(timer);
}

function shuffle() {
  return Math.random() - 0.5;
}

function hantei() {
  if (this.value == nextNumber) {
    nextNumber++;
    this.style.visibility = 'hidden';
  }

  var buttons = document.getElementsByClassName('button');
  if (nextNumber === (buttons.length + 1)) {
    stopTimer();
    alert('clear');
  }
}
