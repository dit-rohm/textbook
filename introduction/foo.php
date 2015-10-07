<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['input'] == 'foo')
      $output = 'bar';
    else
      $output = "???";
  } else {
    $output = "文字列を入力してください。";
  }
?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body lang="ja">
    <form method="post" action="">
      <label>入力</label>
      <input type="text" name="input">
      <input type="submit" value="送信">
    </form>
    <a href="/foo.php">リセット</a>
    <p><?php echo $output ?></p>
  </body>
</html>
