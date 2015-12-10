# Touch the Numbersを作ろう

## 概要

Touch the Numbersとは、1から25の数字をすべて押し終えるまでのタイムを競うゲームです。

![Touch the Numbers](images/ttn.gif)

## テンプレート

[テンプレートファイル](./touch_the_numbers.zip)をダウンロードしてから始めてください。

## 基本課題

基本課題では、Touch the Numbersの基本的な機能を実装します。

### 方針

1. スタートボタンを作る
1. 数字の入った配列を作る
1. スタートボタンが押されたら数字ボタンを配置
1. 数字ボタンが押された判定

### 1. スタートボタンを作る

まず、スタートボタンを作りましょう。

```html
<input id="start" type="button" onclick="startGame()" value="ゲームスタート">
```

### 2. 配列を作る

1から25の数字を手作業でランダムに配列に代入しておきます。
順番はお好きなように。

```javascript
var numbersArray = [
  20, 17, 4, 6, 22, 8, 10, 15, 1, 18, 24, 13,
  25, 11, 5, 3, 9, 7, 23, 21, 2, 19, 14, 16, 12
];
```

### 3. スタートボタンが押された時、数字ボタンを配置

スタートボタンに`onclick="startGame()"`としているので、`startGame`関数を作って、その中でボタンの配置を行います。for文で25回まわしボタンを作成した後、`numbers`に追加しています。

```javascript
function startGame() {
  for (var i = 1; i <= 25; i++) {
    var button = document.createElement('input');
    button.className = 'button';
    button.type = 'button';
    button.value = numbersArray.pop();
    document.getElementById('numbers').appendChild(button);
  }
}
```

スタートボタンを押すとボタンが生成されますね。

### 4. 数字ボタンが押された時、`hantei`関数を呼ぶように

```javascript
button.onclick = hantei;
```

### 5. 数字が順番におされているか判定

まず、次に押すべき数字が何番かを保存しておく変数を定義します。

```javascript
var nextNumber = 1;
```

この`nextNumber`と押されたボタンの数字が同じであれば、ボタンを消して`nextNumber`を+1すればいいですね。

```javascript
function hantei() {
  if (this.value == nextNumber) {
    nextNumber++;
    this.style.visibility = 'hidden'; // ボタンを非表示
  }
}
```

*`this`は押されたボタン自身を示します。*

### 6. 終了判定

nextNumberが26になった時点で終了ですね

```javascript
if (nextNumber == 26) {
  alert('clear');
}
```

## 発展課題

1. ランダムに並べ替える
1. タイマーを付ける

### 1. ランダムに並べる

以下のようにすることで、`numbersArray`配列の値をランダムにシャッフルできます。どこに書くかは自分で考えてください。

```javascript
numbersArray.sort(function() {
  return Math.random() - 0.5;
});
```

### 2. タイマーを付ける

`setInterval()`を使うことでタイマーを作ることができます。詳しくは自分で調べてみてください。タイマーを止める際は`clearInterval()`を使用します。

  [次へ タッチザナンバーズを作ろう(解答)](./08/touch_the_numbers_answer.md)
