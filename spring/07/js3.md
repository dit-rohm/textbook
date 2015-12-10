# 本日の文法事項

[こちらのテンプレート](https://github.com/Tamrin007/textbook/blob/shindan-game/7/js_template.zip?raw=true)を利用して以下の文法事項を確認してください。

## フォーム作成

### 回答の選択肢

今回の診断ゲームでは「ラジオボタン」を使用します。ラジオボタンとは「複数の選択肢から一つだけを選ぶボタン」のことです。ラジオボタンは以下のタグで設定できます。  

```html
// 選択肢が1つだけ
<p>Q. hoge?</p>
<input type="radio" name="question" value="hoge" checked>hoge
```

```html
// 選択肢が複数
<p>Q. hoge?</p>
<input type="radio" name="questions" value="hoge" checked>hoge
<input type="radio" name="questions" value="fuga">fugo
<input type="radio" name="questions" value="piyo">piyo
<input type="radio" name="questions" value="hage">hage
```

各属性の値は以下の通りに設定します。

| 属性 | 値 | 説明 |
|:---:|:---:|---|
| type | radio | ラジオボタンの場合は "radio"です。 他にも"text"や"checkbox"などがあります。 |
| name | 文字列 | 複数のボタンを一つのグループにします。 グループの中から一つのみ選択できます。 |
| value | 文字列 | 送信する文字列 |
| checked | なし | 予め選択された状態にしておく |

### フォームの作成

`<input>`タグは`<form>`の中に配置します。設問が集まってフォームを形成するというイメージです。

```html
// 以下 index.html に記入
<form name="foobar">
  <p>hoge?</p>
  <input type="radio" name="questions" value="hoge" checked>hoge
  <input type="radio" name="questions" value="fuga">fugo
  <input type="radio" name="questions" value="piyo">piyo
  <input type="radio" name="questions" value="hage">hage
</form>
```
### フォームの送信と結果を受け取るJavaScript

送信にはボタンを使い、`onclick`属性でJavaScriptの関数を呼び出します。

```html
// 先ほどのコードにボタンを書き足し
<form name="foobar">
  <p>hoge?</p>
  <input type="radio" name="questions" value="hoge" checked>hoge
  <input type="radio" name="questions" value="fuga">fugo
  <input type="radio" name="questions" value="piyo">piyo
  <input type="radio" name="questions" value="hage">hage
  <input type="button" value="診断する" onclick="result()">
</form>
```

```js
// script.js に記入
function result () {
  alert(document.foobar.questions.value);
}
```

ちなみに`document.shindan.elements['question'].value`としても同じ結果が得られます。

**IEでは表示出来ないようです。IE以外のブラウザをご利用ください。**

[Google Chrome](https://www.google.co.jp/chrome/browser/desktop/), [Firefox](https://www.mozilla.org/ja/firefox/new/), [Opera](http://www.opera.com/ja)

ここまで進んだら、いったん`index.html`と`script.js`の更新内容を破棄してください。

## オブジェクト

まず前回の講義で学んだ配列を思い出してみましょう。例として生徒のテストの点数を保持する配列を作っていましたね。

```js
var test = [60, 80, 100];
```

しかし、このままでは何番目が誰かということをこちらで把握しなければならず、不便かと思います。JavaScriptではオブジェクトという概念を用いて、以下のように人間が把握しやすいカタチで記述することが可能です。

```js
var test = {
  Chii: 0,
  Hayapii: 80,
  Tamrin: 100,
  Su: 1200
}
```

`キー: 値`という並びで記述できます。この「キー」と「値」の組を「プロパティ」と言います。上記のオブジェクトの値はキーを用いて以下のように参照することができます。

```js
alert(test['Chii']);
alert(test.Chii);
```

上の2行は同じ意味を持ちます。

また、代入も同様に可能です。

```js
var obj = {};
obj['fiz'] = buzz;
// or
obj.fiz = 'buzz';
```

オブジェクトを多階層化することもできます。

```js
var seito = {
  name: 'Joseph Hardy Neesima',
  id: 18430212,
  seiseki: {
    english: 5,
    kokugo: 5,
    sansu: 4,
    rika: 4,
    shakai: 4
  }
}

alert(seito['name']);
alert(seito['seiseki']['rika']);
```

### `for...in`文

オブジェクトのプロパティを走査するための文法として`for...in`文があります

```js
var test = {
  Chii: 0,
  Hayapii: 80,
  Tamrin: 100,
  Su: 1200
}

for (var i in test) {
  alert(i + ': ' + test[i]);
}
```

オブジェクトは重要な概念ですので、いろいろ試して遊んでみてください。

> #### コラム1. オブジェクトについて
> なぜオブジェクトが重要かと言うと、JavaScriptだけでなく他のオブジェクト指向プログラミング言語にも共通する概念だからです。オブジェクト指向とは、プログラムを”様々な特性と機能を持った「モノ」”として捉えることを言います。Java、JavaScript、C#、C++、Python、PHP、Perl、Ruby、Objective-C、Swiftといった言語がオブジェクト指向をサポートしています。JavaScriptでオブジェクトを学ぶ場合、次のサイトがあなたを大いに助けてくれるでしょう。  
> [Working with Objects - JavaScript | MDN](https://developer.mozilla.org/ja/docs/Web/JavaScript/Guide/Working_with_Objects)

---

> #### コラム2. JSON (JavaScript Object Notation)
> JavaScriptにおけるオブジェクトの記述法をベースとしたデータ記述言語にJSONというものがあります。"JavaScript"と名前に入っていますが様々な言語で利用可能で、言語を超えたデータの受け渡しに利用されます。データ記述言語には他にもXMLやYAMLといったものがあります。
  [次へ 診断ゲームを作ろう](./07/shindan_exercise.md)
  [次へ 診断ゲームを作ろう](../07/shindan_exercise.md)
