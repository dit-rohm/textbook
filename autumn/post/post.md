# つぶやき投稿
本稿では、いよいよつぶやきの投稿機能を実装していきます。

流れとしては、以下のようになります。

1. 投稿を行う`writePost`関数の実装
1. 自分のユーザーIDを取得
1. つぶやき文を取得し投稿する

## 1. 投稿を行う`writePost`関数の実装

この関数がつぶやき投稿の本質的な処理部分になります。投稿とはすなわち、入力された文章をデータベースに挿入（INSERT）することです。
誰が投稿したか(`$id`)、つぶやき本文(`$text`)を受け取りデータベースへ挿入します。以下のプログラムを`functions.php`へ書き足しましょう。

#### functions.php

```php
function writePost($pdo, $id, $text) {
  $sql = "INSERT INTO posts (user_id,text) VALUES (:user_id, :text)";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(':user_id', $id, PDO::PARAM_INT);
  $statement->bindValue(':text', $text, PDO::PARAM_STR);
  $statement->execute();
}

```

関数の引数として、誰が投稿したか（`$id`）とつぶやき本文（`$text`）を受け取り、`posts`テーブルに挿入（INSERT）しています。
ここでは定義しただけなので、以下でこの関数を使って実際に投稿をしてみます。

## 2. 自分のユーザーIDを取得

`writePost`関数にもあったとおり、投稿には自分のユーザIDが必要になるので、下準備としてIDを取得しておきます。
自分のユーザIDは`$_SESSION`に入っているので、以下のようにして取り出します。`index.php`の上部で変数に入れておきます。

#### index.php

```php
$user_id = $_SESSION['user_id'];
```

## 3. つぶやき文を取得し投稿する

いよいよ投稿です。
前に作った投稿フォームにおいて、つぶやき本文は`postText`という名前になっていましたね。
いつものように値が入っているか確認してから、`writePost`関数へ渡して投稿です。`index.php`の上部に追記しましょう。

#### index.php

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['postText'])){
    $postText = $_POST['postText'];
    writePost($db, $user_id, $postText);
    // 2重投稿防止のためにリロードする処理
    header('Location: ' . $_SERVER['SCRIPT_NAME']);
  }
}
```

`index.php`を開いて投稿をしてみましょう。

つぶやきがきちんと投稿されましたか？投稿が確認できたら終了です。
お疲れ様でした！
