# 診断ゲームを作ろう

以下のような診断ゲームを作成しましょう。

- 4つの選択肢を持つ設問が5個あります
- 5個の設問から王様、軍人、学者、職人の4つのタイプに分類します
- 4つの選択肢はそれぞれのタイプに該当します（ex. 選択肢1なら王様タイプ, 2なら軍人タイプ）
- 最終的に何タイプの選択肢を多く選択したかで診断します

サンプルはこちらから -> [DIT JS入門 診断ゲーム](https://tamrin007.github.io/textbook/)

テンプレートはこちら -> [テンプレート](https://github.com/Tamrin007/textbook/blob/shindan-game/7/shindan_template.zip?raw=true)

テンプレートに追記するカタチでこれ以降のプログラムの実装を進めてください。

> 参考
> [FREEex: 4-types Determination Test(Japanese)](http://four-types.appspot.com/About4types.html)

## 基本仕様

1. フォームの選択肢を選びます
1. 「診断する」ボタンを押します
1. JavaScriptの関数が動作します
1. 各回答を配列に格納します
1. どのタイプの選択肢を何個選んだかそれぞれ数えます
1. 1番多く選んだタイプはどれか判定します
1. 同率1位のタイプがある場合、ランダムに選びます
1. 診断結果ページに飛びます

## 実装手順

最終的には以下のオブジェクトと関数を実装します。

```js
var type = {
  king: 0,
  officer: 0,
  scholar: 0,
  craftsman: 0
}

function result() {
  // 各回答を配列に格納します
  var answer = checkAnswer();

  // どのタイプの選択肢を何個選んだかそれぞれ数えます
  countType(answer);

  // 1番多く選んだタイプはどれか判定します
  var max = getMax(answer);

  // 1番多く選んだタイプはどれか判定します
  var result = getResult(max);

  // 診断結果ページに飛びます
  showResult(result);
}

function checkAnswer() {
  ...
}

function countType(answer) {
  ...
}

function getMax(answer) {
  ...
}

function getKey(value) {
  ...
}

function getResult(max) {
  ...
}

function showResult(result) {
  
}
```

### 手順1

HTMLのフォームを作る

```html
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
```

### 手順2

どのタイプの回答がいくつ選択されたかを保存するオブジェクト `type` と、HTMLから呼び出す `result()` 関数を実装します。

```js
var type = {
  king: 0,
  officer: 0,
  scholar: 0,
  craftsman: 0
}

function result() {
  
}
```

> #### コラム3 グローバル変数
> ここで宣言した `type` というオブジェクトはどの関数にも属しておらず、グローバル変数と呼ばれます。グローバル変数はプログラム内のどの関数からも参照 / 変更することが可能であり、プログラムが巨大化するとその把握が困難となるため一般には推奨されていません。  
> キーワード：[グローバル変数](https://www.google.co.jp/search?q=グローバル変数), [ローカル変数](https://www.google.co.jp/search?q=ローカル変数), [スコープ](https://www.google.co.jp/search?q=js+スコープ)

### 手順3

一つ目の各回答を配列に格納する `checkAnswer()` 関数を実装します。

配列(ex: `returnAnswer` )を宣言し、その配列にfor文で各回答を格納します。

```js
var returnAnswer = [];
var total = 5; // 問題数
for (var i = 0; i < total; i++) {
  var value = document.shindan.elements['q' + i].value;
  returnAnswer.push(value);
}
```

`.push` は配列に新規の要素を入れる関数です。
最後に `return` 文で結果を返します。

```js
return returnAnswer;
```

とすることで、関数を呼び出した部分に `hoge` が返されます。
これを返り値(戻り値)と呼びます。

```js
function result() {
  var answer = checkAnswer();
}
```

とすることで `answer` に `checkAnswer()` の返り値を代入できます。

### 手順4

次にどのタイプを何個選択したか数える　`countType()`　関数を作ります。

```js
function result() {
  var answer = checkAnswer();
  countType(answer);
}
```

と呼び出すことで、以前に作った配列　`answer`　を　`contType()` に渡します。

for文で配列の中を1つずつ参照して、「もし `'king'` と一致したらオブジェクト `type` の `type.king` を増やす」という処理を書きます。

```js
for (var i = 0; i < answer.length; i++) {
  if (answer[i]が'king'と一致したら) {
    type.king を増やす
  } else if (answer[i]が'officer'と一致したら) {
    ...
  } else if ...
}
```

### 手順5

次に1番多く選んだタイプはどれか判定します。

```js
var max = getMax(answer);
```

最大の数から取りたいのでfor文を5から降ろしていくのがミソです。

```js
for (var i = answer.length; i > 0; i--) {
  var returnMax = getKey(i);
  if (returnMax.length > 0) break;
  // else もしくは else if を伴わない場合、 {} を短縮することができます
}

return returnMax;
```

このとき、通常のキーから値を取得するのではなく、オブジェクトの値からキーを取得したいので以下の関数を使います。

```js
// 一致する値があればキーを配列で返す
function getKey(value) {
  var returnKey = [];
  for (var key in type) {
    if (type.hasOwnProperty(key) && type[key] == value) returnKey.push(key);
  }

  return returnKey;
}
```

### 手順6

この手順では判定結果を得ます。
結果の判定には `getResult()` 関数を用います。

先ほど得た「1番多く選んだタイプ」が2つ以上無いかチェックします。

```js
function getResult(max) {
  if (maxの長さが1なら) {
    var returnResult = max[0];
  } else {
    returnResult = max[0からmax.lengthまでの値をランダムに];
  }

  return returnResult;
}
```

`result()` は現時点で以下のようになっています。

```js
function result() {
  var answer = checkAnswer();
  countType(answer);
  var max = getMax(answer);
  var result = getResult(max);
}
```

### 手順7

最後に結果ページに飛ばすJavaScriptを記述します。

```js
// location.href = 'ジャンプさせたいURL';
location.href = './king.html';
```

という記述で `'./king.html'` にページを遷移させます。

```js
function showResult(result) {
  if (もしresultが'king'なら) {
    location.href = './king.html';
  } else if ...
}
```

`result()` から受け取った変数 `result` をそのまま利用してジャンプさせる方法もあります。
考えてみてください。
 
[前へ 診断ゲームを作ろう](../07/shindan_exercise.md)
 
[次へ 診断ゲームを作ろう(解答例)](../07/shindan_answer.md)
