<?php
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1') {
    $host = 'localhost';
    $dbname = 'vite-gourmand';
    $username = 'root';
    $password = '';
} else {
    $host = 'sql304.infinityfree.com';
    $dbname = 'if0_42439351_vitegourmand';
    $username = 'if0_42439351';
    $password = 'DWBPnJMbK65';
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>