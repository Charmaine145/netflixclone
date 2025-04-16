<?php
require 'vendor/autoload.php';

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'netflix_clone';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $token = $_GET['token'] ?? '';
    
    $stmt = $pdo->prepare("UPDATE users SET is_verified = TRUE WHERE verification_token = ?");
    $stmt->execute([$token]);
    
    if ($stmt->rowCount() > 0) {
        echo "<h3 style='color:green;'>Email verified successfully! You can now login.</h3>";
    } else {
        echo "<h3 style='color:red;'>Invalid or expired verification token.</h3>";
    }
} catch (PDOException $e) {
    echo "DB Error: " . $e->getMessage();
}
?>