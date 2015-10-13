# はじめてのPHP

## 0. 準備

Windowsの場合は`C:¥xampp¥htdocs`、Macの場合は`/Applications/XAMPP/xamppfiles/htdocs/`
にいき、`helloworld`というフォルダを作りましょう。


## 1. はじめてのPHP

PHPファイルには`.php`という拡張子を付けます。今回は`index.php`というファイルを`helloworld`フォルダに作成しましょう。

### Hello World

PHPでは`<?php`と`?>`の間にプログラムを記述します。今回は`print`という文字列を表示する関数を使ってPHPを動かしてみます。以下のプログラムを書いてください。

```php
<?php
  print "Hello World!";
?>
```

XAMPPを起動して[http://localhost/helloworld/index.php](http://localhost/helloworld/index.php)にアクセスしてみましょう。Hello World!と画面に表示されると思います。これがPHPの基本的な書き方です。

ただし、PHPコードのみのファイルでは終了タグ`?>`は*省略してください*。終了タグがあると、ファイルの最後に空白があった場合に出力されてしまうという問題があるので、それを防ぐために省略します。

## 2. HTMLと組み合わせる

PHPのコードはHTMLの中に埋め込むことができます。書いてみましょう。

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
    print "aのほうが大きい";
  } elseif ($a == $b) {
    print "aとbが同じ";
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

## 5. for文で繰り返し

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

## 6. データの受け渡し（POST）

フォームの情報をサーバーに送信したり、次のページへ情報を受け渡す方法として、「GET」と「POST」があります。ここでは、「POST」メソッドにける値の受け渡しを解説します。

### データの送信

まずは送信フォームを作成します。`index.php`に書いてみましょう。

```html
<form action="./dest.php" method="POST">
  <p>名前</p>
  <input type="text" name="username">
  <p>コメント</p>
  <textarea name="comment"></textarea>
  <input type="submit" value="送信">
</form>
```

ここでのキーポイントは、`form`タグの`action`、`method`属性、それから`input`や`textarea`の`name`属性です。

- `form`タグの`method`属性には、GETもしくはPOSTを指定します。今回はPOSTを指定します。

- `form`タグの`action`属性は、データを送信する送信先を指定します。今回の場合、同じディレクトリにある`dest.php`を指定していますね。これは後で作成します。

- `input`や`textarea`の`name`属性は、送信されるデータに名前をつけます。今回の場合、`input`タグには`username`という名前をつけていて、プログラム側で`username`という名前で参照することができます。

まとめると、「`POST`メソッドを使って、`dest.php`にデータを渡す。渡すデータは`username`と`comment`です。」という感じ。

### データの受信

先ほど送信先を`dest.php`にしたのでこれを作成しましょう。

先ほど作成したフォームから送信ボタンを押すとこの`dest.php`にデータが送信されます。`dest.php`ではデータを受け取る処理をPHPで書くことで送信された情報を扱えます。受け取るには`$_POST[nameで指定した名前]`のように行います。例を示します。

```php
<?php
  $username = $_POST['username'];
  print $username;
```

フォームから送信された`username`を受け取り、変数に代入した後、それを表示するプログラムです。動作確認してみてください。

このようにしてデータを受け取り、データベースにデータを入れたり、メールを送信したりなど、PHPで処理を書いていきます。
