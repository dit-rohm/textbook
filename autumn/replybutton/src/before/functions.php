<?php
function connectDb() {
	try {
		return new PDO(DSN, DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	} catch (PDOException $e) {
		print $e->getMessage();
		exit;
	}
}

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

function isSignin()
{
	if (!isset($_SESSION['user_id'])) {
        // 変数に値がセットされていない場合
		return false;
	} else {
		return true;
	}
}

function getTimeline($pdo)
{
	$sql = 'SELECT * FROM posts ORDER BY `created_at` DESC';
	$statement = $pdo->prepare($sql);
	$statement->execute();

	if ($rows = $statement->fetchAll(PDO::FETCH_ASSOC)) {
		return $rows;
	} else {
		return false;
	}
}
function getUserData($pdo, $id)
{
	$sql = 'SELECT * FROM users WHERE id=:id';
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':id', $id, PDO::PARAM_INT);
	$statement->execute();

	if ($row = $statement->fetch()) {
		return $row;
	} else {
		throw new Exception('ユーザデータを取得できません');
	}
}

function getPost($pdo, $post_id)
{
	$sql = 'SELECT * FROM posts WHERE id = :post_id';
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':post_id', $post_id, PDO::PARAM_STR);
	$statement->execute();

	if ($rows = $statement->fetchAll(PDO::FETCH_ASSOC)) {
		return $rows;
	} else {
		return false;
	}
}

function deletePost($pdo, $id)
{

		$sql = 'DELETE FROM posts WHERE id = :id';
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':id', $id, PDO::PARAM_INT);
		$statement->execute();

}
