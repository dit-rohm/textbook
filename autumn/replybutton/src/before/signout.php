<?php
require_once 'init.php';

// セッション変数を全て解除する
$_SESSION = array();

// セッションの破壊
session_destroy();

$signin_url = "signin.php";
header("Location: {$signin_url}");