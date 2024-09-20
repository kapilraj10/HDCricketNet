<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "your_database_name"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize input
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Hash password (assuming passwords are stored hashed in the database)
$password = md5($password);

// Query database
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Login successful
  $_SESSION['email'] = $email;
  header("Location: welcome.php"); // Redirect to welcome page
} else {
  // Login failed
  echo "Invalid email or password";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <!-- Display errors if any -->
  <?php if (count($errors) > 0): ?>
    <div style="color: red;">
      <?php foreach ($errors as $error): ?>
        <p><?php echo $error; ?></p>
      <?php endforeach ?>
    </div>
  <?php endif ?>

  <!-- Login form -->
  <form action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Login</button>
  </form>
</body>
</html>
