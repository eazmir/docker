<?php
	$pdo = new PDO("mysql:host=mariadb;dbname=login_app","eazmir","lx01");
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$stmt = $pdo->prepare("SELECT * FROM users where username = ?");
	$stmt->execute(["username"]);
	$user = $stmt->fetch();

	if ($user && password_verify($password,$user["username"])
		echo "login seccessful!";
	else
		echo "invalid password or username";
?>
