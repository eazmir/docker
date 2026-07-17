<?php

    $pdo = new PDO("mysql:host=mariadb;dbname=login_app", "eazmir", "lx01");
    $username = $_POST["username"];
    $password = $_POST["password"];

    // 1. Check if username already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "Username already taken.";
    } else {
        // 2. Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // 3. Insert the new user
        $insertStmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $insertStmt->execute([$username, $hashedPassword]);

        echo "Registration successful!";
    }
?>
