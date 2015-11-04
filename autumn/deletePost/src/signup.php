<?php
require_once 'init.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  if ((isset($_POST['user_name']) && $_POST['user_name'] !== '') && (isset($_POST['screen_name']) && $_POST['screen_name'] !== '') && (isset($_POST['email']) && $_POST['email'] !== '') && (isset($_POST['password']) && $_POST['password'] !== '')){

    //送信された値を変数に代入
    $user_name = $_POST['user_name'];
    $screen_name = $_POST['screen_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $comment = $_POST['comment'];

    // 接続関数を変数に代入
    $db = connectDb();

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (screen_name, user_name, email, password, comment)
      VALUES (:screen_name, :user_name, :email, :password, :comment)';

    $statement = $db->prepare($sql);

    $statement->bindValue(':screen_name', $screen_name, PDO::PARAM_STR);
    $statement->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':password', $hash, PDO::PARAM_STR);
    $statement->bindValue(':comment', $comment, PDO::PARAM_STR);

    if($statement->execute()) {
      $signin_url = "signin.php";
      header("Location: {$signin_url}");
      exit;
    } else {
      print "データベースへの挿入に失敗しました";
    }

  }else{
    print "値が入力されていません";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>signup - Ditter</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
  <div id="main" class="container">
    <div class="row">
      <div class="col-md-4 col-md-push-4">
        <h1>新規登録</h1>
        <!-- フォーム部分 -->
        <form action="./signup.php" method="post">
        <!-- ユーザ名 -->
        <div class="form-group">
          <label  for="username">ユーザ名（必須）</label>
          <input type="text" class="form-control" id="userName" name="user_name" placeholder="3文字以上15文字以下"/>
        </div>
        <!-- ユーザID -->
        <div class="form-group">
          <label for="screenName">ユーザID（必須）</label>
          <input type="text" class="form-control" id="screenName" name="screen_name" placeholder="3文字以上15文字以下"/>
        </div>
        <!-- メールアドレス -->
        <div class="form-group">
          <label for="email">メールアドレス（必須）</label>
          <input type="email" class="form-control" id="email" name="email" />
        </div>
        <!-- パスワード -->
        <div class="form-group">
          <label for="password">パスワード（必須）</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="4文字以上8文字以下" />
        </div>
        <!-- 一言 -->
        <div class="form-group">
          <label for="comment">一言</label>
          <textarea class="form-control" id="comment" name="comment" placeholder="140文字以内" row="3" style="resize:none"></textarea>
        </div>
        <!-- 新規登録ボタン -->
        <button type="submit" class="btn btn-default">新規登録</button>
      </form>
      <!-- ログイン画面へのリンク -->
      <p>ログインは<a href="./signin.php">こちら</a></p>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
