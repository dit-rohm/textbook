<?php
// signin.php
// PHP部分はここに書きます
require_once 'init.php';

if (isSignin()) {
	$index_url = 'index.php';
	header("Location: {$index_url}");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_regenerate_id(true);

	$error = '';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$db = connectDb();

	if (!$user_id = getUserId($email, $password, $db)) {
		$error = 'パスワードとメールアドレスが正しくありません';    
	} else if (empty($error)) {
		$_SESSION['user_id'] = $user_id;
		$index_url = 'index.php';
		header("Location: ${index_url}");
		exit;
	}
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>signin - Ditter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<!-- HTML部分はここに書きます -->
<div id="main" class="container">
	<div class="row">
		<div class="col-md-4 col-md-push-4">
			<h1>サインイン</h1>
			<form action="signin.php" method="POST">
				<div class="form-group">
					<label for="InputEmail">メールアドレス</label>
					<input type="email" class="form-control" id="inputEmail" name="email" value="<?php if (isset($email)) print escape($email); ?>">
				</div>
				<div class="form-group">
					<label for="InputPassword1">パスワード</label>
					<input type="password" class="form-control" id="inputPassword" name="password">
					<p><?php if (isset($error)) { print escape($error); } ?></p>
				</div>
				<input type="hidden" name="token" value="">
				<button type="submit" class="btn btn-default">サインイン</button>
			</form>  
			<p>新規登録は<a href="./signup.php">こちら</a></p>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
