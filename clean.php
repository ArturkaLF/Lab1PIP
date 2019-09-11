<?php
	session_start();
	session_destroy();
	header("Location: https://se.ifmo.ru/~s264458/index.php");
	exit;
?>