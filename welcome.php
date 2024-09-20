<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: login.html"); // Redirect to login page if not logged in
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      text-align: center;
      background-color: #ffffff;
      padding: 40px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      margin: 10px;
      text-decoration: none;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome, <?php echo $_SESSION['email']; ?>!</h1>
    <a href="edit_content.php" class="button">Edit Content</a>
    <form action="logout.php" method="POST">
      <button class="button" type="submit">Logout</button>
    </form>
  </div>
</body>
</html>
