<?php
session_start();

// Database credentials
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'netflix_clone';

try {
  // Connect using PDO
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Get form data
  $username = $_POST['username'];
  $password_input = $_POST['password'];

  // Fetch user by username
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password_input, $user['password'])) {
    // Successful login
    $_SESSION['username'] = $username;
    echo "<h2 style='color:green;'>Login Successful! Welcome, $username.</h2>";
    echo "<a href='index.html'>Go to Home Page</a>";
  } else {
    // Failed login
    echo "<h2 style='color:red;'>Invalid Username or Password</h2>";
    echo "<a href='login.html'>Try Again</a>";
  }

} catch (PDOException $e) {
  echo "Database Error: " . $e->getMessage();
}
?>
