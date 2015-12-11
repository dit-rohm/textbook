# 診断ゲーム(解答例)

## HTML

### index.html

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>4タイプ診断 - DIT JS入門</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="header">
    <h2>4タイプ診断 - DIT JS入門</h2>
  </div>
  <div id="wrapper">

    <div id="main">
      <div class="description">
        <p>あなたを「王様」、「軍人」、「学者」、「職人」の4タイプに分類します。</p>
      </div>

      <div class="questions">
        <form name="shindan">
          <div class="question">
            <p>質問1.</p>
            <p>グループディスカッションにおけるあなたの役割は？</p>
            <ul>
              <li><input type="radio" name="q0" value="officer" checked>リーダー</li>
              <li><input type="radio" name="q0" value="scholar">アイデアマン</li>
              <li><input type="radio" name="q0" value="king">ムードメーカ</li>
              <li><input type="radio" name="q0" value="craftsman">監視役</li>
            </ul>
          </div>

          <div class="question">
            <p>質問2.</p>
            <p>後輩との関係で大事にすることは？</p>
            <ul>
              <li><input type="radio" name="q1" value="officer" checked>しっかりとした上下関係</li>
              <li><input type="radio" name="q1" value="king">後輩から慕われること</li>
              <li><input type="radio" name="q1" value="craftsman">自分と価値観が合うこと</li>
              <li><input type="radio" name="q1" value="scholar">特に何も気にしない</li>
            </ul>
          </div>

          <div class="question">
            <p>質問3.</p>
            <p>課題が締切りに間に合わなさそう！どうする？</p>
            <ul>
              <li><input type="radio" name="q2" value="king" checked>とりあえず出す</li>
              <li><input type="radio" name="q2" value="craftsman">諦める</li>
              <li><input type="radio" name="q2" value="officer">先生に謝りに行く</li>
              <li><input type="radio" name="q2" value="scholar">そんなことにはならない</li>
            </ul>
          </div>

          <div class="question">
            <p>質問4.</p>
            <p>出来そうにない依頼をされたら？</p>
            <ul>
              <li><input type="radio" name="q3" value="officer" checked>努力してなんとか仕上げる</li>
              <li><input type="radio" name="q3" value="scholar">猶予をもらってじっくり取り組む</li>
              <li><input type="radio" name="q3" value="king">断れずに引き受け失敗する</li>
              <li><input type="radio" name="q3" value="craftsman">きっぱり断る</li>
            </ul>
          </div>

          <div class="question">
            <p>質問5.</p>
            <p>学校のマラソン大会！あなたの行動は？</p>
            <ul>
              <li><input type="radio" name="q4" value="king" checked>上位を目指して走る</li>
              <li><input type="radio" name="q4" value="officer">友達と勝負しながら走る</li>
              <li><input type="radio" name="q4" value="craftsman">自分のペースで走る</li>
              <li><input type="radio" name="q4" value="scholar">なぜ走らなければいけないのかと考える</li>
            </ul>
          </div>
          <div class="submit">
            <input type="button" value="診断する" onclick="result()">
          </div>
        </form>
      </div>
    </div>

  </div>
  <div id="footer">
    <small>© DIT 2015 All Right Reserved.</small>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
```

### king.html (診断結果：王様タイプ)

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>4タイプ診断 - DIT JS入門</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="header">
    <h2>4タイプ診断 - DIT JS入門</h2>
  </div>
  <div id="wrapper">
    <div id="main">
      <h3>王様タイプ（注目型）</h3>
      <a href="//www.flickr.com/photos/n1ct4yl0r/9898490826" title="King of Hearts by Nic Taylor, on Flickr"><img src="https://c4.staticflickr.com/4/3679/9898490826_253fd4f203_b.jpg" width="1024" height="683" alt="King of Hearts"></a>
      <p>注目型の人は、情熱、すなわち自分の熱意が何より大事なタイプ。人から注目されたい、認められたい、 頼られたいという欲求が基本的に強い人が分類されます。このため目立ちたがりの甘えん坊、 人情もろくておせっかいな人が多いです。</p>
      <p>無視やないがしろにされる事を最も苦痛と感じるため、自分がのけ者となることや、 かげ口を言われると腹をたててしまいます。 ムードメーカで、そこにいるだけで、場が華やぐ人が多いのもこのタイプの傾向です。面倒見がよく、 つきあい上手ですが、身近に不機嫌な人がいると、落ち着きません。 会話が途切れないように気を使うことが多く、パーティなどでも参加者が楽しめているかついつい気になってしまいます。</p>
      <p>また、認められたいと思うあまり、成功の可能性の低い依頼を断り切れずに引き受けて、評価を下げることも多いです。</p>
      <span class="back" onclick="window.history.back()">戻る</span>
    </div>
  </div>
  <div id="footer">
    <small>© DIT 2015 All Right Reserved.</small>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
```

### officer.html (診断結果：軍人タイプ)

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>4タイプ診断 - DIT JS入門</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="header">
    <h2>4タイプ診断 - DIT JS入門</h2>
  </div>
  <div id="wrapper">
    <div id="main">
      <h3>軍人タイプ（司令型）</h3>
      <a href="//www.flickr.com/photos/dvids/3554139099" title="Non-commissioned Officer Parade at Fort Myer by DVIDSHUB, on Flickr"><img src="https://c4.staticflickr.com/4/3560/3554139099_47582e046e_b.jpg" width="1024" height="680" alt="Non-commissioned Officer Parade at Fort Myer"></a>
      <p>司令型の基本的な欲求は、勝負にこだわる点です。 努力家で、常識人のしっかり者。だからこそ上司部下や目上、目下などの上下関係に敏感で礼儀正しく、 部下や後輩が生意気だと腹をたててしまいます。</p>
      <p>能力の差はもちろんのこと、社会的地位や序列を一番気にします。 仕事だけでなく、恋愛も家庭もすべてが対決の場と考えてしまいます。 その勝敗の判定ルールも、はっきりと合理的で理性的です。 他人への好き嫌いを表に出さず、誰とでもつきあいができます。 そのうえ向上心あふれ、よく働く努力家になるので、有能な人が多いのが司令型の特徴です。</p>
      <p>また、「冷たく気が許せない」という評価がある人も多く、孤独に耐える強さや自分に対する厳しさも備えています。</p>
      <span class="back" onclick="window.history.back()">戻る</span>
    </div>
  </div>
  <div id="footer">
    <small>© DIT 2015 All Right Reserved.</small>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
```

### scholar.html (診断結果：学者タイプ)

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>4タイプ診断 - DIT JS入門</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="header">
    <h2>4タイプ診断 - DIT JS入門</h2>
  </div>
  <div id="wrapper">
    <div id="main">
      <h3>学者タイプ（法則型）</h3>
      <a href="//www.flickr.com/photos/gianpierre_soto/5505219003" title="Old Scholar by Gianpierre Soto, on Flickr"><img src="https://c2.staticflickr.com/6/5137/5505219003_896647be39_b.jpg" width="1024" height="769" alt="Old Scholar"></a>
      <p>物事のしくみ・法則を自分なりに理解したり、発見したり、推測したり、仮説を立てたりすることに喜びを感じるタイプです。</p>
      <p>自主性が強く、何をするにも理由が分からない場合苦痛を感じてしまいます。 成功しても、なぜ成功したのかわからない場合は、落ち着かなくなります。 逆に失敗しても、失敗の原因がわかれば結果に嘆いたりしません。 常に一歩引いているニヒリスト。 本当のことだからと、言わないほうがいいことも、つい口にして嫌われることもありますが、 現実をシビアに判断できる参謀タイプとして活躍する人です。</p>
      <p>行動パターンが決まっている傾向が散見され、いつも行く店が決まっている場合が多いです。 せっかく計画したことが他人のわがままで無駄になったときに腹をたてますが、感情的になっても立ち直りが早いです。</p>
      <span class="back" onclick="window.history.back()">戻る</span>
    </div>
  </div>
  <div id="footer">
    <small>© DIT 2015 All Right Reserved.</small>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
```

### craftsman.html (診断結果：職人タイプ)

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>4タイプ診断 - DIT JS入門</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="header">
    <h2>4タイプ診断 - DIT JS入門</h2>
  </div>
  <div id="wrapper">
    <div id="main">
      <h3>職人タイプ（理想型）</h3>
      <a href="//www.flickr.com/photos/theodorescott/5813447537" title="Alabaster Craftsman by Theodore Scott, on Flickr"><img src="https://c3.staticflickr.com/3/2521/5813447537_800bd536ff_b.jpg" width="1024" height="680" alt="Alabaster Craftsman"></a>
      <p>理想型は自分の考えている通りに物事をやり遂げることにこだわる。 つまり、結果よりプロセス、目的より手段を重要視するタイプです。 客観的な成功や完成ではなく、他人の目から見ても分からない、確固たる基準や理想像が自分の中にあって、 それに近づくことが喜びとなります。</p>
      <p>逆にいくら努力しても理想像に近づけないことが悲しみや怒りになります。 正義感が強く、頑固なこだわり派が多く、人間としてちゃんとしていたい、立派でありたいという欲求が強いです。 お金や権力に惑わされない、自由で自分らしい生き方を好む人が多いので、 客に媚びない職人や本物の芸術家はこのタイプです。</p>
      <p>また、頑固過ぎて世間から浮いてしまうこともあります。個人的なこだわりが強い分、 自分の理解者を一生かかっても捜し求めることとなるでしょう。</p>
      <span class="back" onclick="window.history.back()">戻る</span>
    </div>
  </div>
  <div id="footer">
    <small>© DIT 2015 All Right Reserved.</small>
  </div>
  <script type="text/javascript" src="script.js"></script>
</body>
</html>
```

## CSS

### style.css

```css
body {
  margin: 0;
}

#header {
  background: #212121;
  color: white;
}

#header h2 {
  margin: 0 0 0 20px;
}

#wrapper {
  margin: 0 auto;
  width: 800px;
}

#main {
  padding: 20px;
}

img {
  width: 100%;
  height: auto;
}

ul {
  list-style-type: none;
}

.submit {
  text-align: center;
}

.back {
  color: blue;
  cursor: pointer;
  text-decoration: underline;
}

#footer {
  background: #212121;
  color: white;
  text-align: center;
}
```

## JavaScript

### script.js

```js
var type = {
  king: 0, officer: 0, scholar: 0, craftsman: 0
};

function result() {
  var answer = checkAnswer();

  countType(answer);

  var max = getMax(answer);

  var result = getResult(max);

  showResult(result);
}

// 各回答をreturnAnswer配列に格納
function checkAnswer() {
  var total = document.shindan.length;
  var returnAnswer = [];
  for (var i = 0; i < total; i++) {
    if (document.shindan.elements[i].checked) {
      returnAnswer.push(document.shindan.elements[i].value);
    }
  }

  return returnAnswer;
}

// それぞれ数える
function countType(answer) {
  for (var i = 0; i < answer.length; i++) {
    if (answer[i] == 'king') {
      type.king++;
    } else if (answer[i] == 'officer') {
      type.officer++;
    } else if (answer[i] == 'scholar') {
      type.scholar++;
    } else if (answer[i] == 'craftsman') {
      type.craftsman++;
    } else {
      alert('error!!');
      break;
    }
  }
}


/*
 * 回答数が多いプロパティのキーを取りたい
 * 最大回答数の5から降ろしていく
 */
function getMax(answer) {
  for (var i = answer.length; i > 0; i--) {
    var returnMax = getKey(i);
    if (returnMax.length > 0) break;
  }

  return returnMax;
}

// 一致するバリューがあればキーを配列で返す
function getKey(value) {
  var returnKey = [];
  for (var key in type) {
    if (type.hasOwnProperty(key) && type[key] == value) returnKey.push(key);
  }

  return returnKey;
}

function getResult(max) {
  if (max.length == 1) {
    var returnResult = max[0];
  } else {
    returnResult = max[Math.floor(Math.random() * max.length)];
  }

  return returnResult;
}

// タイプごとにページを移動させる
function showResult(result) {
  if (result == 'king') {
    location.href = './king.html';
  } else if (result == 'officer') {
    location.href = './officer.html';
  } else if (result == 'scholar') {
    location.href = './scholar.html';
  } else if (result == 'craftsman') {
    location.href = './craftsman.html';
  } else {
    alert('error');
  }
}
```

## 短縮版

```html
...
<div class="submit">
  <input type="button" value="診断する" id="shindanbtn">
</div>
...
```

```js
window.onload = function () {
  var answer = {};

  function crawler(func) {
    for (var inputs = document.getElementsByTagName("input"), i = 0; i < inputs.length; i++) {
      func(inputs[i]);
    }
  }

  crawler(function (element) {
    answer[element.value] = 0;
  });

  document.getElementById('shindanbtn').addEventListener('click', function () {
    crawler(function (element) {
      element.checked && answer[element.value]++;
    });

    var counts = [];

    Object.keys(answer).forEach(function (key) {
      counts.push([key, answer[key]]);
    });

    counts.sort(function (a, b) {
      return b[1] - a[1];
    });

    alert(counts);

    if (counts[0][1] == counts[1][1]) {
      window.location = counts[Math.floor(Math.random() * 2)][0] + '.html';
    } else {
      window.location = counts[0][0] + '.html';
    }

  });
};
```

 
[前へ 診断ゲームを作ろう(解答例)](../07/shindan_answer.md)
 
[次へ JavaScript入門4](../08/js4.md)
