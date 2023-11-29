<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to login page
    header("Location: login_user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Events - Divine Event Planner</title>
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
    <a class="navbar-brand" href="events.php">Divine Event Planner</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="col-md-6">
            <h4>Profile</h4>
            <p>Update your profile information:</p>
            <a href="update_profile.php" class="btn btn-info">Update Profile</a> <!-- Link to update profile -->
        </div>

  <!-- Main Content Area -->
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <h5>User ID: <?php echo $_SESSION['userID']; ?></h5> <!-- Display user ID -->
        <h5>Email: <?php echo $_SESSION['email']; ?></h5> <!-- Display email -->
      </div>
    </div>
    <hr>
    <h2>Events</h2>
    <div class="row">
      <div class="col-md-6">
        <h4>Book Events</h4>
        <p>Choose from the available events to book:</p>
        <a href="book_event.php" class="btn btn-primary">Book Events</a> <!-- Link to book events -->
      </div>
      <div class="col-md-6">
        <h4>View Booked Events</h4>
        <p>View events you've already booked:</p>
        <a href="view_booked_events.php" class="btn btn-success">View Booked Events</a> <!-- Link to view booked events -->
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
