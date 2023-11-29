<?php
// Include your database connection file
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Prepare and execute SQL query to insert feedback into the database
    $insertFeedback = "INSERT INTO feedback (Name, Email, Feedback) VALUES ('$name', '$email', '$feedback')";
    if ($conn->query($insertFeedback) === TRUE) {
        // Redirect to index.php after successful submission
        header("Location: index.php");
        exit();
    } else {
        // Handle database insertion error
        echo "Error: " . $insertFeedback . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Divine Event Planner</title>
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
      background-image: url('/event_mgm/images/pic.jpg');
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
  <h5 align="right"><font color = "black">Contact us :9496788616</font></h5>
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
          <a class="nav-link" href="events.php">Events</a>
        </li>
        <!-- Add more navigation options as needed -->
      </ul>
    </div>
  </nav>

  <!-- Main Content Area -->
  <div class="jumbotron">
    <div class="container">
      <h1><b><i><font color = "white">WELCOME TO DIVINE EVENT PLANNER</font></i></b></h1>
      <p class="lead"><h6><b><i><font color = "white">THE MOST MEMORABLE MOMENTS IN LIFE ARE THE ONES WE NEVER TOOK THE TIME TO PLAN.</font></i></b></h6></p>
      <p class="lead"><font color = "white"><h6><b><i>Join us for the best events.</i></b></h6></font></p>
      <p>
        <a href="login_user.php" class="btn btn-primary btn-lg">Login</a>
        <a href="register_user.php" class="btn btn-success btn-lg">Register</a>
      </p>
    </div>
  </div>

<!-- Feedback Form -->
<div class="container mt-4">
  <h2>Feedback Form</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="feedback">Feedback:</label>
      <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  
  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
