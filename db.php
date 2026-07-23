<?php

// 🔥 СЕССИЯ (важно — только один раз в проекте)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 🔌 ПОДКЛЮЧЕНИЕ К БД
$host = 'localhost';
$db   = 'skyline_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}

// 📝 ЛОГИ (без ошибок, если таблицы нет)
function writeLog($pdo, $user_id, $action) {
    try {
        $stmt = $pdo->prepare("INSERT INTO logs (user_id, action) VALUES (?, ?)");
        $stmt->execute([$user_id, $action]);
    } catch (Exception $e) {
        // если нет таблицы logs — просто игнорируем
    }
}

?>