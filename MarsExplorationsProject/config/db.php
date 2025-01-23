<?php

$db_host = 'localhost';           // обычно localhost
$db_name = 'mars_missions_db';    // ваше название БД
$db_user = 'root';                // ваш юзер
$db_pass = '124';                // ваш пароль

// Формируем DSN (Data Source Name) для PDO
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

try {
    // Создаём экземпляр PDO
    $pdo = new PDO($dsn, $db_user, $db_pass);
    // Настройки PDO для вывода исключений при ошибках
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Рекомендуется запретить эмуляцию подготовленных запросов
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // В боевых проектах не стоит показывать пользователям детали ошибки
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    exit;
}
