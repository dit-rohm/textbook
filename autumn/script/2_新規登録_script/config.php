<?php
// config.php

define('DSN', 'mysql:dbname=ditter;host=localhost;charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

function connectDb() {
	try {
		return new PDO(DSN, DB_USER, DB_PASSWORD);
	} catch (PDOException $e) {
		print $e->getMessage();
		exit;
	}
}
