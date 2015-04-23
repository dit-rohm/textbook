## 何はともあれ\<head\>

\<head\>に必要なもの

- title
- ウェブページの構成情報
 - 文字コード
 - サイトの説明
 - 著作者
- 読み込むスタイルシート

```html
<head>
  <title>About me</title>
  <meta http-equiv="content-type" content="text/html" charset="utf-8">
  <meta name="description" content="About me">
  <meta name="author" content="Author">
  <link rel=stylesheet type="text/css" href="style.css">
</head>
```

## \<body\>を書いていく

### \<div\>タグで骨組みを作り、その中にコンテンツを書く

現在主流となっているのは\<div\>タグを使い、ボックスを組み合わせて配置する方法です。

```html
<body>
  <div>
    <h1>Name</h1>
  </div>
  <div>
    <h2>Hello!</h2>
    <h3>I'm hogehoge!</h3>
    <p>Nice to meet you!</p>
  </div>
</body>
```

### クラス付け

先ほどのコードのまま\<div\>タグに装飾を加えると、全ての\<div\>が同じように装飾されてしまします。

そこで、\<div\>に名前を付けてひとつひとつを区別出来るようにします。

```html
<body>
  <div class="name">
    <h1>Name</h1>
  </div>
  <div class="contents">
    <h2>Hello!</h2>
    <h3>I'm hogehoge!</h3>
    <p>Nice to meet you!</p>
  </div>
</body>
```

CSSからクラスを指定する場合は

```css
.name {

}

.contents {

}
```

というふうに書きます。

では、[サンプルウェブページ](/sample/sampleProfilePage.zip)をダウンロードして、いろいろいじってみましょう！
