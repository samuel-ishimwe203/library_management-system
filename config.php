<?php
try {
    $host = getenv("DB_HOST");
    $db   = getenv("DB_NAME");
    $user = getenv("DB_USER");
    $pass = getenv("DB_PASS");
    $port = getenv("DB_PORT") ?: 3306;

    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";

    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database connection failed");
}
?>
