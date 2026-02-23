<?php
$host = 'localhost';
$db   = 'student_db'; // phpMyAdmin 
$user = 'root';       // XAMPP default username
$pass = '';           // XAMPP default password 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Error show
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database No Connection: " . $e->getMessage());
}
?>