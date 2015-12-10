# jQuery
今日は、jQueryというJavaScriptのライブラリーを扱います。ライブラリとは、よく使う機能をまとめてあるものです。

## jQueryとは
jQueryとは、JavaScriptを使ってよく実現されるような機能をまとめたライブラリーです。jQueryの機能にはCSSのプロパティーの変更やDOM操作、イベント処理、AJAX処理を簡単にしてくれるものがあります。今日はその基本的な使い方を押さえたいとおもいます。

## 使うには
jQueryを使うには、jQueryのファイルを読み込ませなければなりません。ここではウェブ上に置かれているものを読み込むことにします。以下のように書くと読み込むことができます。
```html
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
```

なお、これは執筆時点での最新版を読み込むものです。[jQuery CDN](https://code.jquery.com "jQuery CDN")で最新版を確認してください。minifiedのリンクで右クリックをし、リンクをコピーすると上記のURLが得られます。

## セレクター
WebページをjQueryでいじるには、生のJavaScriptの時と同じように、プログラム内でWebページの要素を扱えるようにしなければなりません。生のJavaScriptではdocument.getElementById('Foo')を使いましたが、ここではjQueryのセレクターを使います。例えば以下のような例があります。  

```JavaScript  
//idがfooの全ての要素  
$("#foo")

//classがfooの全ての要素 
$(".foo")

//全てのdiv 
$("div")
```  

このように選択したいもののCSSセレクターを$("")の中に入れることでjQueryのオブジェクトとして取ってくることができます。セレクターで取ってきたオブジェクトは変数に入れることができます。  

```JavaScript
var $foo = $("#foo");
```  

なお、document.getElementById()で取得してきたものと、jQueryのセレクターで取得してきたものは同じHTMLの要素を指していても別物です。生のJavaScriptの機能を使う時はdocument.getElementById()で、jQueryの機能を使う時はセレクターで、と使い分けるようにしましょう。ここでは区別をするために、jQueryのオブジェクトには変数名の頭に"$"を付して区別することにします。  


## メソッド
セレクターで取得したjQueryのオブジェクトにはいろいろな機能があります。それをメソッドと呼びます。例えば以下のような例があります。[テンプレート](./jquery_template.zip "jquery_template.zip")を用意したので、script.jsに一つずつ写して試してみてください。(別の例を試す時は、前に試したものを全て消して、新しいものをそこに書いてください。)  

#### Ex.1
```JavaScript
/* 
 * idがfooのdivのcssを変更して、10pxのmarginを加えます。
 */

$("div#foo").css({
  margin: "10px"
});
```

#### Ex.2
```JavaScript
/* 
 * idがfooのdivの位置を、今より10pxずつ左と下に移動し、
 * その変化をアニメーションにします。 
 */

// セレクターを二回以上呼び出すので変数に格納してしまいます。
var $divFoo = $("div#foo"); 

$divFoo.animate({

  //.offset()は、親要素からみた座標を返すものです。オブジェクトとして返ってきます。
  top: $divFoo.offset().top + 10,
  left: $divFoo.offset().left + 10
});
```

#### Ex.3
```JavaScript
/*
 * 100px分だけ下に自動でスクロールします。こちらもアニメーションです。ただし、
 * スクロール先が100px分だけスクロールした位置になります。現在の位置から
 * 数えて下に100pxスクロールするのではありません。
 */

$("body, html").animate({
  scrollTop: 100
});
```

#### Ex.4
```JavaScript
/*
 * では、現在のスクロール量からさらにある量をスクロールさせるにはどうすればいいかと
 * 言いますと、現在のスクロール量を取ってきてそれに増分を足せばよいのです。ここでは
 * 10pxずつスクロールさせます。
 */

$("body, html").animate({

  /*
   * .scrollTop()で上からのスクロール量を取ってきます。
   * 左からのスクロール量が欲しい場合は.scrollLeft()とします。
   */

  scrollTop: $(this).scrollTop() + 10
});

```  

## イベント
生のJavaScriptでは`addEventListener('イベント', function(){/* 動作内容 */}`としていたところを、jQueryを使うと少し楽に書くことができます。下の例を参考にしてください。前に使ったテンプレートに写すと試すこともできます。

#### Ex.5
```JavaScript
/*
 * idがfooのdivをクリックすると、idがfooのdivが上から500pxの位置まで移動します。
 */

//生のJavaScriptでいうwindow.onload()です。スクリプトの一番上に書きます。
$(function() {
  someFunc();
});

/*
 * イベントを追加する関数です。上に書いたものによって呼び出すべき時が来たら
 * 呼び出されます。
 */
function someFunc() {
  $("div#foo").click(function() {
    $("div#foo").animate({
      top: 500
    });
  });
}
```

#### Ex.6
```JavaScript
/*
 * idがfooのdivにマウスをのせると、idがfooのdivの背景が青くなる。
 */

$(function() {
  anotherFunc();
});

function anotherFunc() {
  $("div#foo").hover(function() {

    //イベントを受け取ったdivを指して$(this)とすることもできます。
    $(this).css({
      backgroundColor: "blue"
    });
  });
}
```
他にもイベントがたくさんあるので、後述のドキュメンテーションを参照してください。

上記はjQueryを使ってできることのごく一部です。jQueryにはまだまだたくさんの機能があります。思い通りの動作をさせる機能を探してみてください。

## ドキュメンテーション
jQueryの機能は多く、ここで紹介しきることはできません。従ってドキュメンテーションへのリンクを紹介しておきます。  
[jQuery API Documentation(公式、英語)](http://api.jquery.com "jQuery API Documentation")  
[jQuery 日本語レファレンス(非公式、日本語)](http://semooh.jp/jquery/ "jQuery 日本語レファレンス")
  [次へ DITのようなサイトに動きを](./09/improvements.md)
  [次へ DITのようなサイトに動きを](../09/improvements.md)
