var nextNumber = 1;

var numbersArray = [
  20, 17, 4, 6, 22, 8, 10, 15, 1, 18, 24, 13,
  25, 11, 5, 3, 9, 7, 23, 21, 2, 19, 14, 16, 12
];

function startGame() {
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

function hantei() {
  if (this.value == nextNumber) {
    nextNumber++;
    this.style.visibility = 'hidden';
  }
  if (nextNumber == 26) {
    alert('clear');
  }
}

