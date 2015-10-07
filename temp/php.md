# はじめてのPHP


## 0. XAMPP

どこにあって、どこにフォルダ作ってみましょう。`helloworld`というフォルダを作りましょう。
...

## 1. はじめてのPHP

phpファイルを作るには`.php`という拡張子を付けます。今回は`index.php`というファイルを`helloworld`フォルダの中に作成しましょう。PHPでは`<?php`と`?>`の間にプログラムを記述します。今回は`print`という文字列を表示する関数を使って試してみます。

```php
<?php
  print "Hello World!";
?>
```

XAMPPを起動して`http://localhost/helloworld/index.php`にアクセスしてみましょう。Hello World!と画面に表示されると思います。これがPHPの基本的な書き方です。

ただし、PHPコードのみのファイルでは終了タグ`?>`は*省略してください*。終了タグがないことにより、
ファイルの最後にある空白文字が出力に影響することを防ぎます。

## 2. HTMLと組み合わせる

PHPはHTMLの中に埋め込むことができます。書いてみましょう。

```html
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>hello</title>
</head>
<body>
  <h1><?php print "Hello World"; ?></h1>
  <p>hogehoge</p>
</body>
</html>
```

Hello Worldが大きい文字で表示されましたね。このようにPHPはHTML文中に埋め込むことができます（ただし拡張子は`.php`のものに限る）。

## 3. 変数を使ってみよう

PHPの変数は`$`をつけて宣言します。`index.php`の中身を消して以下のプログラムを書いてみましょう。

```php
<?php
  $foo = "Hello World";  
  print $foo . "!!";
```

`.`は文字列の結合演算子です。"Hello World!!"と表示されますね。

```php
<?php
  $a = 10;
  $b = 21;
  print $a + $b;
```

数値も同様に宣言します。四則演算もできます。

## 4. if文で条件分岐する

PHPにおけるif文の書き方は2通りあります。動作確認したい人は一緒に書いてみてください（動作確認をする場合は`$a`と`$b`を宣言してください）。

### 波括弧を使ったif文

```php
<?php
  if ($a > $b) {
    print "$aのほうが大きい";
  } elseif ($a == $b) {
    print "$aと$bが同じ";  
  } else {
    print "それ以外";
  }
```

ここで注意されたいのが、`else if`ではなく`elseif`であることです。`else if`も一部条件下では使えますが、使えない場面もあるので`elseif`で覚えましょう。

### コロンを使ったif文

```php
<?php if ($a > $b): ?>
  <p>$aのほうが大きい</p>
<?php elseif ($a == $b): ?>
  <p>$aと$bが同じ</p>
<?php else: ?>
  <p>それ以外</p>
<?php endif; ?>
```

HTML文中にif文を挿入したい場合はコロンを使ったif文のほうがすっきり書けると思います。

## 5. for文

if文同様、2つの書き方があります。

### 波括弧を使ったfor文

```php
<?php
  for ($i = 0; $i < 10; $i++) {
    echo $i;
  }
```

### コロンを使ったfor文

```php
<?php for ($i = 1; $i < 10; $i++): ?>
  <p>こんにちは</p>
<?php endfor; ?>
```

if文同様に、HTMLの中でfor文を回したい場合はコロンをつかって書くと良いです。



あと
POSTの説明
