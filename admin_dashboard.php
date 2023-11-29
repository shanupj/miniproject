<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['email'] !== 'admin@admin.com') {
    // If not authenticated or not an admin, redirect to the login page or an error page
    header("Location: login_user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Divine Event Planner</title>
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
      background-image: url('/event_mgm/images/evnt.jpg');
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
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">
            Welcome, Admin! <!-- Display the admin's username -->
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a> <!-- Add logout functionality -->
        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Content Area -->
  <div class="container mt-4">
    <h2>Admin Dashboard</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Events</h5>
            <a href="add_event.php" class="btn btn-primary">Add Event</a>
            <a href="viewevent.php" class="btn btn-info">View Event</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Bookings</h5>
            <a href="viewbooking.php" class="btn btn-info">View Booking</a>
            <a href="removebooking.php" class="btn btn-warning">Remove Booking</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Users</h5>
            <a href="viewuser.php" class="btn btn-success">View User</a>
            <a href="feedback.php" class="btn btn-info">View Feedback</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
