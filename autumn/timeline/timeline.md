# 投稿一覧の表示

前の章で投稿機能を付けましたが、まだ投稿を表示する部分を作っていません。
今回は投稿一覧を作ります。

以下の順番で実装していきます。

1. 投稿を取得（PHP）
1. まだ投稿が無い場合の表示（HTML, PHP）
1. 投稿がある場合の表示（HTML, PHP）

今回、HTML部分にPHPのコードを組み込む箇所が多く、どこを修正するのか分かりづらいかもしれません。

検索を駆使したり、分からなければメンターに質問してください。

## 1. 投稿を取得

投稿を取得する関数を作ります。`index.php`は一部作成済みですので、PHPの箇所に続きを書いてください。

### 投稿を取得するコード

- index.php

```php
<?php
require_once 'init.php';
...
...
// この関数を追加します
$posts = getTimeline($db);
?>
<!DOCTYPE html>
...
...
```

- functions.php

```php
function getTimeline($pdo)
{
    $sql = 'SELECT * FROM posts ORDER BY `created_at` DESC';
    $statement = $pdo->prepare($sql);
    $statement->execute();

    if ($rows = $statement->fetchAll(PDO::FETCH_ASSOC)) {
        return $rows;
    } else {
        return exit;
    }
}
```

### コードの解説

`getTimeline()`を作って、`SELECT`構文で得た検索結果を変数`$posts`に代入しています。

以下のコードは、SQLの実行結果を取得するコードですが、`fetchAll()`の引数を指定していることに注目してください。

```php
$rows = $statement->fetchAll(引数)
```

検索結果は連想配列の形で受け取りますが、`fetchAll()`の引数を指定することで、その添字を数で受け取るか、データベースの属性名で受け取るかを指定しています。

`PDO::FETCH_ASSOC`の場合は属性名で受け取ります。

試しにこの配列を表示してみましょう。

- index.php

```php
<?php
require_once 'init.php';

...
...

$posts = getTimeline($db);

// 確認部分ここから
echo "<pre>";
print_r($posts);
echo "</pre>";
// 確認部分ここまで
?>
```

検索結果の連想配列が展開されて表示されると思います。

確認が終わったら確認部分は消しておいてください。

## 2. まだ投稿が無い場合の表示

まだ投稿が1件も無い場合を想定しておかないと、エラーの原因になります。

### 投稿が無いことを表示するコード

- index.php

```php
...
...
<!-- 全員の投稿表示領域 -->
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h3 class="panel-title">みんなの投稿</h3>
    </div>
    <!-- List group -->
    <ul class="list-group">
        <?php if (empty($posts)): ?>
            <li class="list-group-item">
                <div class="container-fluid">
                    <p class="text-center">
                        <strong>ツイートがありません。</strong>
                    </p>
                </div>
            </li>
        <?php else: ?>
            // 投稿がある場合の処理
        <?php endif; ?>
    </ul>
</div>
...
...
```

### コードの解説

if文で投稿の取得ができているかを判定しています。

```php
<?php if (empty($posts)): ?>
    // $postsが空だった場合の処理
<?php else: ?>
    // $postsが空でなかった場合の処理
<?php endif; ?>
```

## 3. 投稿がある場合の表示

次は投稿がある場合の処理を書いていきます。先ほどの`else`の中に書いていきます。

- index.php

```php
...
...
<?php else: ?>
    // 投稿がある場合の処理
    <?php foreach ($posts as $key => $value):
        $post_by = getUserData($db, $value['user_id']);
        ?>
        <li class="list-group-item">
            <div class="container-fluid">
                // 投稿者のユーザ名
                <h5><?php print $post_by['user_name'] ?></h5>
                // 投稿者のスクリーンネーム
                <p class="small text-muted reply-to">@<?php print $post_by['screen_name'] ?></p>
                // 投稿文
                <p><?php print escape($value['text']) ?></p>
                // 投稿日時
                <p class="small"><?php print $value['created_at'] ?></p>
                // 返信・削除ボタン
                <p class="text-right">
                    <button type="button" class="btn btn-primary reply-btn" data-toggle="modal"
                            data-target="#replyModal">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>　返信する
                    </button>
                    <button type="button" class="btn btn-danger reply-btn" name="delete_post">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>　削除する
                    </button>
                </p>
            </div>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
...
...
```

- functions.php

追記してください。

```php
...
...
function getUserData($pdo, $id)
{
    $sql = 'SELECT * FROM users WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    if ($row = $statement->fetch()) {
        return $row;
    } else {
        return exit;
    }
}
```

### コードの解説

#### foreach文

配列に対してループ処理を行うときに便利な構文です。

```php
<?php
$color = array('青' => 'blue', '黃' => 'yellow', '赤' => 'red');
foreach ($color as $key => $value) {
    print '<p>' $key . '=>' . $value . '</p>';
}
// 実行すると「青=>blue」といった具合にそれぞれ出力されます
?>
```

このように記述すると、連想配列`$color`のキーと値が先頭から`$key`, `$value`に代入されます。

ループ1周目は青とblue、2周目は黃とyellow、3周目は赤とredでループ終了です。

ここで今回のコードを見てみましょう。

```php
<?php foreach ($posts as $key => $value):
        $post_by = getUserData($db, $value['user_id']);
?>
// HTMLの部分
<?php endforeach; ?>
```

1周ごとに1投稿ずつ、`$post_by`に投稿者の情報を入れていきます。

そして、

```php
<h5><?php print $post_by['user_name'] ?></h5>
```

といった記述で、`$post_by`に入れた情報を取得し、表示します。

以上で投稿一覧の表示は終了です。
