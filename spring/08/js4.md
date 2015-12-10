# 本日の文法事項

## 基本課題で使う関数

### document.createElement()

JavaScript中で要素（タグ）を作成します。

使用例

```javascript
var button = document.createElement('input');
button.className = 'abc';
button.type = 'button';
button.value = '123';
button.onclick = hoge;
```

以下の様なタグが生成されます。

```html
<input class="abc" type="button" value="123" onclick="hoge()">
```

*※注意: `onclick`へは関数の名前を代入します。`()`はつけません*


### element.appendChild()

`createElement`で作成した要素を親要素に追加（append）します。

使用例

```javascript
var div = document.createElement('div');
div.innerHTML = 'abc';
document.getElementById('hoge').appendChild(div);
```

これを実行すると、以下のようになります。

```html
<div id="hoge">
  <div>abc</div> <!-- この1行が追加される -->
</div>
```

### array.pop()

配列の末尾から要素を取り除きます。

```javascript
var fruits = ['apple', 'orange', 'banana'];

alert(fruits.pop()); // banana
alert(fruits);       // ['apple', 'orange']
alert(fruits.pop()); // orange
```

  [次へ タッチザナンバーズを作ろう](./08/touch_the_numbers.md)
