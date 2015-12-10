# おみくじ

解答のダウンロードは[こちら](solution.zip "solution.zip")．

## HTML
```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>おみくじ</title>
  <link rel="stylesheet" href="omikuji.css">
</head>
<body>
<div id="wrapper">
  <img id="omikuji" src="img/omikuji.png" alt="おみくじ">
  <p>イラスト：<a href="http://www.irasutoya.com/" target="_blank">いらすとや</a></p>
</div>
<script src="omikuji.js"></script>
</body>
</html>

```

## JavaScirpt
###詳細版
```javascript
var img = null;

function randInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function omikuji() {
  var random = randInt(1, 6);
  img.setAttribute('src', 'img/omikuji_' + random + '.png');
}

window.onload = function() {
  img = document.getElementById('omikuji');
  img.addEventListener('click', omikuji);
};
```

###短縮版
```javascript
window.onload = function() {
  document.getElementById('omikuji').addEventListener('click', function() {
    this.setAttribute('src', 'img/omikuji_' + Math.floor(6 * Math.random() + 1) + '.png');
  });
};
```
  [次へ JavaScript入門２](./06/js2.md)
