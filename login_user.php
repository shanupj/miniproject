<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email === 'admin@admin.com' && $password === 'admin@admin.com') {
        // Admin login
        $_SESSION['email'] = $email;
        header("Location: admin_dashboard.php");
        exit();
    }
    $sql = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
            // Regular user login
            $_SESSION['email'] = $email;
            $_SESSION['userID'] = $user['UserID']; // Set the session user ID
            header("Location: events.php");
            exit();

    } else {
        // Invalid credentials, redirect back to login page with an alert
        echo "<script>alert('Invalid credentials'); window.location='login_user.php';</script>";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Login - Divine Event Planner</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add your custom CSS here -->
  <style>
    /* Add your custom styles */
    /* For example: */
    body {
      padding-top: 60px;
      padding-bottom: 60px;
    }
    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      height: 60px;
      line-height: 60px;
      background-color: #f5f5f5;
    }
    .jumbotron {
      background-image: url('/event_mgm/images/4.jpg');
      background-size: cover;
      color: #fff;
      text-align: center;
      padding: 100px 25px;
      margin-bottom: 0;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Divine Event Planner</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register_user.php">Register</a>
        </li>
        <!-- Add more navigation options as needed -->
      </ul>
    </div>
  </nav>

  <!-- Main Content Area -->
  <div class="container mt-4">
    <h2>User Login</h2>
    <form action="login_user.php" method="post">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
