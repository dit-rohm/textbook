# CSSリファレンス
## CSSとは

CSS（Cascading Style Sheets）は、HTMLで書かれた文章を装飾（色、大きさ、位置）するための言語です。

## 文法

```
セレクター {
  プロパティ名: 値;
}
```

## セレクター（Selector）

どのタグにスタイルを適応するかを選択・指定（select）するものです。基本的なものだけピックアップします。

### タグ名

指定したタグ名にスタイルを適応します。

```css
p { ... }
```

### id名

指定したid名にスタイルを適応します。

```css
#main { ... }
```

### class名

指定したclass名にスタイルを適応します。

```css
.red { ... }
```

### 子要素

ある要素の下にある要素にスタイルを適応します。

```css
#main p {
  color: red;
}
```
```html
<div id="main">
  <p>ここの文字が赤色に</p>
</div>
<p>ここには適応されない</p>
```

### :hover

ある要素にホバー（マウスを乗せる）した際に適応します。

```css
a {
  color: blue;
}

a:hover {
  /* aタグにホバーした際に色を赤に */
  color: red;
}
```

## プロパティ

### width

ある要素の横幅を指定します。

```css
width: 100px;
```

### height

ある要素の縦幅を指定します。

```css
height: 100px;
```

### margin

ある要素の外側の余白を指定します。複数の書き方があります。
paddingとの違いは、<a href="http://klutche.org/archives/443/" target="_blank">marginとpaddingの違い</a>を参照してください。

```css
margin: 10px; /* 上下左右に10pxの余白を取る */

margin-top: 10px;    /* 上に10pxの余白を取る */
margin-right: 10px;  /* 右に10pxの余白を取る */
margin-bottom: 10px; /* 下に10pxの余白を取る */
margin-left: 10px;   /* 左に10pxの余白を取る */

/* 上に10px、右に20px、下に30px、左に40pxの余白を取る */
margin: 10px 20px 30px 40px; 
```

### padding

ある要素の内側の余白を指定します。marginと同様に複数の書き方があります。
marginとの違いは、<a href="http://klutche.org/archives/443/" target="_blank">marginとpaddingの違い</a>を参照してください。

```css
padding: 10px; /* 上下左右に10pxの余白 */

padding-top: 10px;
padding-right: 10px;
padding-bottom: 10px;
padding-left: 10px;

/* 上に10px、右に20px、下に30px、左に40pxの余白を取る */
padding: 10px 20px 30px 40px; 
```

### color

文字色を指定します。色の指定には色の名前（black, red, purple）のほか、[カラーコード](http://www.netyasun.com/home/color.html)（#000, #ff0000, #800080）が使えます。

```css
color: green;
color: #008000; /* カラーコードを用いた緑色の指定 */
```

### border

ある要素の周りに線（border）を引きます。

```css
/* 線の太さ、種類、色を指定します */
border: 1px solid #000;
```


### background

背景色を指定します。

```css
background: black; /* 背景色を黒にする */
background: #ff0000; /* 背景色を赤にする */
```

### font-size

文字の大きさを指定します。

```css
font-size: 15px;
```


ここでは、よく使うプロパティを列挙しましたが、これ以外のプロパティについて知りたい場合、プロパティ名で検索しましょう。

## CSSを書く場所

CSSを記述する方法は2つあります。

1. htmlファイルの中に`<style>`タグを用いて書く
2. style.cssとしてファイルを保存し、`<link>`タグを用いて読み込む

*一般的に2.の方法がよく使われるので、まずはそちらだけ覚えておけばよいでしょう。*

### 1. `<style>`を用いる場合

```html
<html>
  <head>
    <style>
      #main {
        background: black;
      }
      h1 {
        color: red;
      }
    </style>
  </head>
</html>
```

### 2. `<link>`を用いる場合

```html
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
  </head>
</html>
```

`css/style.css`は、cssフォルダの中にあるstyle.cssを指定しています。


## カラーコード

色の指定には色の名前（black, red, purple）のほか、[カラーコード](http://www.netyasun.com/home/color.html)（#000, #ff0000, #800080など）が使えます。

前者はひと目で何色かわかりますが、細かい色の指定ができません。そこで、多くのwebサイトでは後者のカラーコードを用いて色の指定をしています。このカラーコードの意味を少しだけ解説します。

カラーコードは以下のように記述します。

```css
#000000 /* 黒 */
#f39800 /* オレンジ*/
#f6adc6 /* 撫子色(ピンク) */
```

シャープ（#）に続けて、6桁の[16進数](http://www.sophia-it.com/content/)で表記されます。6桁の数字は、2つずつ区切りった際に、前からRed、Green、Blueの色の濃さを表しています。すなわち、上記のオレンジを例にすると、f3が赤色の濃さ、98が緑色の濃さ、00が青色の濃さを示しています。16進数の細かい説明は省きますが、ffが最大、00が最小です。このRGB(Red, Green, Blue)の組み合わせで細かな色を表現します。

最初は難しいと思うので、[色見本](http://www.color-sample.com/)を活用しましょう。


