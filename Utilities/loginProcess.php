<?php
// Database connection file
$host = "localhost";
$dbname = "gamedatabase";
$username = "root";
$password = "";

try {
    // Create a global PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
