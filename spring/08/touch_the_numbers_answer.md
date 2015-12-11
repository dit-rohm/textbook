# Touch the Numbers（解答）

## index.html

```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Touch the Numbers</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div id="wrapper">
    <input id="start" type="button" onclick="startGame()" value="ゲームスタート">
    <div id="numbers"></div>
    Time: <span id="second">0</span>
  </div>
  <script src="./script.js"></script>
</body>
</html>
```

## style.css

```css
#wrapper {
  margin: 0 auto;
  width: 250px;
}

#start{
  margin-bottom: 30px;
}

#numbers {
  clear: both;
  width: 250px;
  height: 250px;
}

#numbers input[type="button"] {
  display: block;
  float: left;
  width: 50px;
  height: 50px;
  border: 0;
  background: #eee;
  font-size: 17px;
  font-weight: bold;
}

#footer {
  margin-top: 20px;
}
```

## script.js

```javascript
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
```
 
[前へ タッチザナンバーズを作ろう(解答)](../08/touch_the_numbers_answer.md)
 
[次へ jQuery入門](../09/jquery.md)
