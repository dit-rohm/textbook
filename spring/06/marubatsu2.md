# まるばつクイズを作ろう(解答)

## HTMLのソースコード
```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>○×クイズ</title>
</head>
<body>
  <div class="wrapper">
    <h1>まるばつクイズ</h1>
    <div id="question"></div>
    <div id="buttons">
      <input type="button" class="button" value="○" onclick="hantei(1)">
      <input type="button" class="button" value="×" onclick="hantei(2)">
    </div>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
```

## CSSのソースコード

```css
.wrapper {
  margin: 0 auto;
  width: 1000px;
  margin-top: 200px;
}

#question {
  font-size: 20px;
  text-align: center;
}

h1 {
  text-align: center;
}

#buttons {
  text-align:center;
}

.button {
  margin: 10px;
  width: 100px;
  height: 40px;
  background: #EEE;
  border: 1px solid #DDD;
  border-radius: 8px;
  color: #111;
  font-size: 20px;
  outline: none;
}

.button:hover {
  background-color: #a1d7e0;
  cursor: pointer;
}
```

## JavaScriptのソースコード

```javascript
var qa = [
  ['「テトリス（ゲーム）」を開発したのは、日本人だ。', 2],
  ['生きている間は、有名な人であっても広辞苑に載ることはない。 ', 1],
  ['現在、2000円札は製造を停止している。', 1],
  ['パトカーは、取り締まっている最中であれば、どこでも駐車違反になることはない。', 2],
  ['昆虫の中には、口で呼吸する昆虫もいる。 ', 2],
  ['一般的に体の水分は、男性より女性のほうが多く含まれている。', 2],
  ['たとえ１ｃｍの高さであっても、地震によって起こるのは全て「津波」である。', 1],
  ['1円玉の直径は、ちょうど１ｃｍになっている。', 2],
  ['塩はカロリー０である。 ', 1],
  ['「小中学校は、PTAを作らなければならない」と法律で定められている。', 2]
];

var count = 0;
var correctNum = 0;

window.onload = function() {
  // 最初の問題を表示
  var question = document.getElementById('question');
  question.innerHTML = (count + 1) + '問目：' + qa[count][0];
};

// クリック時の答え判定
function hantei(btnNo) {
  if (qa[count][1] == btnNo) {
    correctNum++;
  }

  if (count == 9) {
    alert('あなたの正解数は' + correctNum + '問です！');
  }

  // 次の問題表示
  count++;
  var question = document.getElementById('question');
  question.innerHTML = (count + 1) + '問目：' + qa[count][0];
}
```

<a href="/dit-rohm/textbook/blob/master/spring/07/js3.md">JavaScript入門3</a>
