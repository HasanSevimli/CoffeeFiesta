<?php
$hostname = 'localhost';
$database = 'proje';
$username = 'root';
$password = '';

try {
    $DBConnection = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8mb4", $username, $password);
    $DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Veritabanı bağlantısı hatası: " . $e->getMessage();
    exit();
}
?>