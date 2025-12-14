<?php
try {
    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
    $db   = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];

    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed");
}

