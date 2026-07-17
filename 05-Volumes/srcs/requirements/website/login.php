<?php
    $pdo = new PDO("mysql:host=mariadb;dbname=login_app", "eazmir", "lx01");

    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }
?>
