# サインイン機能のセキュリティ対策

本稿では、以前に作成したサインイン機能を改善し、よりセキュリティを高める方法について学びます。

## 要求仕様

- POSTリクエストを受けた際、トークンのチェックを行っている
- サインインを行う際に発生するエラーをチェックし、エラーが起こった際はユーザに通知する

## 実装手順

主な流れとしては、
1. トークンのチェック（PHP）
2. エラーチェック（PHP, MySQL）

となっています。この時点では分からない用語がたくさんあるかと思いますが、それぞれの節で説明します。

## 1. トークンのチェック

### トークンとは？

「トークン」を辞書で調べると、

> token 名詞 複 ～s ｟かたく｠(気持ち真実などを示す)しるし, あかし, 象徴; (権威身元などを示す)証拠; 証拠品

と出てきます。（ウィズダム英和辞典より）

ここのプログラムにおける「あかし」「証拠」とは何かと言うと、 **「所定のフォームから送信された証拠」** です。

GETメソッド、POSTメソッドを利用したHTTPリクエストは、別のサイト・PC等からこのDitterに送信することが可能です。

予期せぬリクエストを受け付けないよう、 **「このリクエストは所定のフォームを通して送信されたものだ」** という証拠、またそれを確認する処理が必要となります。

「CSRF（クロスサイトリクエストフォージェリ）攻撃」と検索すると、この問題について詳しく知ることができます。

### トークンのセットとチェックを行うコード

- signin.php

先に書いたHTMLの上部に追記してください。

```php
<?php
require_once('config.php');
require_once('functions.php');

session_start();

// 以下追記

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  setToken();
} else {
  checkToken();
}

?>
// 以上追記

...
...
<!DOCTYPE html>
...
...
```

- functions.php

`signin.php`に追加したトークンのセット、チェックを行う関数を記述します。

```php
<?
...
...
// 以下を記述
function setToken() {
  $token = sha1(uniqid(mt_rand(), true));
  $_SESSION['token'] = $token;
}

function checkToken() {
  if (empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])) {
    print "不正なPOSTが行われました！";
    header('HTTP', true, 400);
  }
}
```

- signin.php

また、セットしたトークンをメールアドレス、パスワードと共にサーバに送信する必要がありますので、フォームに以下のように修正します。

```html
...
...
<form action="signin.php" method="POST">
  <div class="form-group">
    <label for="inputEmail">メールアドレス</label>
    <input type="email" class="form-control" id="inputEmail" name="email" value="">
  </div>
  <div class="form-group">
    <label for="inputPassword">パスワード</label>
    <input type="password" class="form-control" id="inputPassword" name="password">
  </div>
  <!-- 追記部分始め -->
  <input type="hidden" name="token" value="<?php print escape($_SESSION['token']); ?>">
  <!-- 追記部分終わり -->
  <button type="submit" class="btn btn-default">サインイン</button>
</form>
...
...
```

### コードの解説

いま記述したコードを解説していきます。

#### 外部ファイルの読み込み

`require_once`で読み込んでいるファイルは「新規登録機能の作成」で書いた`signup.php`と同じです。

#### HTTPリクエストメソッド（GET, POST）の判定

```php
<?
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  // サーバに届いたリクエストがPOSTメソッドじゃない場合の処理
  setToken();
} else {
  // サーバに届いたリクエストがPOSTメソッドだった場合の処理
  checkToken();
}
```

`$_SERVER[]`という連想配列の`'REQUEST_METHOD'`というキーにはサーバへのリクエストメソッドが自動で格納されます。
これをチェックし、サーバへのリクエストがPOSTじゃない場合、つまり **サインインフォームから送信される前** にトークンをセットします。

サーバへのリクエストがPOSTだった場合というのは、 **サインインフォームから送信された後** なので、セットされたトークンをチェックします。

#### トークンのセット

```php
<?
function setToken() {
  $token = sha1(uniqid(mt_rand(), true));
  $_SESSION['token'] = $token;
}
```

`sha1()`はハッシュと呼ばれる文字列を生成するための関数です。このハッシュはトークンに用いるので、特定できない（しづらい）値である必要があります。ここでは引数に乱数を用いることで、ハッシュの特定を困難にしています。

生成されたハッシュは`$_SESSION['token']`にトークンとして代入されるほか、フォームの

```html
<input type="hidden" name="token" value="<?php print escape($_SESSION['token']); ?>">
```

にて送信されます。`type="hidden"`となっているのでユーザには見えません。

この`$_SESSION['token']`とフォームから送信されるトークンを後でチェックすることで、 **「このリクエストは所定のフォームを通して送信されたものだ」** という証拠になります。

（なお、この`$_SESSION['token']`という連想配列は「4. セッションIDの発行」で説明します。）

#### トークンのチェック

```php
<?
function checkToken() {
  if (empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])) {
    echo "不正なPOSTが行われました！";
    exit;
  }
}
```

POSTリクエストが送られてきたときに動作するトークンのチェックですが、

1. `$_SESSION['token']`が空か
2. `setToken()`で代入した`$_SESSION['token']`のトークンと、フォームから送られてきた`$_POST['token']`が異なるか

の2項目を確認します。どちらか一方の条件でも真になれば、不正なPOSTとみなします。

#### トークンチェックまでの流れ

長くなってしまったので、サインインページを表示してからトークンのチェックが行われるまでの流れをまとめます。

コード、解説と照らし合わせながら追ってください。

1. ユーザが`signin.php`にアクセスする
2. POSTリクエストではないので`setToken()`が呼ばれる
3. ユーザがメールアドレス、パスワードを記入する
4. ユーザが「サインイン」ボタンを押すと、メールアドレス・パスワードとともに`setToken()`で生成されたトークンが送信される
5. POSTリクエストを受け取るので、`checkToken()`でトークンをチェック
6. `$_SESSION['token']`と`$_POST['token']`をチェック
  - 一致しなければエラーメッセージを表示
  - 一致したら何もせず次の処理（エラーチェック）へ

## 2. エラーチェック

トークンの確認を終えたら、次は入力内容の確認です。今回チェックする項目は以下の通り3つあります。

1. メールアドレスは空でないか
2. パスワードは空でないか
3. メールアドレスとパスワードの組み合わせは正しいか

### エラーチェックのコード

- signin.php （PHPの部分）

既に上部に書いている`<?php  ?>`の間に書き足していく形です。

```php
...
...
// この変数宣言をHTTPリクエストの判定の前に付け足してください
$error = [];
$email = '';
$password = '';

/*
このHTTPリクエストの判定はすでに記述済みです
else の中、checkToken();の下を書き足していってください。
*/
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  setToken();
} else {
  checkToken();
  $email = $_POST['email'];
  $password = $_POST['password'];
  $db = connectDb();

  if ($email === '') {
    $error['email'] = 'メールアドレスを入力してください';
  }
  if ($password === '') {
    $error['password'] = 'パスワードを入力してください';
  } else if (!$user_id = getUserId($email, $password, $db)) {
    $error['password'] = 'パスワードとメールアドレスが正しくありません';
  } else if (empty($error)) {

  }
}
...
...
```

- signin.php （HTMLの部分）

`<form>...</form>`にエラーメッセージの表示領域を追加します。

```html
...
...
<form action="" method="POST">
  <div class="form-group">
    <label for="InputEmail">メールアドレス</label>
    <!-- この<input>を書き換え -->
    <input type="email" class="form-control" id="inputEmail" name="email" value="<?php print escape($email); ?>">
    <!-- エラーメッセージを表示する段落<p>を追記 -->
    <p><?php if (array_key_exists('email', $error)) { print escape($error['email']); }?></p>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">パスワード</label>
    <input type="password" class="form-control" id="inputPassword" name="password">
    <!-- エラーメッセージを表示する段落<p>を追記 -->
    <p><?php if (array_key_exists('password', $error)) { print escape($error['password']); }?></p>
  </div>
  <input type="hidden" name="token" value="<?php print escape($_SESSION['token']); ?>">
  <button type="submit" class="btn btn-default">ログイン</button>
</form>
...
...
```

- functions.php

これまでに書いた関数の下に書き足してください。

```php
...
...
function getUserId($email, $password, $db) {
  $sql = "SELECT id, password FROM users WHERE email = :email";
  $statement = $db->prepare($sql);
  $statement->bindValue(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $row = $statement->fetch();
  if (password_verify($password, $row['password'])) {
    return $row['id'];
  } else {
    return false;
  }
}

function escape($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
```

### コードの解説

まずコードの流れを追っていきます。

1. `checkToken()`で正当なトークンだと確認される
2. フォームから送信した`$_POST`に代入されている変数を、それぞれ新たに変数に代入する
3. データベースに接続
4. `$email`が空だったら、エラーメッセージを代入
5. 同様に`$password`が空だったらエラーメッセージを代入
6. ユーザのIDの取得に失敗したら（getUserIdの返り値がfalseだったら）エラーメッセージを代入
  - このエラーメッセージはHTML部分で出力される

7. エラーメッセージを代入している変数`$error`が空だったらセッションIDの発行処理へ

#### メールアドレス、パスワードが空かどうかのチェック

JavaやC言語に慣れ親しんでいる方には、以下のコードは違和感を覚えるかもしれません。

```php
if ($email === '') {
  $error['email'] = 'メールアドレスを入力してください';
}
```

PHPには`==`と`===`いう比較演算子があります。両者の違いは **「型の相互変換をして，値を比較」** か **「値と型の比較」** です。

例えば以下のような変数があるとします。

```php
$kazu = 1;
$suuji = '1';
```

これを上記の二通りの比較演算子で比較します。

```php
if ($kazu == $suuji) {
  echo "上記のif文の式は true です";
}

if ($kazu === $suuji) {
  echo "上記のif文の式は false で、この文は表示されません"
}
```

一つ目のif文の式は型を比較していないので true です。

しかし、二つ目のif文の式は型を比較していて、`$kazu`は数値、`$suuji`は文字列なので false となります。

ちなみに、JavaScriptでも同じ比較演算子が使えますので、覚えておいてください。

#### getUserId 関数

メールアドレスとパスワードからユーザのIDを取得するための関数です。

```php
function getUserId($email, $password, $db) {
  $sql = "SELECT id, password FROM users WHERE email = :email";
  $statement = $db->prepare($sql);
  $statement->bindValue(':email', $email, PDO::PARAM_STR);
  $statement->execute();
  $row = $statement->fetch();
  if (password_verify($password, $row['password'])) {
    return $row['id'];
  } else {
    return false;
  }
}
```

引数は「フォームから送信されたメールアドレス」「フォームから送信されたパスワード」「データベースのオブジェクト（PDO）」です。

データベースを操作しているのは以下の記述です。

```php
$sql = "SELECT id, password FROM users WHERE email = :email";
$statement = $db->prepare($sql);
$statement->bindValue(':email', $email, PDO::PARAM_STR);
$statement->execute();
$row = $statement->fetch();
```

SQL文（`$sql`）は **「フォームから送信されたメールアドレスと一致するemailをusersテーブルで検索し、一致した行のidとpasswordを取得」** といった指示です。

結果（データベースから得たパスワードとID）は`$row[]`という連想配列に代入されます。

上記のSQL文で得たパスワードと、フォームから送信されたパスワードとが一致するかは以下のコードで確認しています。

```php
if (password_verify($password, $row['password'])) {
    return $row['id'];
} else {
  return false;
}
```

`passqord_verify(フォームから送信されたパスワード, データベースから取得したパスワード)`でパスワードの照合ができます。

一致したら`$row['id']`に入れておいたユーザIDを返し、不一致であれば`false`を返します。

#### エラーの表示

エラーが有った場合、ユーザにそれを知らせないシステムは不親切ですよね？

一般的なサインインフォームと同様に、ユーザ認証に失敗すると

1. エラーメッセージを表示
2. メールアドレスを補完入力

しておく処理を書きます。

```php
<input type="email" class="form-control" id="inputEmail" name="email" value="<?php print escape($email); ?>">
<!-- エラーメッセージを表示する段落<p>を追記 -->
<p><?php if (array_key_exists('email', $error)) { print escape($error['email']); }?></p>
```

`<input>`タグの`value`属性に値を入れておくことで、フォームの中に予め入力されている状態を作ります。

エラーメッセージの表示に使用している`array_key_exists('email', $error)`は連想配列`$error`の`email`というキーに値が存在するかを確認しています。
値があればその値、つまりエラーメッセージを出力します。

なお、ユーザからの入力をHTMLで出力する際には必ずエスケープという処理を行います。

今回はescape関数を作ってエスケープ処理を書きました。

```php
function escape($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
```

`htmlspecialchars()`という関数は引数の文字列に対してエスケープ処理を行います。

エスケープ処理とは、マークアップ言語（HTML）やプログラミング言語で文字列を扱うときに、特別な意味を持つ記号を別の文字に置き換えて無効化するという処理です。

例えばHTMLにおいて、"<"という文字はタグの開始を意味します。この記号を"&lt;"に置き換えることで、「タグの開始」という意味を無効化しています。

これを怠ると、フォームからHTMLタグを送信され、その結果ウェブサイトの改ざんを許してしまったりします。

詳しくは「XSS（クロスサイトスクリプティング）」で調べてみてください。
