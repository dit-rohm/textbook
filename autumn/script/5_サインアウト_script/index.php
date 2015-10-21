<?php
// PHP部分はここに書きます
require_once 'init.php';

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (!isSignin()) {
	$signin_url = 'signin.php';
	header("Location: {$signin_url}");
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>index - Ditter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<!-- HTML部分はここに書きます -->
<!-- Fixed navbar -->
<style>
	body {
		padding-top: 70px;
	}
</style>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Ditter</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/">ホーム</a></li>
				<li><a href="/reply.php">返信</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#postModal">
						<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 投稿
					</button>
				</li>
				<li>
					<a href=""><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> 更新</a>
				</li>
				<li>
					<a href="./signout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> サインアウト</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- postModal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="postModalLabel">新規投稿</h4>
			</div>
			<div class="modal-body">
				<form action="index.php" method="post">
					<div class="form-group">
						<label for="postText" class="control-label">メッセージ（140字まで）：</label>
						<textarea class="form-control" id="postText" name="postText" maxlength="140"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">投稿する</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- replyModal -->
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="replyModalLabel">リプライ</h4>
			</div>
			<div class="modal-body">
				<form action="index.php" method="post">
					<div class="form-group">
						<label for="replyText" class="control-label">メッセージ（140字まで）：</label>
						<textarea class="form-control" id="replyText" name="postText" maxlength="140"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">返信する</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Main -->
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-push-4">
			<div class="panel panel-default visible-xs">
				<div class="panel-heading">
					<h3 class="panel-title">新規投稿</h3>
				</div>
				<div class="panel-body">
					<form action="index.php" method="post">
						<div class="form-group">
							<textarea class="form-control" id="postText" name="postText" maxlength="140"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">投稿</button>
					</form>
				</div>
			</div>
			<!-- 全員の投稿表示領域 -->
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					<h3 class="panel-title">みんなの投稿</h3>
				</div>
				<!-- List group -->
				<ul class="list-group">
					<li class="list-group-item">
						<div class="container-fluid">
							<h5>user_name</h5>
							<p class="small text-muted reply-to">@screen_name</p>
							<p>text: あのイーハトーヴォの すきとおった風、 夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモーリオ市、郊外のぎらぎらひかる草の波</p>
							<p class="small">created_at: 2015/9/30 17:49:11</p>
							<p class="text-right">
								<button type="button" class="btn btn-primary reply-btn" data-toggle="modal" data-target="#replyModal">
									<span class="glyphicon glyphicon-send" aria-hidden="true"></span>　返信する
								</button>
								<a href="">
									<button type="submit" class="btn btn-danger" name="delete_post">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>　削除する
									</button>
								</a>
							</p>
						</div>
					</li>
					<li class="list-group-item">
						<div class="container-fluid">
							<h5>user_name</h5>
							<p class="small text-muted reply-to">@screen_name</p>
							<p>text: あのイーハトーヴォの すきとおった風、 夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモーリオ市、郊外のぎらぎらひかる草の波</p>
							<p class="small">created_at: 2015/9/30 17:49:11</p>
							<p class="text-right">
								<button type="button" class="btn btn-primary reply-btn" data-toggle="modal" data-target="#replyModal">
									<span class="glyphicon glyphicon-send" aria-hidden="true"></span>　返信する
								</button>
								<a href="">
									<button type="submit" class="btn btn-danger" name="delete_post">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>　削除する
									</button>
								</a>
							</p>
						</div>
					</li>
				</ul>
			</div>
			<!-- 前へ・次へ表示領域 -->
			<div class="container-fluid text-center">
				<nav>
					<ul class="pager">
						<li class="previous">
							<a href="">
								<span aria-hidden="true">&larr;</span> Newer
							</a>
						</li>
						<li class="next">
							<a href="">
								Older <span aria-hidden="true">&rarr;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>
		<!-- ユーザ情報表示領域 -->
		<div class="col-sm-4 col-sm-pull-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ユーザ情報</h3>
				</div>
				<div class="panel-body">
					<h4 class="leader">
						user_name
					</h4>
					<p class="small text-muted">@
						screen_name
					</p>
					<p>
						comment: 自己紹介的なやつ
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
