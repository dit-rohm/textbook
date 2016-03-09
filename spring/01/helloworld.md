#  HTMLを書いてみよう

[同志社大学のWebページ](http://www.doshisha.ac.jp/index.html)を表示してみましょう。
ブラウザで右クリックをして [ページのソースを表示] を押してください。
ここで表示されるテキストがHTML（Hypertext Markup Language）と呼ばれるWeb表示に用いられるものです。

### 手順

1. HTMLを書く 
1. 書いたHTMLをブラウザで見る
1. HTMLをCSSで装飾する
1. 書いたHTMLとCSSをブラウザで見る
1. 発展課題
1. 理解度チェック問題

## 1. HTMLを書く

Sublime Text2を開いてCommand+Nを押してください（Windowsの場合はControl+Nです）。
新しいファイルが開いたらCommand+Sを押してファイル名をindex.htmlと書いてデスクトップに保存してください。

次に以下のHTMLを写してください。

#### index.html

```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ここがタイトルです</title>
</head>
<body>
  <h1>ここが内容になります</h1>
  <h2>ここが内容になります</h2>
  <h3>ここが内容になります</h3>
</body>
</html>
```

## 2. 書いたHTMLをブラウザで見る

書いたHTMLをブラウザで見てみましょう。
保存したindex.htmlを開くと書いたHTMLをブラウザで確認できます。

#### index.html

```html
<title>ここがタイトルです</title>
```

titleで指定したものがページのタイトルになります。

#### index.html

```html
<body>
  <h1>ここが内容になります</h1>  
</body>
```

bodyで指定したものがページの中身になります。

## 3. HTMLをCSSで装飾する

さきほどの殺風景なHTMLに装飾を加えるのがCSS（Cascading Style Sheets）です。
CSSで文字の色や背景を変えてみましょう。

Sublime Text2を開いてCommand+Nを押してください（Windowsの場合はControl+Nです）。
ファイルを開いたらstyle.cssと書いてデスクトップに保存しましょう。

次に以下のCSSを書き写してみましょう。

#### style.css

```css
h1 {
  color: red;
  background-color: gray;
}

h2 {
  color: blue;
}

h3 {
  color: green;
}
```

さきほど作成したindex.htmlに以下の1行を追記してstyle.cssを読み込めるようにしましょう。

#### index.html

```html
---（中略）---
  <title>ここがタイトルです</title>
  <link rel="stylesheet" href="style.css">
</head>
---（中略）---
```

## 4. 書いたHTMLとCSSをブラウザで見る

ただしく装飾されて表示されましたか？

![screenshot.png](images/helloworld/screenshot.png)

## 5. 発展課題

HTMLのbodyに以下のコードを書き写してブラウザで確認してみましょう。

#### index.html

```html
---（中略）---
<body>
  <a href="http://www.doshisha.ac.jp/students/index.html">同志社大学</a>
  <p>こんにちはこんにちは！</p>
  <h1>ここが内容になります</h1>
---（中略）---
```

CSSに以下のコードを書き写してブラウザで確認してみましょう。

#### style.css

```css
---（中略）---
h1 {
  color: red;
  background-color: gray;
  font-size: 30px;
  border: 3px solid red;
  padding: 16px;
  border-radius: 20px;
  transition: 1s;
}

h1:hover {
  background-color: white;
}
---（中略）---
```

一行ずつ書き写しながらブラウザで動作を確認しましょう。
調べるときは「html タグ」や「css プロパティ」で検索してください。

## 6. 理解度チェック問題

以下の画像のページを作成してください。

![quiz.png](images/helloworld/quiz.png)

[次へ プロフィールを作ろう](../01/profile.md)
